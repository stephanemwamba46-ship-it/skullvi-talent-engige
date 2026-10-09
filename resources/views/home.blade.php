<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skullvi Talent Engine — Recruter avec plus de clarté</title>
    <meta
        name="description"
        content="Skullvi Talent Engine centralise, qualifie et classe les candidatures pour aider les recruteurs à identifier les profils prioritaires."
    >
    {{-- Empêche les éléments Alpine de s'afficher avant son chargement --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-white antialiased">
    {{-- Navigation principale --}}
    <x-site-nav />
    <main>
        {{-- =========================================================
             HERO
        ========================================================== --}}
        <section class="hero-grid relative overflow-hidden">
            <div class="hero-glow hero-glow-one"></div>
            <div class="hero-glow hero-glow-two"></div>
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1.08fr_.92fr] lg:px-8 lg:py-28">
                {{-- Texte --}}
                <div class="relative">
                    <div class="eyebrow">
                        <span></span>
                        Human Capital Program
                    </div>
                    <h1 class="mt-7 max-w-4xl text-4xl font-black leading-[1.04] tracking-[-0.04em] sm:text-6xl lg:text-7xl">
                        Transformer les candidatures en
                        <span class="">
                            décisions plus claires.
                        </span>
                    </h1>
                    <p class="mt-7 max-w-2xl text-base leading-8 text-slate-300 sm:text-lg">
                        Skullvi Talent Engine est une plateforme pensée pour centraliser les candidatures,
                        qualifier les profils et faire ressortir rapidement les talents à examiner en priorité.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="{{ route('candidates.create') }}"
                            class="btn-primary justify-center"
                        >
                            Déposer ma candidature
                            <span>→</span>
                        </a>
                        <a
                            href="#process"
                            class="btn-secondary justify-center"
                        >
                            Découvrir la plateforme
                        </a>
                    </div>
                    <div class="mt-10 grid max-w-xl grid-cols-3 gap-3">
                        <div class="metric">
                            <strong>01</strong>
                            <span>Candidature</span>
                        </div>
                        <div class="metric">
                            <strong>02</strong>
                            <span>Qualification</span>
                        </div>
                        <div class="metric">
                            <strong>03</strong>
                            <span>Priorisation</span>
                        </div>
                    </div>
                </div>
                {{-- Aperçu dashboard --}}
                <div class="relative">
                    <div class="dashboard-preview">
                        <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                            <div>
                                <p class="text-xs font-medium text-slate-500">
                                    Talent Engine
                                </p>
                                <p class="mt-1 font-bold">
                                    Vue recruteur
                                </p>
                            </div>
                            <span class="status-dot">
                                Live
                            </span>
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-3">
                            <div class="preview-stat">
                                <span>Candidatures</span>
                                <strong>128</strong>
                            </div>
                            <div class="preview-stat">
                                <span>Score moyen</span>
                                <strong>
                                    76<span>/100</span>
                                </strong>
                            </div>
                        </div>
                        <div class="mt-5 space-y-3">
                            <div class="candidate-preview">
                                <span class="avatar">AM</span>
                                <div class="min-w-0 flex-1">
                                    <b>Profil candidat</b>
                                    <small>Licence · Informatique</small>
                                </div>
                                <strong>91</strong>
                            </div>
                            <div class="candidate-preview">
                                <span class="avatar">JK</span>
                                <div class="min-w-0 flex-1">
                                    <b>Profil candidat</b>
                                    <small>Master · Gestion</small>
                                </div>
                                <strong>84</strong>
                            </div>
                            <div class="candidate-preview">
                                <span class="avatar">LN</span>
                                <div class="min-w-0 flex-1">
                                    <b>Profil candidat</b>
                                    <small>Bac+2 · Marketing</small>
                                </div>
                                <strong>72</strong>
                            </div>
                        </div>
                        <div class="mt-5 rounded-xl bg-blue-500/10 p-4 ring-1 ring-blue-500/15">
                            <p class="text-xs text-blue-300">
                                Priorité détectée
                            </p>
                            <p class="mt-1 text-sm font-semibold text-white">
                                3 profils à examiner en priorité
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
             À PROPOS
        ========================================================== --}}
        <section id="about" class="section-light">
            <div class="mx-auto max-w-7xl px-5 py-20 sm:px-6 lg:px-8 lg:py-28">
                <div class="section-heading">
                    <div class="section-kicker">
                        À propos du projet
                    </div>
                    <h2>
                        Un moteur simple pour rendre le recrutement plus lisible.
                    </h2>
                </div>
                <div class="mt-12 grid gap-5 md:grid-cols-3">
                    <article class="info-card">
                        <span class="icon-box">01</span>
                        <h3>
                            Centraliser
                        </h3>
                        <p>
                            Toutes les informations essentielles du candidat sont regroupées dans une même candidature.
                        </p>
                    </article>
                    <article class="info-card">
                        <span class="icon-box">02</span>
                        <h3>
                            Qualifier
                        </h3>
                        <p>
                            Les critères de formation, expérience, compétences, disponibilité et motivation alimentent l'évaluation.
                        </p>
                    </article>
                    <article class="info-card">
                        <span class="icon-box">03</span>
                        <h3>
                            Prioriser
                        </h3>
                        <p>
                            Un score et un niveau de priorité donnent au recruteur un point de départ clair pour son analyse.
                        </p>
                    </article>
                </div>
            </div>
        </section>
        {{-- =========================================================
             PROCESS
        ========================================================== --}}
        <section id="process" class="section-dark">
            <div class="mx-auto max-w-7xl px-5 py-20 sm:px-6 lg:px-8 lg:py-28">
                <div class="section-heading dark">
                    <div class="section-kicker">
                        Comment ça marche ?
                    </div>
                    <h2>
                        Du formulaire à la décision, en quelques étapes.
                    </h2>
                    <p>
                        Le parcours est volontairement simple pour le candidat et exploitable pour le recruteur.
                    </p>
                </div>
                <div class="mt-14 grid gap-4 md:grid-cols-5">
                    <div class="step-card">
                        <span>01</span>
                        <h3>Postuler</h3>
                        <p>
                            Le candidat renseigne son profil et transmet son CV.
                        </p>
                    </div>
                    <div class="step-card">
                        <span>02</span>
                        <h3>Collecter</h3>
                        <p>
                            Les données sont enregistrées de manière structurée.
                        </p>
                    </div>
                    <div class="step-card">
                        <span>03</span>
                        <h3>Évaluer</h3>
                        <p>
                            Les critères définis produisent un score de qualification.
                        </p>
                    </div>
                    <div class="step-card">
                        <span>04</span>
                        <h3>Classer</h3>
                        <p>
                            Les profils sont ordonnés selon leur score et leur priorité.
                        </p>
                    </div>
                    <div class="step-card">
                        <span>05</span>
                        <h3>Décider</h3>
                        <p>
                            Le recruteur examine les profils et met à jour leur statut.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
             FONCTIONNALITÉS
        ========================================================== --}}
        <section id="features" class="section-light">
            <div class="mx-auto max-w-7xl px-5 py-20 sm:px-6 lg:px-8 lg:py-28">
                <div class="section-heading">
                    <div class="section-kicker">
                        Fonctionnalités
                    </div>
                    <h2>
                        Les outils essentiels, sans complexité inutile.
                    </h2>
                </div>
                <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <article class="feature-card">
                        <span>▦</span>
                        <h3>Gestion des candidatures</h3>
                        <p>
                            Consultez les profils reçus depuis un espace centralisé.
                        </p>
                    </article>
                    <article class="feature-card">
                        <span>◎</span>
                        <h3>Score de qualification</h3>
                        <p>
                            Une lecture synthétique du niveau de correspondance du profil.
                        </p>
                    </article>
                    <article class="feature-card">
                        <span>↗</span>
                        <h3>Classement intelligent</h3>
                        <p>
                            Les candidatures sont organisées selon leur niveau de priorité.
                        </p>
                    </article>
                    <article class="feature-card">
                        <span>✓</span>
                        <h3>Suivi des statuts</h3>
                        <p>
                            Nouveau, en examen, présélectionné ou rejeté : chaque candidature reste suivie.
                        </p>
                    </article>
                    <article class="feature-card">
                        <span>↓</span>
                        <h3>CV accessible</h3>
                        <p>
                            Le recruteur peut consulter le CV fourni directement depuis le profil.
                        </p>
                    </article>
                    <article class="feature-card">
                        <span>⌁</span>
                        <h3>Interface claire</h3>
                        <p>
                            Une expérience conçue pour aller rapidement de l'information à l'action.
                        </p>
                    </article>
                </div>
            </div>
        </section>
    {{-- =========================================================
         FOOTER
    ========================================================== --}}
    <footer class="border-t border-white/10 bg-slate-950">
        <div class="mx-auto flex max-w-7xl flex-col gap-5 px-5 py-8 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div>
                <span class="font-bold text-white">
                    SKULLVI
                </span>
                Talent Engine
            </div>
            <div class="flex flex-wrap gap-5">
                <a href="#about" class="hover:text-white">
                    À propos
                </a>
                <a href="#process" class="hover:text-white">
                    Processus
                </a>
                <a
                    href="{{ route('candidates.create') }}"
                    class="hover:text-white"
                >
                    Postuler
                </a>
                <a
                    href="{{ route('login') }}"
                    class="hover:text-white"
                >
                    Recruteur
                </a>
            </div>
            <p>
                © {{ date('Y') }} — Stephane Mwamba — Tous droits réservés.
            </p>
        </div>
    </footer>
</body>
</html>