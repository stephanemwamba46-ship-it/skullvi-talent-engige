<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Engine — Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100">
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-5">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Talent Engine
                </h1>
                <p class="text-sm text-gray-500">
                    Tableau de qualification des candidatures
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a
                    href="{{ route('candidates.create') }}"
                    class="rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700 transition"
                >
                    Nouvelle candidature
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
    <main class="mx-auto max-w-7xl px-4 py-8">
        {{-- Statistiques --}}
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">
                    Candidatures
                </p>
                <p class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $statistics['total'] }}
                </p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">
                    Score moyen
                </p>
                <p class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $statistics['average_score'] }}/100
                </p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">
                    Priorité élevée
                </p>
                <p class="mt-2 text-3xl font-bold text-red-600">
                    {{ $statistics['high_priority'] }}
                </p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">
                    À examiner
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-600">
                    {{ $statistics['to_review'] }}
                </p>
            </div>
        </div>
        {{-- Liste --}}
        <div class="mt-8 overflow-hidden rounded-xl bg-white shadow-sm">
            <div class="border-b px-6 py-5">
                <h2 class="text-lg font-bold text-gray-900">
                    Candidats classés
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Les profils sont automatiquement classés selon leur score.
                </p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Candidat
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Formation
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Score
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Priorité
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Statut
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($applications as $application)
                            <tr class="hover:bg-gray-50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="font-semibold text-gray-900">
                                        {{ $application->candidate->first_name }}
                                        {{ $application->candidate->last_name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $application->candidate->email }}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700">
                                    {{ $application->candidate->education_level }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="font-bold text-gray-900">
                                        {{ $application->score }}/100
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($application->priority === 'high')
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Élevée
                                        </span>
                                    @elseif ($application->priority === 'medium')
                                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                            Moyenne
                                        </span>
                                    @else
                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                                            Faible
                                        </span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700">
                                    {{ match ($application->status) {
                                        'new' => 'Nouveau',
                                        'reviewing' => 'En examen',
                                        'shortlisted' => 'Présélectionné',
                                        'rejected' => 'Rejeté',
                                        default => $application->status,
                                    } }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right">
                                    <a
                                        href="{{ route('dashboard.show', $application) }}"
                                        class="font-semibold text-blue-600 hover:text-blue-800"
                                    >
                                        Voir le profil
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td
                                    colspan="6"
                                    class="px-6 py-12 text-center text-gray-500"
                                >
                                    Aucune candidature enregistrée.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($applications->hasPages())
                <div class="border-t px-6 py-4">
                    {{ $applications->links() }}
                </div>
            @endif
        </div>
    </main>
</body>
</html>