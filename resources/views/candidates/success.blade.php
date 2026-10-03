<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature reçue — Talent Engine</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-lg rounded-xl bg-white p-8 text-center shadow-md">
        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-3xl">
            ✓
        </div>
        <h1 class="text-2xl font-bold text-gray-900">
            Candidature reçue
        </h1>
        <p class="mt-3 text-gray-600">
            Merci {{ session('candidate_name') }}.
            Votre candidature a bien été enregistrée.
        </p>
        <p class="mt-2 text-sm text-gray-500">
            Votre profil sera ensuite qualifié et évalué par le Talent Engine.
        </p>
        <a
            href="{{ route('candidates.create') }}"
            class="mt-6 inline-block rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700"
        >
            Nouvelle candidature
        </a>
    </div>
</body>
</html>