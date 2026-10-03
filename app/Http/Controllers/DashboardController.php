<?php
namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DashboardController extends Controller
{
    public function index(): View
    {
        $applications = Application::with('candidate')
            ->orderByDesc('score')
            ->paginate(10);
        $statistics = [
            'total' => Application::count(),
            'average_score' => round(
                Application::avg('score') ?? 0
            ),
            'high_priority' => Application::where(
                'priority',
                'high'
            )->count(),
            'to_review' => Application::whereIn(
                'priority',
                ['high', 'medium']
            )->count(),
        ];
        return view('dashboard.index', compact(
            'applications',
            'statistics'
        ));
    }
    public function downloadCv(Application $application)
{
    $application->load('candidate');
    $cvPath = $application->candidate->cv_path;
    if (! $cvPath || ! Storage::disk('local')->exists($cvPath)) {
        abort(404, 'CV introuvable.');
    }
    return Storage::disk('local')->download($cvPath);
}
    public function show(Application $application): View
    {
        $application->load('candidate');
        return view('dashboard.show', compact('application'));
    }
    public function updateStatus(
    Request $request,
    Application $application
): RedirectResponse {
    $validated = $request->validate([
        'status' => [
            'required',
            'in:new,reviewing,shortlisted,rejected',
        ],
    ]);
    $application->update([
        'status' => $validated['status'],
    ]);
    return back()->with(
        'success',
        'Le statut de la candidature a été mis à jour.'
    );
}
}