<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord — SKULLVI Talent Engine</title>
    <meta
        name="description"
        content="Tableau de bord de gestion et de qualification des candidatures."
    >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    {{-- En-tête --}}
    <header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/95 backdrop-blur-xl">
        <div class="mx-auto flex max-w-[1600px] items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            {{-- Identité --}}
            <a href="{{ route('dashboard') }}" class="flex min-w-0 items-center gap-3">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-950 text-lg font-black text-white shadow-lg shadow-slate-950/10">
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
            {{-- Actions --}}
            <div class="flex shrink-0 items-center gap-2 sm:gap-3">
                <a
                    href="{{ route('candidates.create') }}"
                    class="hidden items-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/15 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 sm:inline-flex"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/>
                    </svg>
                    Nouvelle candidature
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 px-3 py-3 text-sm font-bold text-red-700 transition hover:bg-red-100 focus:outline-none focus:ring-4 focus:ring-red-500/10 sm:px-4"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5-5-5m5 5H3m9-9h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
                        </svg>
                        <span class="hidden sm:inline">Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>
    </header>
    <main class="mx-auto max-w-[1600px] px-4 py-7 sm:px-6 sm:py-10 lg:px-8">
        {{-- Présentation --}}
        <section class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">
                    <span class="h-2 w-2 rounded-full bg-blue-600"></span>
                    Espace recruteur
                </div>
                <h1 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                    Tableau de bord
                </h1>
                <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                    Retrouvez les candidatures, évaluez les profils et identifiez les talents à examiner en priorité.
                </p>
            </div>
            <a
                href="{{ route('candidates.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-600/15 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 sm:hidden"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/>
                </svg>
                Nouvelle candidature
            </a>
        </section>
        {{-- Messages de retour --}}
        @if (session('success'))
            <div role="status" class="mt-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div role="alert" class="mt-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="9"/>
                    <path stroke-linecap="round" d="M12 8v4m0 4h.01"/>
                </svg>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        {{-- Statistiques --}}
        <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            {{-- Total --}}
            <article class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md sm:p-6">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">
                            Candidatures reçues
                        </p>
                        <p class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                            {{ $statistics['total'] }}
                        </p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 transition group-hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M10 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" transform="translate(2 0)"/>
                        </svg>
                    </span>
                </div>
                <div class="mt-5 flex items-center gap-2 border-t border-slate-100 pt-4">
                    <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                    <p class="text-xs text-slate-500">Ensemble des profils reçus</p>
                </div>
            </article>
            {{-- Score moyen --}}
            <article class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md sm:p-6">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">
                            Score moyen
                        </p>
                        <p class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                            {{ $statistics['average_score'] }}<span class="ml-1 text-lg font-bold text-slate-400">/100</span>
                        </p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-50 text-violet-600 transition group-hover:bg-violet-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3m0 12v3m9-9h-3M6 12H3m15.36-6.36-2.12 2.12M7.76 16.24l-2.12 2.12m12.72 0-2.12-2.12M7.76 7.76 5.64 5.64"/>
                            <circle cx="12" cy="12" r="5"/>
                        </svg>
                    </span>
                </div>
                <div class="mt-5 flex items-center gap-2 border-t border-slate-100 pt-4">
                    <span class="h-1.5 w-1.5 rounded-full bg-violet-500"></span>
                    <p class="text-xs text-slate-500">Résultat moyen de qualification</p>
                </div>
            </article>
            {{-- Priorité élevée --}}
            <article class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md sm:p-6">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">
                            Priorité élevée
                        </p>
                        <p class="mt-4 text-3xl font-black tracking-tight text-red-600 sm:text-4xl">
                            {{ $statistics['high_priority'] }}
                        </p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 text-red-600 transition group-hover:bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.86 1.82 18.5A2 2 0 0 0 3.55 21h16.9a2 2 0 0 0 1.73-2.5L13.7 3.86a2 2 0 0 0-3.4 0Z"/>
                        </svg>
                    </span>
                </div>
                <div class="mt-5 flex items-center gap-2 border-t border-slate-100 pt-4">
                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                    <p class="text-xs text-slate-500">Profils à examiner rapidement</p>
                </div>
            </article>
            {{-- À examiner --}}
            <article class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md sm:p-6">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">
                            À examiner
                        </p>
                        <p class="mt-4 text-3xl font-black tracking-tight text-blue-600 sm:text-4xl">
                            {{ $statistics['to_review'] }}
                        </p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-amber-600 transition group-hover:bg-amber-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="12" r="9"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"/>
                        </svg>
                    </span>
                </div>
                <div class="mt-5 flex items-center gap-2 border-t border-slate-100 pt-4">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    <p class="text-xs text-slate-500">Priorité moyenne ou élevée</p>
                </div>
            </article>
        </section>
        {{-- Liste des candidatures --}}
        <section class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm sm:rounded-3xl">
            {{-- En-tête --}}
            <div class="flex flex-col gap-4 border-b border-slate-200 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <div>
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                            </svg>
                        </span>
                        <h2 class="text-lg font-black tracking-tight text-slate-950">
                            Candidatures classées
                        </h2>
                    </div>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Les profils sont présentés selon leur score de qualification.
                    </p>
                </div>
                <span class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-600">
                    <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                    Classement par score
                </span>
            </div>
{{-- ===============
{{-- Tableau ordinateur --}}
            <div class="hidden overflow-x-auto md:block">
                <table class="min-w-full text-left">
                    <thead class="bg-slate-50/80">
                        <tr>
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Candidat
                            </th>
                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Formation
                            </th>
                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Score
                            </th>
                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Priorité
                            </th>
                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Statut
                            </th>
                            <th class="whitespace-nowrap px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($applications as $application)
                            <tr class="transition hover:bg-slate-50/80">
                                {{-- Candidat --}}
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-sm font-extrabold uppercase text-blue-700">
                                            {{ mb_substr($application->candidate->first_name, 0, 1) }}{{ mb_substr($application->candidate->last_name, 0, 1) }}
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-bold text-slate-900">
                                                {{ $application->candidate->first_name }}
                                                {{ $application->candidate->last_name }}
                                            </p>
                                            <p class="mt-1 max-w-[240px] truncate text-xs text-slate-500">
                                                {{ $application->candidate->email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                {{-- Formation --}}
                                <td class="px-5 py-5">
                                    <span class="inline-flex rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-semibold text-slate-700">
                                        {{ $application->candidate->education_level }}
                                    </span>
                                </td>
                                {{-- Score --}}
                                <td class="px-5 py-5">
                                    <div class="flex items-center gap-3">
                                        <span class="min-w-[62px] font-black text-slate-950">
                                            {{ $application->score }}<span class="text-xs font-semibold text-slate-400">/100</span>
                                        </span>
                                        <div class="h-1.5 w-16 overflow-hidden rounded-full bg-slate-100">
                                            <div
                                                class="h-full rounded-full bg-blue-600"
                                                style="width: {{ max(0, min(100, (float) $application->score)) }}%"
                                            ></div>
                                        </div>
                                    </div>
                                </td>
                                {{-- Priorité --}}
                                <td class="px-5 py-5">
                                    @include('dashboard.partials.priority', ['priority' => $application->priority])
                                </td>
                                {{-- Statut --}}
                                <td class="px-5 py-5">
                                    @php
                                        $statusLabels = [
                                            'new' => 'Nouveau',
                                            'reviewing' => 'En examen',
                                            'shortlisted' => 'Présélectionné',
                                            'rejected' => 'Rejeté',
                                        ];
                                        $statusStyles = [
                                            'new' => 'bg-blue-50 text-blue-700 ring-blue-600/10',
                                            'reviewing' => 'bg-amber-50 text-amber-700 ring-amber-600/10',
                                            'shortlisted' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/10',
                                            'rejected' => 'bg-red-50 text-red-700 ring-red-600/10',
                                        ];
                                        $status = $application->status;
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full px-2.5 py-1.5 text-xs font-bold ring-1 ring-inset {{ $statusStyles[$status] ?? 'bg-slate-100 text-slate-600 ring-slate-200' }}">
                                        <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                        {{ $statusLabels[$status] ?? $status }}
                                    </span>
                                </td>
                                {{-- Action --}}
                                <td class="px-6 py-5 text-right">
                                    <a
                                        href="{{ route('dashboard.show', $application) }}"
                                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs font-bold text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700"
                                    >
                                        Voir le profil
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                                        </svg>
                                    </div>
                                    <h3 class="mt-4 font-bold text-slate-900">
                                        Aucune candidature pour le moment
                                    </h3>
                                    <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">
                                        Les candidatures enregistrées apparaîtront ici avec leur score et leur niveau de priorité.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Cartes mobiles --}}
            <div class="space-y-3 p-4 md:hidden">
                @forelse ($applications as $application)
                    <article class="rounded-2xl border border-slate-200 bg-white p-4 transition hover:border-blue-200">
                        <div class="flex items-start gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-sm font-extrabold uppercase text-blue-700">
                                {{ mb_substr($application->candidate->first_name, 0, 1) }}{{ mb_substr($application->candidate->last_name, 0, 1) }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <h3 class="truncate font-extrabold text-slate-950">
                                    {{ $application->candidate->first_name }}
                                    {{ $application->candidate->last_name }}
                                </h3>
                                <p class="mt-1 truncate text-xs text-slate-500">
                                    {{ $application->candidate->email }}
                                </p>
                                <div class="mt-3">
                                    @include('dashboard.partials.priority', ['priority' => $application->priority])
                                </div>
                            </div>
                            <div class="shrink-0 rounded-xl bg-slate-950 px-2.5 py-2 text-center text-white">
                                <p class="text-base font-black leading-none">
                                    {{ $application->score }}
                                </p>
                                <p class="mt-1 text-[9px] font-semibold text-slate-400">
                                    /100
                                </p>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-3 border-y border-slate-100 py-4">
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">
                                    Formation
                                </p>
                                <p class="mt-1 text-sm font-bold text-slate-800">
                                    {{ $application->candidate->education_level }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">
                                    Statut
                                </p>
                                <p class="mt-1 text-sm font-bold text-slate-800">
                                    {{ match ($application->status) {
                                        'new' => 'Nouveau',
                                        'reviewing' => 'En examen',
                                        'shortlisted' => 'Présélectionné',
                                        'rejected' => 'Rejeté',
                                        default => $application->status,
                                    } }}
                                </p>
                            </div>
                        </div>
                        <a
                            href="{{ route('dashboard.show', $application) }}"
                            class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-slate-950 px-4 py-3 text-sm font-bold text-white transition hover:bg-blue-700"
                        >
                            Consulter le profil
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </a>
                    </article>
                @empty
                    <div class="px-3 py-12 text-center">
                        <p class="font-bold text-slate-800">
                            Aucune candidature enregistrée
                        </p>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Les nouveaux profils apparaîtront ici.
                        </p>
                    </div>
                @endforelse
            </div>
            {{-- Pagination --}}
            @if ($applications->hasPages())
                <div class="border-t border-slate-200 px-4 py-4 sm:px-6">
                    {{ $applications->links() }}
                </div>
            @endif
        </section>
        {{-- Pied de page --}}
        <footer class="mt-8 flex flex-col gap-2 border-t border-slate-200 py-5 text-center sm:flex-row sm:items-center sm:justify-between sm:text-left">
            <p class="text-xs text-slate-400">
                © {{ date('Y') }} SKULLVI Talent Engine
            </p>
            <p class="text-xs text-slate-400">
                Human Capital Program · Espace recruteur
            </p>
        </footer>
    </main>
</body>
</html>