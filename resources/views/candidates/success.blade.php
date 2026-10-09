<!DOCTYPE html><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Candidature reçue — Skullvi Talent Engine</title>
<meta
    name="description"
    content="Confirmation de réception de votre candidature."
>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head><body class="flex min-h-screen items-center justify-center bg-slate-950 px-4 py-8 text-slate-900 antialiased">{{-- Décorations --}}
<div class="pointer-events-none fixed inset-0 overflow-hidden">
    <div class="absolute -left-32 -top-32 h-80 w-80 rounded-full bg-blue-600/10 blur-3xl"></div>
    <div class="absolute -bottom-32 -right-32 h-80 w-80 rounded-full bg-indigo-600/10 blur-3xl"></div>
</div>
<main class="relative w-full max-w-xl">
    {{-- Logo --}}
    <div class="mb-6 flex justify-center">
        <a
            href="{{ route('home') }}"
            class="flex items-center gap-3"
        >
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 font-black text-white shadow-lg shadow-blue-600/20">
                S
            </div>
            <div class="text-left">
                <p class="font-bold leading-none text-white">
                    Skullvi
                </p>
                <p class="mt-1 text-[11px] text-slate-500">
                    Talent Engine
                </p>
            </div>
        </a>
    </div>
    {{-- Carte --}}
    <div class="overflow-hidden rounded-2xl border border-white/10 bg-white shadow-2xl shadow-black/20">
        <div class="px-5 py-10 text-center sm:px-10 sm:py-12">
            {{-- Icône succès --}}
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 ring-8 ring-emerald-50/60 sm:h-20 sm:w-20">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 sm:h-10 sm:w-10"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m5 12 4 4L19 6"
                    />
                </svg>
            </div>
            <div class="mx-auto mt-7 max-w-md">
                <div class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                    Candidature enregistrée
                </div>
                <h1 class="mt-4 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                    Candidature reçue
                </h1>
                <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                    Merci
                    <span class="font-bold text-slate-900">
                        {{ session('candidate_name') }}
                    </span>.
                    Votre candidature a bien été enregistrée.
                </p>
            </div>
            {{-- Résumé --}}
            <div class="mx-auto mt-8 max-w-md rounded-xl border border-slate-200 bg-slate-50 p-4 text-left">
                <div class="flex items-start gap-3">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 3v5h5"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-900">
                            Prochaine étape
                        </p>
                        <p class="mt-1 text-xs leading-5 text-slate-500">
                            Votre candidature reste disponible dans le système pour l'analyse
                            et la qualification par le recruteur.
                        </p>
                    </div>
                </div>
            </div>
            {{-- Actions --}}
            <div class="mx-auto mt-8 flex max-w-md flex-col gap-3 sm:flex-row sm:justify-center">
                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                >
                    Retour à l'accueil
                </a>
                <a
                    href="{{ route('candidates.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700"
                >
                    Nouvelle candidature
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/>
                    </svg>
                </a>
            </div>
        </div>
        {{-- Footer de la carte --}}
        <div class="border-t border-slate-100 bg-slate-50 px-5 py-4 text-center sm:px-10">
            <p class="text-xs text-slate-400">
                Skullvi Talent Engine · Human Capital Program
            </p>
        </div>
    </div>
    {{-- Retour --}}
    <p class="mt-6 text-center text-xs text-slate-600">
        Une erreur ou une question ?
        <a
            href="{{ route('home') }}"
            class="font-semibold text-slate-400 transition hover:text-white"
        >
            Retourner à l'accueil
        </a>
    </p>
</main>
</body>
</html>