<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreCandidateRequest;
use App\Models\Application;
use App\Models\Candidate;
use App\Services\CandidateScoringService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class CandidateController extends Controller
{
    public function create(): View
    {
        return view('candidates.create');
    }
    public function store(
        StoreCandidateRequest $request,
        CandidateScoringService $scoringService
    ): RedirectResponse {
        return DB::transaction(function () use ($request, $scoringService) {
            $data = $request->validated();
            if ($request->hasFile('cv')) {
                $data['cv_path'] = $request->file('cv')->store('cvs', 'local');
            }
            unset($data['cv']);
            $candidate = Candidate::create($data);
            $scores = $scoringService->calculate($candidate);
            Application::create([
                'candidate_id' => $candidate->id,
                ...$scores,
            ]);
            return redirect()
                ->route('candidates.success')
                ->with('candidate_name', $candidate->first_name);
        });
    }
    public function success(): View
    {
        return view('candidates.success');
    }
}