<?php
namespace App\Services;
use App\Models\Candidate;
class CandidateScoringService
{
    /**
Calcule le score complet d'un candidat.
     *
Score maximum : 100 points.
     */
    public function calculate(Candidate $candidate): array
    {
        $educationScore = $this->educationScore($candidate);
        $experienceScore = $this->experienceScore($candidate);
        $skillsScore = $this->skillsScore($candidate);
        $availabilityScore = $this->availabilityScore($candidate);
        $motivationScore = $this->motivationScore($candidate);
        $totalScore =
            $educationScore +
            $experienceScore +
            $skillsScore +
            $availabilityScore +
            $motivationScore;
        return [
            'score' => $totalScore,
            'education_score' => $educationScore,
            'experience_score' => $experienceScore,
            'skills_score' => $skillsScore,
            'availability_score' => $availabilityScore,
            'motivation_score' => $motivationScore,
            'priority' => $this->priority($totalScore),
        ];
    }
    private function educationScore(Candidate $candidate): int
    {
        return match (strtolower($candidate->education_level)) {
            'master', 'bac+5', 'bac +5' => 20,
            'licence', 'bac+3', 'bac +3' => 15,
            'bac+2', 'bac +2' => 10,
            'bac', 'bac+0' => 5,
            default => 0,
        };
    }
    private function experienceScore(Candidate $candidate): int
    {
        return min($candidate->experience_years * 4, 20);
    }
    private function skillsScore(Candidate $candidate): int
{
    $skills = mb_strtolower($candidate->skills);
    $skillGroups = [
        ['php'],
        ['laravel'],
        ['python'],
        ['django'],
        ['javascript'],
        ['typescript'],
        ['html', 'html5'],
        ['css', 'css3'],
        ['tailwind', 'tailwindcss'],
        ['bootstrap'],
        ['react', 'reactjs'],
        ['vue', 'vuejs'],
        ['angular'],
        ['next', 'nextjs', 'next.js'],
        ['node', 'nodejs', 'node.js'],
        ['express', 'expressjs'],
        ['java'],
        ['c#', 'csharp'],
        ['mysql'],
        ['postgresql', 'postgres'],
        ['mongodb'],
        ['git', 'github', 'gitlab'],
        ['docker'],
        ['api', 'rest'],
    ];
    $matchedGroups = 0;
    foreach ($skillGroups as $group) {
        foreach ($group as $keyword) {
            $pattern = '/(?<![a-z0-9])' . preg_quote($keyword, '/') . '(?![a-z0-9])/i';
            if (preg_match($pattern, $skills)) {
                $matchedGroups++;
                break;
            }
        }
    }
    return min($matchedGroups * 3, 30);
}
    private function availabilityScore(Candidate $candidate): int
    {
        return $candidate->available ? 15 : 0;
    }
    private function motivationScore(Candidate $candidate): int
    {
        $length = mb_strlen(trim($candidate->motivation));
        return match (true) {
            $length >= 500 => 15,
            $length >= 300 => 12,
            $length >= 150 => 9,
            $length >= 80 => 6,
            $length > 0 => 3,
            default => 0,
        };
    }
    private function priority(int $score): string
    {
        return match (true) {
            $score >= 80 => 'high',
            $score >= 60 => 'medium',
            default => 'low',
        };
    }
    
}