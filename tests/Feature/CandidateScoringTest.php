<?php
namespace Tests\Feature;
use App\Models\Candidate;
use App\Services\CandidateScoringService;
use Tests\TestCase;
class CandidateScoringTest extends TestCase
{
    public function test_master_candidate_with_strong_profile_gets_maximum_score(): void
    {
        $candidate = new Candidate([
            'education_level' => 'Master',
            'experience_years' => 5,
            'skills' => 'PHP Laravel Python Django JavaScript React Vue MySQL PostgreSQL Git',
            'available' => true,
            'motivation' => str_repeat('Je suis très motivé par cette opportunité. ', 20),
        ]);
        $result = app(CandidateScoringService::class)->calculate($candidate);
        $this->assertSame(100, $result['score']);
        $this->assertSame('high', $result['priority']);
    }
    public function test_basic_candidate_gets_low_priority(): void
    {
        $candidate = new Candidate([
            'education_level' => 'Bac',
            'experience_years' => 0,
            'skills' => 'HTML',
            'available' => false,
            'motivation' => 'Je souhaite intégrer ce programme.',
        ]);
        $result = app(CandidateScoringService::class)->calculate($candidate);
        $this->assertLessThan(60, $result['score']);
        $this->assertSame('low', $result['priority']);
    }
    public function test_matching_skills_are_scored_correctly(): void
    {
        $candidate = new Candidate([
            'education_level' => 'Bac',
            'experience_years' => 0,
            'skills' => 'PHP, JavaScript, PostgreSQL',
            'available' => false,
            'motivation' => 'Je suis motivé.',
        ]);
        $result = app(CandidateScoringService::class)->calculate($candidate);
        $this->assertSame(9, $result['skills_score']);
    }
    public function test_skills_score_is_capped_at_thirty_points(): void
    {
        $candidate = new Candidate([
            'education_level' => 'Bac',
            'experience_years' => 0,
            'skills' => 'PHP Laravel Python Django JavaScript React Vue MySQL PostgreSQL Git Angular Next.js Node.js Java C#',
            'available' => false,
            'motivation' => 'Je suis motivé.',
        ]);
        $result = app(CandidateScoringService::class)->calculate($candidate);
        $this->assertSame(30, $result['skills_score']);
    }
    public function test_additional_technologies_are_recognized(): void
    {
        $candidate = new Candidate([
            'education_level' => 'Licence',
            'experience_years' => 2,
            'skills' => 'HTML, Angular, Next.js, Node.js, Java, C#',
            'available' => true,
            'motivation' => 'Je suis très motivé par cette opportunité.',
        ]);
        $result = app(CandidateScoringService::class)->calculate($candidate);
        $this->assertSame(18, $result['skills_score']);
    }
    public function test_motivation_score_depends_on_length(): void
    {
        $candidate = new Candidate([
            'education_level' => 'Bac',
            'experience_years' => 0,
            'skills' => 'HTML',
            'available' => false,
            'motivation' => 'Motivation',
        ]);
        $result = app(CandidateScoringService::class)->calculate($candidate);
        $this->assertSame(3, $result['motivation_score']);
    }
}