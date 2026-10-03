<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;
    public function test_guest_cannot_access_dashboard(): void
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
        $response->assertSessionHas(
            'error',
            'Veuillez vous connecter pour accéder au dashboard.'
        );
    }
    public function test_guest_cannot_access_candidate_details(): void
    {
        $this->withoutExceptionHandling();
        $candidate = \App\Models\Candidate::create([
            'first_name' => 'Test',
            'last_name' => 'Candidat',
            'email' => 'test-security@example.com',
            'phone' => '+243810000000',
            'city' => 'Kinshasa',
            'education_level' => 'Licence',
            'field_of_study' => 'Informatique',
            'experience_years' => 1,
            'skills' => 'PHP, Laravel',
            'motivation' => str_repeat('Motivation de test. ', 10),
            'available' => true,
        ]);
        $application = \App\Models\Application::create([
            'candidate_id' => $candidate->id,
            'score' => 60,
            'education_score' => 15,
            'experience_score' => 4,
            'skills_score' => 6,
            'availability_score' => 15,
            'motivation_score' => 12,
            'priority' => 'medium',
            'status' => 'new',
        ]);
        $response = $this->get(
            route('dashboard.show', $application)
        );
        $response->assertRedirect(route('login'));
    }
    public function test_admin_can_access_dashboard(): void
    {
        $this->withSession([
            'admin_authenticated' => true,
        ]);
        $response = $this->get(route('dashboard'));
        $response->assertStatus(200);
    }
    public function test_admin_can_logout(): void
    {
        $this->withSession([
            'admin_authenticated' => true,
        ]);
        $response = $this->post(route('logout'));
        $response->assertRedirect(route('login'));
        $this->assertFalse(
            session()->has('admin_authenticated')
        );
    }
}