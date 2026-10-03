<!DOCTYPE html> <htm
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déposer une candidature — Skullvi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    {{-- Header --}}
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-5 py-5">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-600 font-bold text-white">
                    S
                </div>
                <div>
                    <p class="font-semibold leading-none">
                        Skullvi
                    </p>
                    <p class="mt-1 text-xs text-slate-400">
                        Talent Engine
                    </p>
                </div>
            </a>
            <a
                href="{{ route('home') }}"
                class="text-sm font-medium text-slate-500 hover:text-slate-900"
            >
                ← Retour
            </a>
        </div>
    </header>
    <main class="mx-auto max-w-4xl px-5 py-10">
        {{-- Introduction --}}
        <div class="mb-8">
            <p class="text-sm font-semibold text-blue-600">
                Human Capital Program
            </p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
                Déposer une candidature
            </h1>
            <p class="mt-2 max-w-2xl text-slate-500">
                Remplissez les informations ci-dessous pour présenter votre profil.
            </p>
        </div>
        {{-- Erreurs --}}
        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-5 py-4">
                <p class="font-semibold text-red-800">
                    Vérifiez les informations saisies.
                </p>
                <ul class="mt-2 list-inside list-disc text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form
            method="POST"
            action="{{ route('candidates.store') }}"
            enctype="multipart/form-data"
            class="space-y-6"
        >
            @csrf
            {{-- Informations personnelles --}}
            <section class="rounded-xl border border-slate-200 bg-white">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="font-semibold text-slate-900">
                        Informations personnelles
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Vos coordonnées pour vous contacter.
                    </p>
                </div>
                <div class="grid gap-5 px-6 py-6 sm:grid-cols-2">
                    <div>
                        <label for="first_name" class="mb-2 block text-sm font-medium">
                            Prénom
                        </label>
                        <input
                            id="first_name"
                            name="first_name"
                            type="text"
                            value="{{ old('first_name') }}"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>
                    <div>
                        <label for="last_name" class="mb-2 block text-sm font-medium">
                            Nom
                        </label>
                        <input
                            id="last_name"
                            name="last_name"
                            type="text"
                            value="{{ old('last_name') }}"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium">
                            Adresse e-mail
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>
                    <div>
                        <label for="phone" class="mb-2 block text-sm font-medium">
                            Téléphone
                        </label>
                        <input
                            id="phone"
                            name="phone"
                            type="text"
                            value="{{ old('phone') }}"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>
                    <div class="sm:col-span-2">
                        <label for="city" class="mb-2 block text-sm font-medium">
                            Ville
                        </label>
                        <input
                            id="city"
                            name="city"
                            type="text"
                            value="{{ old('city') }}"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>
                </div>
            </section>
            {{-- Formation --}}
            <section class="rounded-xl border border-slate-200 bg-white">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="font-semibold text-slate-900">
                        Formation et expérience
                    </h2>
                </div>
                <div class="grid gap-5 px-6 py-6 sm:grid-cols-2">
                    <div>
                        <label for="education_level" class="mb-2 block text-sm font-medium">
                            Niveau d'études
                        </label>
                        <select
                            id="education_level"
                            name="education_level"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                            <option value="">Sélectionner</option>
                            <option value="Bac" @selected(old('education_level') === 'Bac')>
                                Bac
                            </option>
                            <option value="Bac+2" @selected(old('education_level') === 'Bac+2')>
                                Bac+2
                            </option>
                            <option value="Licence" @selected(old('education_level') === 'Licence')>
                                Licence
                            </option>
                            <option value="Master" @selected(old('education_level') === 'Master')>
                                Master
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="field_of_study" class="mb-2 block text-sm font-medium">
                            Domaine d'études
                        </label>
                        <input
                            id="field_of_study"
                            name="field_of_study"
                            type="text"
                            value="{{ old('field_of_study') }}"
                            placeholder="Ex. Informatique"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>
                    <div>
                        <label for="experience_years" class="mb-2 block text-sm font-medium">
                            Années d'expérience
                        </label>
                        <input
                            id="experience_years"
                            name="experience_years"
                            type="number"
                            min="0"
                            max="5"
                            value="{{ old('experience_years', 0) }}"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                        <p class="mt-1 text-xs text-slate-400">
                            Maximum pris en compte : 5 ans.
                        </p>
                    </div>
                    <div class="flex items-center gap-3 sm:pt-7">
                        <input
                            id="available"
                            name="available"
                            type="checkbox"
                            value="1"
                            @checked(old('available', true))
                            class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                        >
                        <label for="available" class="text-sm font-medium text-slate-700">
                            Je suis disponible
                        </label>
                    </div>
                </div>
            </section>
            {{-- Compétences --}}
            <section class="rounded-xl border border-slate-200 bg-white">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="font-semibold text-slate-900">
                        Compétences
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Indiquez les principales technologies ou compétences que vous maîtrisez.
                    </p>
                </div>
                <div class="px-6 py-6">
                    <textarea
                        id="skills"
                        name="skills"
                        rows="4"
                        required
                        placeholder="Ex. PHP, Laravel, JavaScript, MySQL..."
                        class="w-full resize-y rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('skills') }}</textarea>
                </div>
            </section>
            {{-- Motivation + CV --}}
            <section class="rounded-xl border border-slate-200 bg-white">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="font-semibold text-slate-900">
                        Motivation et CV
                    </h2>
                </div>
                <div class="space-y-6 px-6 py-6">
                    <div>
                        <label for="motivation" class="mb-2 block text-sm font-medium">
                            Votre motivation
                        </label>
                        <textarea
                            id="motivation"
                            name="motivation"
                            rows="7"
                            minlength="80"
                            maxlength="3000"
                            required
                            placeholder="Présentez brièvement votre motivation..."
                            class="w-full resize-y rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >{{ old('motivation') }}</textarea>
                        <p class="mt-1 text-xs text-slate-400">
                            Minimum 80 caractères.
                        </p>
                    </div>
                    <div>
                        <label for="cv" class="mb-2 block text-sm font-medium">
                            CV
                        </label>
                        <input
                            id="cv"
                            name="cv"
                            type="file"
                            accept=".pdf,application/pdf"
                            class="block w-full rounded-lg border border-slate-300 bg-white text-sm text-slate-600 file:mr-4 file:border-0 file:bg-slate-100 file:px-4 file:py-3 file:font-medium file:text-slate-700 hover:file:bg-slate-200"
                        >
                        <p class="mt-2 text-xs text-slate-400">
                            PDF uniquement · 5 Mo maximum
                        </p>
                    </div>
                </div>
            </section>
            {{-- Actions --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a
                    href="{{ route('home') }}"
                    class="text-center text-sm font-medium text-slate-500 hover:text-slate-900"
                >
                    Annuler
                </a>
                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-6 py-3.5 font-semibold text-white transition hover:bg-blue-700"
                >
                    Envoyer ma candidature
                </button>
            </div>
        </form>
    </main>
</body>
</html>