<!DOCTYPE html><html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Déposer une candidature — Skullvi Talent Engine</title>
<meta
    name="description"
    content="Déposez votre candidature sur Skullvi Talent Engine."
>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    [x-cloak] {
        display: none !important;
    }
    .application-grid {
        background-image:
            linear-gradient(rgba(148, 163, 184, 0.045) 1px, transparent 1px),
            linear-gradient(90deg, rgba(148, 163, 184, 0.045) 1px, transparent 1px);
        background-size: 42px 42px;
    }
    .field-input {
        width: 100%;
        border-radius: 0.875rem;
        border: 1px solid rgb(203 213 225);
        background: rgb(255 255 255);
        padding: 0.8rem 1rem;
        color: rgb(15 23 42);
        outline: none;
        transition: all 0.2s ease;
    }
    .field-input:hover {
        border-color: rgb(148 163 184);
    }
    .field-input:focus {
        border-color: rgb(59 130 246);
        box-shadow: 0 0 0 4px rgb(59 130 246 / 0.10);
    }
    .section-card {
        overflow: hidden;
        border: 1px solid rgb(226 232 240);
        border-radius: 1rem;
        background: white;
        box-shadow: 0 10px 30px rgb(15 23 42 / 0.045);
    }
    .section-header {
        border-bottom: 1px solid rgb(226 232 240);
        padding: 1.25rem;
    }
    @media (min-width: 640px) {
        .section-header {
            padding: 1.5rem;
        }
    }
    .section-body {
        padding: 1.25rem;
    }
    @media (min-width: 640px) {
        .section-body {
            padding: 1.5rem;
        }
    }
</style>
</head><body class="min-h-screen bg-slate-950 text-slate-900 antialiased">{{-- =========================================================
     HEADER
========================================================== --}}
<header class="border-b border-white/10 bg-slate-950">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a
            href="{{ route('home') }}"
            class="flex min-w-0 items-center gap-3"
        >
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-600 font-black text-white shadow-lg shadow-blue-600/20">
                S
            </div>
            <div class="min-w-0">
                <p class="truncate font-bold leading-none text-white">
                    Skullvi
                </p>
                <p class="mt-1 text-[11px] text-slate-500">
                    Talent Engine
                </p>
            </div>
        </a>
        <a
            href="{{ route('home') }}"
            class="inline-flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
            </svg>
            <span class="hidden sm:inline">Retour à l'accueil</span>
            <span class="sm:hidden">Retour</span>
        </a>
    </div>
