<?php
namespace App\Console\Commands;
use App\Models\Candidate;
use App\Services\CandidateScoringService;
use Illuminate\Console\Command;
class TestCandidateScoring extends Command
{
    protected $signature = 'candidate:test-score';
    protected $description = 'Teste le moteur de scoring d’un candidat';
    public function handle(CandidateScoringService $scoringService): int
    {
        $candidate = new Candidate([
            'education_level' => 'Licence',
            'experience_years' => 2,
            'skills' => 'PHP, Laravel, JavaScript, MySQL, Git',
            'available' => true,
            'motivation' => str_repeat(
                'Je souhaite rejoindre ce programme afin de développer mes compétences et contribuer à des projets concrets. ',
                4
            ),
        ]);
        $result = $scoringService->calculate($candidate);
        $this->table(
            ['Critère', 'Score'],
            [
                ['Formation', $result['education_score'] . '/20'],
                ['Expérience', $result['experience_score'] . '/20'],
                ['Compétences', $result['skills_score'] . '/30'],
                ['Disponibilité', $result['availability_score'] . '/15'],
                ['Motivation', $result['motivation_score'] . '/15'],
                ['TOTAL', $result['score'] . '/100'],
                ['Priorité', $result['priority']],
            ]
        );
        return self::SUCCESS;
    }
}