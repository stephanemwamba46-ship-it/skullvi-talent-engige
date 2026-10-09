<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — SKULLVI Talent Engine</title>
    <meta
        name="description"
        content="Connectez-vous à votre espace recruteur SKULLVI Talent Engine."
    >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="min-h-screen bg-slate-950 text-slate-900 antialiased">
    <main class="grid min-h-screen lg:grid-cols-2">
        {{-- PANNEAU GAUCHE --}}
        <section class="relative hidden overflow-hidden bg-slate-950 p-10 text-white lg:flex lg:flex-col lg:justify-between xl:p-14">
            {{-- Décoration --}}
            <div class="pointer-events-none absolute -right-32 top-1/4 h-96 w-96 rounded-full bg-blue-600/10 blur-3xl"></div>
            <div class="pointer-events-none absolute -left-32 bottom-0 h-80 w-80 rounded-full bg-indigo-500/10 blur-3xl"></div>
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="relative z-10 inline-flex w-fit items-center gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-600 text-xl font-black text-white shadow-lg shadow-blue-600/20">
                    S
                </span>
                <span>
                    <span class="block text-lg font-extrabold tracking-wide">SKULLVI</span>
                    <span class="mt-1 block text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-400">
                        Talent Engine
                    </span>
                </span>
            </a>
            {{-- Message principal --}}
            <div class="relative z-10 my-16 max-w-xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-400/20 bg-blue-500/10 px-4 py-2 text-xs font-semibold text-blue-300">
                    <span class="h-2 w-2 rounded-full bg-blue-400"></span>
                    Espace recruteur
                </div>
                <h1 class="mt-7 text-4xl font-black leading-tight tracking-tight xl:text-5xl">
                    Les profils.<br>
                    Les données.<br>
                    <span class="text-blue-400">Les bonnes décisions.</span>
                </h1>
                <p class="mt-6 max-w-md text-base leading-8 text-slate-400">
                    Retrouvez les candidatures, évaluez les compétences et identifiez les profils prioritaires depuis un espace centralisé.
                </p>
                {{-- Trois indicateurs visuels --}}
                <div class="mt-10 grid max-w-md grid-cols-3 gap-4 border-t border-white/10 pt-6">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 h-5 w-5 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M10 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" transform="translate(2 0)"/>
                        </svg>
                        <p class="text-xs font-semibold text-slate-300">Candidats</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 h-5 w-5 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5-2a2 2 0 0 0-2-2h-1V4H7v2H6a2 2 0 0 0-2 2v12h16V8Z"/>
                        </svg>
                        <p class="text-xs font-semibold text-slate-300">Évaluation</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 h-5 w-5 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18M8 15l4-4 4 4 5-7"/>
                        </svg>
                        <p class="text-xs font-semibold text-slate-300">Priorités</p>
                    </div>
                </div>
            </div>
            {{-- Pied de panneau --}}
            <div class="relative z-10 flex items-center justify-between gap-4 border-t border-white/10 pt-5">
                <p class="text-xs text-slate-500">
                    © {{ date('Y') }} SKULLVI Talent Engine
                </p>
                <span class="text-xs text-slate-600">
                    Human Capital Program
                </span>
            </div>
        </section>
        {{-- PANNEAU DROIT : CONNEXION --}}
        <section class="flex min-h-screen items-center justify-center bg-slate-50 px-4 py-8 sm:px-6 sm:py-12">
            <div class="w-full max-w-md">
                {{-- Retour mobile --}}
                <a
                    href="{{ route('home') }}"
                    class="mb-8 inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-blue-600 lg:hidden"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7 7-7-7 7-7"/>
                    </svg>
                    Retour à l'accueil
                </a>
                {{-- Carte de connexion --}}
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xl shadow-slate-200/60 sm:rounded-3xl sm:p-9">
                    {{-- En-tête de la carte --}}
                    <div class="mb-8">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-950 text-xl font-black text-white shadow-lg shadow-slate-950/10">
                            S
                        </div>
                        <p class="mt-7 text-xs font-bold uppercase tracking-[0.18em] text-blue-600">
                            Espace sécurisé
                        </p>
                        <h2 class="mt-2 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                            Bon retour !
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Connectez-vous pour accéder à votre espace recruteur.
                        </p>
                    </div>
                    {{-- Message de session --}}
                    @if (session('error'))
                        <div role="alert" class="mb-5 flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" d="M12 8v4m0 4h.01"/>
                            </svg>
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif
                    @if (session('success'))
                        <div role="status" class="mb-5 flex gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                            </svg>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div role="alert" class="mb-5 flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" d="M12 8v4m0 4h.01"/>
                            </svg>
                            <p>{{ $errors->first() }}</p>
                        </div>
                    @endif
                    {{-- Formulaire --}}
                    <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                        @csrf
                        {{-- E-mail --}}
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                                Adresse e-mail
                            </label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m3 7 9 6 9-6"/>
                                    </svg>
                                </div>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="email"
                                    placeholder="exemple@entreprise.com"
                                    class="w-full rounded-xl border border-slate-200 bg-white py-3.5 pl-12 pr-4 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 @error('email') border-red-400 focus:border-red-500 focus:ring-red-500/10 @enderror"
                                >
                            </div>
                            @error('email')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Mot de passe --}}
                        <div x-data="{ showPassword: false }">
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <label for="password" class="block text-sm font-semibold text-slate-700">
                                    Mot de passe
                                </label>
                            </div>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10V7a4 4 0 1 1 8 0v3"/>
                                    </svg>
                                </div>
                                <input
                                    id="password"
                                    name="password"
                                    x-bind:type="showPassword ? 'text' : 'password'"
                                    type="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Saisissez votre mot de passe"
                                    class="w-full rounded-xl border border-slate-200 bg-white py-3.5 pl-12 pr-12 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
                                >
                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    :aria-label="showPassword ? 'Masquer le mot de passe' : 'Afficher le mot de passe'"
                                    :aria-pressed="showPassword"
                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 transition hover:text-blue-600 focus:outline-none focus:text-blue-600"
                                >
                                    {{-- Icône œil --}}
                                    <svg x-show="!showPassword" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.5 12s3.5-7 9.5-7 9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7Z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    {{-- Icône œil barré --}}
                                    <svg x-show="showPassword" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 5.2A10.7 10.7 0 0 1 12 5c6 0 9.5 7 9.5 7a15 15 0 0 1-3.2 4.1M6.2 6.2A17.4 17.4 0 0 0 2.5 12s3.5 7 9.5 7c1.4 0 2.6-.4 3.7-1"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Bouton de connexion --}}
                        <button
                            type="submit"
                            class="group flex w-full items-center justify-center gap-3 rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-slate-950/10 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20"
                        >
                            Se connecter
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </button>
                    </form>
                    {{-- Retour accueil --}}
                    <div class="mt-7 border-t border-slate-100 pt-6">
                        <a
                            href="{{ route('home') }}"
                            class="flex items-center justify-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-blue-600"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7 7-7-7 7-7"/>
                            </svg>
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
                {{-- Mention sous la carte --}}
                <p class="mt-6 px-4 text-center text-xs leading-6 text-slate-400">
                    Accès réservé aux personnes autorisées.<br>
                    SKULLVI Talent Engine · Human Capital Program
                </p>
            </div>
        </section>
    </main>
</body>
</html>