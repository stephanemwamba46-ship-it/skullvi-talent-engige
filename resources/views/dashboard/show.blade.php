<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $application->candidate->first_name }}
        {{ $application->candidate->last_name }}
        — SKULLVI Talent Engine
    </title>
    <meta
        name="description"
        content="Consultez et qualifiez le profil d'un candidat."
    >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    {{-- En-tête --}}
    <header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/95 backdrop-blur-xl">
        <div class="mx-auto flex max-w-[1400px] items-center justify-between gap-3 px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="flex min-w-0 items-center gap-3">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-950 text-lg font-black text-white">
                    S
                </span>
                <span class="min-w-0">
                    <span class="block text-sm font-extrabold tracking-wide text-slate-950">
                        SKULLVI
                    </span>
                    <span class="mt-1 block text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-400">
                        Talent Engine
                    </span>
                </span>
            </a>
            <div class="flex shrink-0 items-center gap-2">
                <a
                    href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-bold text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700 sm:px-4"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7 7-7-7 7-7"/>
                    </svg>
                    <span class="hidden sm:inline">Tableau de bord</span>
                    <span class="sm:hidden">Retour</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        aria-label="Déconnexion"
                        title="Déconnexion"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-red-200 bg-red-50 text-red-700 transition hover:bg-red-100 sm:h-11 sm:w-11"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5-5-5m5 5H3m9-9h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </header>
    <main class="mx-auto max-w-[1400px] px-4 py-7 sm:px-6 sm:py-10 lg:px-8">
        {{-- Fil d'Ariane --}}
        <nav class="mb-6 flex items-center gap-2 text-xs font-semibold text-slate-400 sm:text-sm">
            <a href="{{ route('dashboard') }}" class="transition hover:text-blue-600">
                Candidatures
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6"/>
            </svg>
            <span class="truncate text-slate-700">
                Profil du candidat
            </span>
        </nav>
        {{-- Messages de retour --}}
        @if (session('success'))
            <div role="status" class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div role="alert" class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="9"/>
                    <path stroke-linecap="round" d="M12 8v4m0 4h.01"/>
                </svg>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        {{-- Présentation du candidat --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm sm:rounded-3xl">
            <div class="h-2 bg-gradient-to-r from-blue-700 via-blue-500 to-indigo-400"></div>
            <div class="p-5 sm:p-8">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
                    <div class="flex min-w-0 items-start gap-4 sm:gap-5">
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-xl font-black uppercase text-blue-700 sm:h-20 sm:w-20 sm:text-2xl">
                            {{ mb_substr($application->candidate->first_name, 0, 1) }}{{ mb_substr($application->candidate->last_name, 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-blue-600">
                                Profil candidat
                            </p>
                            <h1 class="mt-2 break-words text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                                {{ $application->candidate->first_name }}
                                {{ $application->candidate->last_name }}
                            </h1>
                            <p class="mt-2 break-all text-sm text-slate-500">
                                {{ $application->candidate->email }}
                            </p>
                            <div class="mt-4 flex flex-wrap items-center gap-2">
                                @if ($application->priority === 'high')
                                    <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700 ring-1 ring-inset ring-red-200">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                        Priorité élevée
                                    </span>
                                @elseif ($application->priority === 'medium')
                                    <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700 ring-1 ring-inset ring-amber-200">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Priorité moyenne
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600 ring-1 ring-inset ring-slate-200">
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                        Priorité faible
                                    </span>
                                @endif
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">
                                    Score : {{ $application->score }}/100
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- Résumé du score --}}
                    <div class="flex shrink-0 items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 sm:min-w-[190px] sm:flex-col sm:items-center sm:justify-center sm:p-5">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full border-4 border-blue-100 bg-white text-xl font-black text-slate-950 sm:h-20 sm:w-20 sm:text-2xl">
                            {{ $application->score }}
                        </div>
                        <div class="sm:text-center">
                            <p class="text-sm font-extrabold text-slate-900">
                                Score global
                            </p>
                            <p class="mt-1 text-xs text-slate-500">
                                Sur 100 points
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Organisation du contenu --}}
        <div class="mt-6 grid items-start gap-6 lg:grid-cols-3">
            {{-- Colonne principale --}}
            <div class="space-y-6 lg:col-span-2">
                {{-- Informations personnelles --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <circle cx="12" cy="8" r="4"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-2a8 8 0 0 1 16 0v2"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-black text-slate-950">
                                Informations personnelles
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Coordonnées et disponibilité
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 grid gap-x-6 gap-y-6 sm:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold text-slate-400">Prénom</p>
                            <p class="mt-2 break-words text-sm font-bold text-slate-800">
                                {{ $application->candidate->first_name }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-slate-400">Nom</p>
                            <p class="mt-2 break-words text-sm font-bold text-slate-800">
                                {{ $application->candidate->last_name }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-slate-400">Adresse e-mail</p>
                            <p class="mt-2 break-all text-sm font-bold text-slate-800">
                                {{ $application->candidate->email }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-slate-400">Téléphone</p>
                            <p class="mt-2 break-words text-sm font-bold text-slate-800">
                                {{ $application->candidate->phone ?: 'Non renseigné' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-slate-400">Ville</p>
                            <p class="mt-2 text-sm font-bold text-slate-800">
                                {{ $application->candidate->city ?: 'Non renseignée' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-slate-400">Disponibilité</p>
                            @if ($application->candidate->available)
                                <p class="mt-2 inline-flex items-center gap-2 text-sm font-bold text-emerald-700">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                    Disponible
                                </p>
                            @else
                                <p class="mt-2 inline-flex items-center gap-2 text-sm font-bold text-slate-500">
                                    <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                                    Non disponible
                                </p>
                            @endif
                        </div>
                    </div>
                </section>
                {{-- Formation et expérience --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3 2 8l10 5 10-5-10-5Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m6 10 0 6c3.5 3 8.5 3 12 0v-6M22 8v6"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-black text-slate-950">
                                Formation et expérience
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Parcours académique et professionnel
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                            <p class="text-xs font-semibold text-slate-400">
                                Niveau d'études
                            </p>
                            <p class="mt-2 text-sm font-extrabold text-slate-900">
                                {{ $application->candidate->education_level }}
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                            <p class="text-xs font-semibold text-slate-400">
                                Domaine d'études
                            </p>
                            <p class="mt-2 break-words text-sm font-extrabold text-slate-900">
                                {{ $application->candidate->field_of_study ?: 'Non renseigné' }}
                            </p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 sm:col-span-2">
                            <p class="text-xs font-semibold text-slate-400">
                                Expérience professionnelle
                            </p>
                            <p class="mt-2 text-sm font-extrabold text-slate-900">
                                {{ $application->candidate->experience_years }}
                                {{ $application->candidate->experience_years > 1 ? 'ans' : 'an' }}
                            </p>
                        </div>
                    </div>
                </section>
                {{-- Compétences --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4m5-2a2 2 0 0 0-2-2h-1V4H7v2H6a2 2 0 0 0-2 2v12h16V8Z"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-black text-slate-950">
                                Compétences
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Savoir-faire déclarés par le candidat
                            </p>
                        </div>
                    </div>
                    <p class="mt-5 whitespace-pre-line break-words text-sm leading-7 text-slate-700">{{ $application->candidate->skills ?: 'Aucune compétence renseignée.' }}</p>
                </section>
                {{-- Motivation --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-black text-slate-950">
                                Lettre de motivation
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Motivation et intérêt pour l'opportunité
                            </p>
                        </div>
                    </div>
                    <p class="mt-5 whitespace-pre-line break-words text-sm leading-7 text-slate-700">{{ $application->candidate->motivation ?: 'Aucune motivation renseignée.' }}</p>
                </section>
            </div>
{{-- ===============
     {{-- Colonne latérale --}}
            <aside class="space-y-6 lg:sticky lg:top-24">
                {{-- CV --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 2v6h6M8 13h8m-8 4h8"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-black text-slate-950">
                                Curriculum Vitae
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Document du candidat
                            </p>
                        </div>
                    </div>
                    @if ($application->candidate->cv_path)
                        <div class="mt-5 rounded-xl border border-emerald-100 bg-emerald-50 p-4">
                            <div class="flex items-center gap-2 text-sm font-bold text-emerald-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                                </svg>
                                CV disponible
                            </div>
                            <p class="mt-2 text-xs leading-5 text-emerald-700">
                                Un document a été fourni avec cette candidature.
                            </p>
                        </div>
                        <a
                            href="{{ route('dashboard.cv', $application) }}"
                            class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-600/15 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0 4-4m-4 4-4-4M4 17v3h16v-3"/>
                            </svg>
                            Télécharger le CV
                        </a>
                    @else
                        <div class="mt-5 rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm leading-6 text-slate-500">
                            Aucun CV n'a été joint à cette candidature.
                        </div>
                    @endif
                </section>
                {{-- Qualification automatique --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3m0 12v3m9-9h-3M6 12H3m12.36-6.36-2.12 2.12M8.76 15.24l-2.12 2.12m10.72 0-2.12-2.12M8.76 8.76 6.64 6.64"/>
                                <circle cx="12" cy="12" r="5"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-black text-slate-950">
                                Qualification
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Détail du score automatique
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 rounded-2xl bg-slate-950 p-5 text-white">
                        <div class="flex items-end justify-between gap-3">
                            <div>
                                <p class="text-xs font-semibold text-slate-400">
                                    Score total
                                </p>
                                <p class="mt-2 text-3xl font-black">
                                    {{ $application->score }}<span class="text-base font-bold text-slate-400">/100</span>
                                </p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8 12 2.5 2.5L16 9"/>
                            </svg>
                        </div>
                        <div class="mt-4 h-2 overflow-hidden rounded-full bg-white/10">
                            <div
                                class="h-full rounded-full bg-blue-500"
                                style="width: {{ max(0, min(100, (float) $application->score)) }}%"
                            ></div>
                        </div>
                    </div>
                    <div class="mt-5 space-y-5">
                        @php
                            $scoreDetails = [
                                ['label' => 'Formation', 'score' => $application->education_score, 'max' => 20],
                                ['label' => 'Expérience', 'score' => $application->experience_score, 'max' => 20],
                                ['label' => 'Compétences', 'score' => $application->skills_score, 'max' => 30],
                                ['label' => 'Disponibilité', 'score' => $application->availability_score, 'max' => 15],
                                ['label' => 'Motivation', 'score' => $application->motivation_score, 'max' => 15],
                            ];
                        @endphp
                        @foreach ($scoreDetails as $detail)
                            <div>
                                <div class="mb-2 flex items-center justify-between gap-3">
                                    <span class="text-sm font-semibold text-slate-600">
                                        {{ $detail['label'] }}
                                    </span>
                                    <span class="text-sm font-extrabold text-slate-900">
                                        {{ $detail['score'] }}<span class="font-semibold text-slate-400">/{{ $detail['max'] }}</span>
                                    </span>
                                </div>
                                <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                                    <div
                                        class="h-full rounded-full bg-blue-600"
                                        style="width: {{ $detail['max'] > 0 ? max(0, min(100, ((float) $detail['score'] / $detail['max']) * 100)) : 0 }}%"
                                    ></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-5 border-t border-slate-100 pt-4 text-xs leading-5 text-slate-400">
                        Le score est une aide à l'évaluation. Il ne remplace pas l'examen humain du dossier.
                    </p>
                </section>
                {{-- Suivi du candidat --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-black text-slate-950">
                                Suivi du dossier
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                État de la candidature
                            </p>
                        </div>
                    </div>
                    <form
                        method="POST"
                        action="{{ route('dashboard.status', $application) }}"
                        class="mt-5"
                    >
                        @csrf
                        @method('PATCH')
                        <label for="status" class="mb-2 block text-sm font-bold text-slate-700">
                            Statut actuel
                        </label>
                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm font-semibold text-slate-800 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
                        >
                            <option value="new" @selected($application->status === 'new')>
                                Nouveau
                            </option>
                            <option value="reviewing" @selected($application->status === 'reviewing')>
                                En examen
                            </option>
                            <option value="shortlisted" @selected($application->status === 'shortlisted')>
                                Présélectionné
                            </option>
                            <option value="rejected" @selected($application->status === 'rejected')>
                                Rejeté
                            </option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                        <button
                            type="submit"
                            class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-slate-950 px-4 py-3.5 text-sm font-bold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12v7h14v-7M12 3v11m-4-4 4 4 4-4"/>
                            </svg>
                            Mettre à jour le statut
                        </button>
                    </form>
                </section>
            </aside>
        </div>
        {{-- Pied de page --}}
        <footer class="mt-8 flex flex-col gap-2 border-t border-slate-200 py-5 text-center sm:flex-row sm:items-center sm:justify-between sm:text-left">
            <p class="text-xs text-slate-400">
                © {{ date('Y') }} SKULLVI Talent Engine
            </p>
            <a
                href="{{ route('dashboard') }}"
                class="inline-flex items-center justify-center gap-2 text-xs font-bold text-slate-500 transition hover:text-blue-600"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7 7-7-7 7-7"/>
                </svg>
                Retour aux candidatures
            </a>
        </footer>
    </main>
</body>
</html>