<?php
namespace Tests\Feature;
use App\Models\Application;
use App\Models\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
class CandidateSubmissionTest extends TestCase
{
    use RefreshDatabase;
    public function test_candidate_can_submit_a_valid_application(): void
    {
        Storage::fake('local');
        $response = $this->post(route('candidates.store'), [
            'first_name' => 'Stéphane',
            'last_name' => 'Mwamba',
            'email' => 'stephane@example.com',
            'phone' => '+243810000000',
            'city' => 'Kinshasa',
            'education_level' => 'Licence',
            'field_of_study' => 'Informatique de gestion',
            'experience_years' => 2,
            'skills' => 'PHP, Laravel, JavaScript, MySQL',
            'motivation' => str_repeat(
                'Je souhaite rejoindre ce programme afin de développer mes compétences et contribuer à des projets utiles. ',
                3
            ),
            'available' => true,
            'cv' => UploadedFile::fake()->create(
                'cv-stephane.pdf',
                100,
                'application/pdf'
            ),
        ]);
        $response->assertRedirect(route('candidates.success'));
        $this->assertDatabaseHas('candidates', [
            'email' => 'stephane@example.com',
            'first_name' => 'Stéphane',
            'last_name' => 'Mwamba',
        ]);
        $candidate = Candidate::where(
            'email',
            'stephane@example.com'
        )->firstOrFail();
        $this->assertDatabaseHas('applications', [
            'candidate_id' => $candidate->id,
        ]);
        $application = Application::where(
            'candidate_id',
            $candidate->id
        )->firstOrFail();
        $this->assertGreaterThan(0, $application->score);
        $this->assertContains(
            $application->priority,
            ['high', 'medium', 'low']
        );
        Storage::disk('local')->assertExists(
            $candidate->cv_path
        );
    }
    public function test_candidate_cannot_submit_invalid_application(): void
    {
        $response = $this->post(route('candidates.store'), [
            'first_name' => '',
            'last_name' => '',
            'email' => 'email-invalide',
            'phone' => '',
            'city' => '',
            'education_level' => 'Licence',
            'experience_years' => 10,
            'skills' => '',
            'motivation' => 'Trop court',
            'available' => true,
        ]);
        $response->assertSessionHasErrors([
            'first_name',
            'last_name',
            'email',
            'phone',
            'city',
            'experience_years',
            'skills',
            'motivation',
        ]);
        $this->assertDatabaseCount('candidates', 0);
        $this->assertDatabaseCount('applications', 0);
    }
}