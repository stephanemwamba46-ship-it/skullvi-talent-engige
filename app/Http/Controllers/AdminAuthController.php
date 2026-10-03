<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
class AdminAuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        $adminEmail = config('admin.email');
        $adminPasswordHash = config('admin.password_hash');
        if (
            $credentials['email'] !== $adminEmail ||
            ! Hash::check($credentials['password'], $adminPasswordHash)
        ) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Les identifiants sont incorrects.',
                ]);
        }
        $request->session()->regenerate();
        $request->session()->put('admin_authenticated', true);
        return redirect()->intended(route('dashboard'));
    }
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('admin_authenticated');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('login')
            ->with('success', 'Vous avez été déconnecté.');
    }
}