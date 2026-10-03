<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $application->candidate->first_name }}
        {{ $application->candidate->last_name }}
        — Talent Engine
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100">
    {{-- Header --}}
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-5">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Profil du candidat
                </h1>
                <p class="text-sm text-gray-500">
                    Détails et qualification de la candidature
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-lg bg-gray-100 px-4 py-2 font-semibold text-gray-700 hover:bg-gray-200 transition"
                >
                    ← Retour
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="rounded-lg bg-red-50 px-4 py-2 font-semibold text-red-700 hover:bg-red-100 transition"
                    >
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </header>
    <main class="mx-auto max-w-5xl px-4 py-8">
        {{-- Identité --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ $application->candidate->first_name }}
                        {{ $application->candidate->last_name }}
                    </h2>
                    <p class="mt-1 text-gray-500">
                        {{ $application->candidate->email }}
                    </p>
                </div>
                <div>
                    @if ($application->priority === 'high')
                        <span class="rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700">
                            Priorité élevée
                        </span>
                    @elseif ($application->priority === 'medium')
                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700">
                            Priorité moyenne
                        </span>
                    @else
                        <span class="rounded-full bg-gray-100 px-3 py-1 text-sm font-semibold text-gray-700">
                            Priorité faible
                        </span>
                    @endif
                </div>
            </div>
        </div>
        {{-- Informations personnelles --}}
        <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-gray-900">
                Informations personnelles
            </h3>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                <div>
                    <p class="text-sm text-gray-500">
                        Prénom
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->first_name }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">
                        Nom
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->last_name }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">
                        E-mail
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->email }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">
                        Téléphone
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->phone }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">
                        Ville
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->city }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">
                        Disponibilité
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->available ? 'Disponible' : 'Non disponible' }}
                    </p>
                </div>
            </div>
        </div>
        {{-- Formation et expérience --}}
        <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-gray-900">
                Formation et expérience
            </h3>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                <div>
                    <p class="text-sm text-gray-500">
                        Niveau d'études
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->education_level }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">
                        Domaine d'études
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->field_of_study ?: 'Non renseigné' }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">
                        Expérience
                    </p>
                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $application->candidate->experience_years }}
                        {{ $application->candidate->experience_years > 1 ? 'ans' : 'an' }}
                    </p>
                </div>
            </div>
        </div>
        {{-- Compétences --}}
        <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-gray-900">
                Compétences
            </h3>
            <p class="mt-4 whitespace-pre-line text-gray-700">
                {{ $application->candidate->skills }}
            </p>
        </div>
        {{-- Motivation --}}
        <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-gray-900">
                Motivation
            </h3>
            <p class="mt-4 whitespace-pre-line leading-7 text-gray-700">
                {{ $application->candidate->motivation }}
            </p>
        </div>
        {{-- CV --}}
        <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">
                        Curriculum Vitae
                    </h3>
                    @if ($application->candidate->cv_path)
                        <p class="mt-1 text-sm text-gray-500">
                            Un CV a été fourni avec cette candidature.
                        </p>
                    @else
                        <p class="mt-1 text-sm text-gray-500">
                            Aucun CV n'a été fourni.
                        </p>
                    @endif
                </div>
                @if ($application->candidate->cv_path)
                    <a
                        href="{{ route('dashboard.cv', $application) }}"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700 transition"
                    >
                        Télécharger le CV
                    </a>
                @endif
            </div>
        </div>
        {{-- Qualification --}}
        <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-gray-900">
                Qualification automatique
            </h3>
            <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-lg bg-gray-50 p-4">
                    <p class="text-sm text-gray-500">
                        Score total
                    </p>
                    <p class="mt-1 text-2xl font-bold text-gray-900">
                        {{ $application->score }}/100
                    </p>
                </div>
                <div class="rounded-lg bg-gray-50 p-4">
                    <p class="text-sm text-gray-500">
                        Formation
                    </p>
                    <p class="mt-1 text-xl font-bold text-gray-900">
                        {{ $application->education_score }}/20
                    </p>
                </div>
                <div class="rounded-lg bg-gray-50 p-4">
                    <p class="text-sm text-gray-500">
                        Expérience
                    </p>
                    <p class="mt-1 text-xl font-bold text-gray-900">
                        {{ $application->experience_score }}/20
                    </p>
                </div>
                <div class="rounded-lg bg-gray-50 p-4">
                    <p class="text-sm text-gray-500">
                        Compétences
                    </p>
                    <p class="mt-1 text-xl font-bold text-gray-900">
                        {{ $application->skills_score }}/30
                    </p>
                </div>
                <div class="rounded-lg bg-gray-50 p-4">
                    <p class="text-sm text-gray-500">
                        Disponibilité
                    </p>
                    <p class="mt-1 text-xl font-bold text-gray-900">
                        {{ $application->availability_score }}/15
                    </p>
                </div>
                <div class="rounded-lg bg-gray-50 p-4">
                    <p class="text-sm text-gray-500">
                        Motivation
                    </p>
                    <p class="mt-1 text-xl font-bold text-gray-900">
                        {{ $application->motivation_score }}/15
                    </p>
                </div>
            </div>
        </div>
        {{-- Statut --}}
        <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-gray-900">
                Suivi de la candidature
            </h3>
            <form
                method="POST"
                action="{{ route('dashboard.status', $application) }}"
                class="mt-5 flex flex-col gap-4 sm:flex-row sm:items-end"
            >
                @csrf
                @method('PATCH')
                <div class="flex-1">
                    <label
                        for="status"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Statut
                    </label>
                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    >
                        <option
                            value="new"
                            @selected($application->status === 'new')
                        >
                            Nouveau
                        </option>
                        <option
                            value="reviewing"
                            @selected($application->status === 'reviewing')
                        >
                            En examen
                        </option>
                        <option
                            value="shortlisted"
                            @selected($application->status === 'shortlisted')
                        >
                            Présélectionné
                        </option>
                        <option
                            value="rejected"
                            @selected($application->status === 'rejected')
                        >
                            Rejeté
                        </option>
                    </select>
                </div>
                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700 transition"
                >
                    Mettre à jour
                </button>
            </form>
        </div>
    </main>
</body>
</html>