</header>
{{-- =========================================================
     MAIN
========================================================== --}}
<main class="application-grid min-h-[calc(100vh-73px)] bg-slate-50">
    <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
        {{-- Introduction --}}
        <div class="mx-auto max-w-3xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                Espace candidat
            </div>
            <h1 class="mt-5 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Déposer une candidature
            </h1>
            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-slate-500 sm:text-base">
                Présentez votre profil avec précision. Les informations fournies
                permettront au Talent Engine de qualifier et d'évaluer votre candidature.
            </p>
        </div>
        {{-- Progression visuelle --}}
        <div class="mx-auto mt-8 max-w-3xl rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
            <div class="flex items-center justify-between gap-3 text-xs font-semibold sm:text-sm">
                <div class="flex items-center gap-2 text-blue-600">
                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                        1
                    </span>
                    <span class="hidden sm:inline">Profil</span>
                </div>
                <div class="h-px flex-1 bg-slate-200"></div>
                <div class="flex items-center gap-2 text-slate-400">
                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-slate-100 text-xs font-bold">
                        2
                    </span>
                    <span class="hidden sm:inline">Compétences</span>
                </div>
                <div class="h-px flex-1 bg-slate-200"></div>
                <div class="flex items-center gap-2 text-slate-400">
                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-slate-100 text-xs font-bold">
                        3
                    </span>
                    <span class="hidden sm:inline">CV & motivation</span>
                </div>
            </div>
        </div>
        {{-- Erreurs --}}
        @if ($errors->any())
            <div class="mx-auto mt-6 max-w-3xl rounded-2xl border border-red-200 bg-red-50 p-4 sm:p-5">
                <div class="flex items-start gap-3">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86 2.82 17a2 2 0 0 0 1.74 3h14.88a2 2 0 0 0 1.74-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-red-800">
                            Vérifiez les informations saisies.
                        </p>
                        <ul class="mt-2 space-y-1 text-sm leading-6 text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        {{-- =====================================================
             FORMULAIRE
        ====================================================== --}}
        <form
            method="POST"
            action="{{ route('candidates.store') }}"
            enctype="multipart/form-data"
            class="mx-auto mt-8 max-w-3xl space-y-5 sm:mt-10"
        >
            @csrf
            {{-- =================================================
                 INFORMATIONS PERSONNELLES
            ================================================== --}}
            <section class="section-card">
                <div class="section-header">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19a6 6 0 0 0-12 0m6-8a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm7-2v6m3-3h-6"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-slate-950">
                                Informations personnelles
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Vos coordonnées pour vous contacter.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="first_name" class="mb-2 block text-sm font-semibold text-slate-700">
                                Prénom <span class="text-blue-600">*</span>
                            </label>
                            <input
                                id="first_name"
                                name="first_name"
                                type="text"
                                value="{{ old('first_name') }}"
                                required
                                autocomplete="given-name"
                                placeholder="Votre prénom"
                                class="field-input"
                            >
                        </div>
                        <div>
                            <label for="last_name" class="mb-2 block text-sm font-semibold text-slate-700">
                                Nom <span class="text-blue-600">*</span>
                            </label>
                            <input
                                id="last_name"
                                name="last_name"
                                type="text"
                                value="{{ old('last_name') }}"
                                required
                                autocomplete="family-name"
                                placeholder="Votre nom"
                                class="field-input"
                            >
                        </div>
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                                Adresse e-mail <span class="text-blue-600">*</span>
                            </label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                placeholder="exemple@email.com"
                                class="field-input"
                            >
                        </div>
                        <div>
                            <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">
                                Téléphone <span class="text-blue-600">*</span>
                            </label>
                            <input
                                id="phone"
                                name="phone"
                                type="text"
                                value="{{ old('phone') }}"
                                required
                                autocomplete="tel"
                                placeholder="+243 ..."
                                class="field-input"
                            >
                        </div>
                        <div class="sm:col-span-2">
                            <label for="city" class="mb-2 block text-sm font-semibold text-slate-700">
                                Ville <span class="text-blue-600">*</span>
                            </label>
                            <input
                                id="city"
                                name="city"
                                type="text"
                                value="{{ old('city') }}"
                                required
                                autocomplete="address-level2"
                                placeholder="Ex. Kinshasa"
                                class="field-input"
                            >
                        </div>
                    </div>
                </div>
            </section>
            {{-- =================================================
                 FORMATION
            ================================================== --}}
            <section class="section-card">
                <div class="section-header">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M22 10 12 5 2 10l10 5 10-5Zm0 0v6m-4-4.5v5.5a2 2 0 0 1-1 1.73l-5 2.77-5-2.77A2 2 0 0 1 6 17.5V12"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-slate-950">
                                Formation et expérience
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Votre parcours académique et professionnel.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="education_level" class="mb-2 block text-sm font-semibold text-slate-700">
                                Niveau d'études <span class="text-blue-600">*</span>
                            </label>
                            <select
                                id="education_level"
                                name="education_level"
                                required
                                class="field-input"
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
                            <label for="field_of_study" class="mb-2 block text-sm font-semibold text-slate-700">
                                Domaine d'études
                            </label>
                            <input
                                id="field_of_study"
                                name="field_of_study"
                                type="text"
                                value="{{ old('field_of_study') }}"
                                placeholder="Ex. Informatique"
                                class="field-input"
                            >
                        </div>
                        <div>
                            <label for="experience_years" class="mb-2 block text-sm font-semibold text-slate-700">
                                Années d'expérience <span class="text-blue-600">*</span>
                            </label>
                            <input
                                id="experience_years"
                                name="experience_years"
                                type="number"
                                min="0"
                                max="5"
                                value="{{ old('experience_years', 0) }}"
                                required
                                class="field-input"
                            >
                            <p class="mt-2 text-xs leading-5 text-slate-400">
                                Maximum pris en compte : 5 ans.
                            </p>
                        </div>
                        <div class="flex items-center rounded-xl border border-slate-200 bg-slate-50 p-4 sm:mt-7">
                            <input
                                id="available"
                                name="available"
                                type="checkbox"
                                value="1"
                                @checked(old('available', true))
                                class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                            >
                            <label for="available" class="ml-3 cursor-pointer text-sm font-semibold text-slate-700">
                                Je suis disponible
                                <span class="mt-0.5 block text-xs font-normal text-slate-400">
                                    Pour les prochaines étapes du processus.
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>
{{-- ===============
{{-- =================================================
                 COMPÉTENCES
            ================================================== --}}
            <section class="section-card">
                <div class="section-header">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8 9 3-3 3 3m-3-3v10m8-2a4 4 0 0 0-4 4H5a4 4 0 0 1 4-4h7m3-10H5a2 2 0 0 0-2 2v14h18V6a2 2 0 0 0-2-2Z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-slate-950">
                                Compétences
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Indiquez les principales technologies ou compétences que vous maîtrisez.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <label for="skills" class="mb-2 block text-sm font-semibold text-slate-700">
                        Vos compétences <span class="text-blue-600">*</span>
                    </label>
                    <textarea
                        id="skills"
                        name="skills"
                        rows="5"
                        required
                        placeholder="Ex. PHP, Laravel, JavaScript, MySQL, gestion de projet..."
                        class="field-input resize-y"
                    >{{ old('skills') }}</textarea>
                    <p class="mt-2 text-xs leading-5 text-slate-400">
                        Séparez vos principales compétences par des virgules.
                    </p>
                </div>
            </section>
            {{-- =================================================
                 MOTIVATION + CV
            ================================================== --}}
            <section class="section-card">
                <div class="section-header">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm-3-9 2 2 4-5"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-slate-950">
                                Motivation et CV
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Expliquez votre intérêt et joignez votre CV.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section-body space-y-6">
                    <div>
                        <label for="motivation" class="mb-2 block text-sm font-semibold text-slate-700">
                            Votre motivation <span class="text-blue-600">*</span>
                        </label>
                        <textarea
                            id="motivation"
                            name="motivation"
                            rows="7"
                            minlength="80"
                            maxlength="3000"
                            required
                            placeholder="Présentez brièvement votre motivation, votre parcours et ce que vous pourriez apporter..."
                            class="field-input resize-y"
                        >{{ old('motivation') }}</textarea>
                        <div class="mt-2 flex items-center justify-between gap-3">
                            <p class="text-xs leading-5 text-slate-400">
                                Minimum 80 caractères · Maximum 3 000.
                            </p>
                            <span class="hidden text-xs text-slate-400 sm:inline">
                                Soyez précis et concret.
                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="cv" class="mb-2 block text-sm font-semibold text-slate-700">
                            CV <span class="text-slate-400">(PDF)</span>
                        </label>
                        <label
                            for="cv"
                            class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-5 py-8 text-center transition hover:border-blue-400 hover:bg-blue-50/40"
                        >
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-blue-600 shadow-sm ring-1 ring-slate-200 transition group-hover:ring-blue-200">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16V4m0 0L8 8m4-4 4 4M5 15v3a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-3"/>
                                </svg>
                            </span>
                            <span class="mt-4 text-sm font-semibold text-slate-700">
                                Cliquez pour sélectionner votre CV
                            </span>
                            <span class="mt-1 text-xs text-slate-400">
                                PDF uniquement · 5 Mo maximum
                            </span>
                            <input
                                id="cv"
                                name="cv"
                                type="file"
                                accept=".pdf,application/pdf"
                                class="sr-only"
                            >
                        </label>
                    </div>
                </div>
            </section>
            {{-- =================================================
                 ACTIONS
            ================================================== --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <a
                        href="{{ route('home') }}"
                        class="order-2 inline-flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 sm:order-1"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                        </svg>
                        Annuler
                    </a>
                    <button
                        type="submit"
                        class="order-1 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3.5 font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 hover:shadow-blue-600/30 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:scale-[0.99] sm:order-2 sm:w-auto"
                    >
                        Envoyer ma candidature
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </button>
                </div>
                <p class="mt-4 text-center text-xs leading-5 text-slate-400">
                    En envoyant votre candidature, vous confirmez que les informations fournies sont exactes.
                </p>
            </div>
        </form>
    </div>
</main>
</body>
</html>