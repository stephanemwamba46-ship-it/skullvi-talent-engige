<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skullvi Talent Engine</title>
    <meta
        name="description"
        content="Déposez votre candidature au Human Capital Program."
    >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-white">
    {{-- Navigation --}}
    <header>
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-6">
            <a
                href="{{ route('home') }}"
                class="flex items-center gap-3"
            >
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-lg font-bold"
                >
                    S
                </div>
                <div>
                    <p class="font-semibold leading-none">
                        Skullvi
                    </p>
                    <p class="mt-1 text-xs text-slate-500">
                        Talent Engine
                    </p>
                </div>
            </a>
            <a
                href="{{ route('candidates.create') }}"
                class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-slate-200"
            >
                Postuler
            </a>
        </div>
    </header>
    {{-- Hero --}}
    <main>
        <section class="relative flex min-h-[calc(100vh-89px)] items-center overflow-hidden">
            {{-- Décoration --}}
            <div
                class="pointer-events-none absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-600/10 blur-3xl"
            ></div>
            <div class="relative mx-auto w-full max-w-6xl px-6 py-20">
                <div class="mx-auto max-w-3xl text-center">
                    <div
                        class="mx-auto mb-7 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-300"
                    >
                        <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                        Human Capital Program
                    </div>
                    <h1
                        class="text-5xl font-bold tracking-tight sm:text-6xl lg:text-7xl"
                    >
                        Votre prochain  chapitre
                        
                        commence ici.
                    </h1>
                    <p
                        class="mx-auto mt-7 max-w-xl text-base leading-7 text-slate-400 sm:text-lg"
                    >
                        Présentez votre profil, vos compétences et votre
                        parcours. Quelques minutes suffisent pour déposer
                        votre candidature.
                    </p>
                    <div class="mt-9">
                        <a
                            href="{{ route('candidates.create') }}"
                            class="inline-flex items-center rounded-xl bg-blue-600 px-7 py-3.5 font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:-translate-y-0.5 hover:bg-blue-500"
                        >
                            Postuler maintenant
                            <span class="ml-3 text-lg">
                                →
                            </span>
                        </a>
                    </div>
                    <div
                        class="mt-12 flex flex-wrap items-center justify-center gap-x-8 gap-y-3 text-sm text-slate-500"
                    >
                        <span>
                            Candidature en ligne
                        </span>
                        <span class="hidden h-1 w-1 rounded-full bg-slate-700 sm:block"></span>
                        <span>
                            CV au format PDF
                        </span>
                        <span class="hidden h-1 w-1 rounded-full bg-slate-700 sm:block"></span>
                        <span>
                            Quelques minutes
                        </span>
                    </div>
                </div>
            </div>
        </section>
        {{-- Bas de page --}}
        <footer class="border-t border-white/10">
            <div
                class="mx-auto flex max-w-6xl flex-col gap-3 px-6 py-6 text-sm text-slate-600 sm:flex-row sm:items-center sm:justify-between"
            >
                <p>
                    © {{ date('Y') }} Skullvi Talent Engine
                </p>
                <p>
                    Human Capital Program
                </p>
            </div>
        </footer>
    </main>
</body>
</html>