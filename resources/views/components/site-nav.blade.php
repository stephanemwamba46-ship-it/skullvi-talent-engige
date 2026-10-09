<nav
    x-data="{ open: false }"
    x-cloak
    class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/90 backdrop-blur-xl"
    aria-label="Navigation principale"
>
    <div class="mx-auto flex h-[72px] max-w-7xl items-center justify-between px-5 sm:px-6 lg:px-8">    {{-- Logo --}}
    <a
        href="{{ route('home') }}"
        class="flex items-center gap-3"
        aria-label="Skullvi Talent Engine — Accueil"
    >
        <span class="brand-mark">S</span>
        <span>
            <span class="block text-sm font-bold tracking-wide text-white">
                SKULLVI
            </span>
            <span class="block text-[10px] font-medium uppercase tracking-[0.2em] text-slate-400">
                Talent Engine
            </span>
        </span>
    </a>
    {{-- Navigation desktop --}}
    <div class="hidden items-center gap-7 lg:flex">
        <a
            href="{{ route('home') }}#about"
            class="nav-link"
        >
            À propos
        </a>
        <a
            href="{{ route('home') }}#process"
            class="nav-link"
        >
            Comment ça marche 
        </a>
        <a
            href="{{ route('home') }}#features"
            class="nav-link"
        >
            Fonctionnalités
        </a>
        {{-- Espace recruteur --}}
        <a
            href="{{ route('login') }}"
            class="text-sm font-semibold text-slate-300 transition hover:text-white"
        >
            Espace recruteur
        </a>
        {{-- Postuler --}}
        <a
            href="{{ route('candidates.create') }}"
            class="btn-primary py-2.5"
        >
            Postuler
        </a>
    </div>
    {{-- Bouton mobile --}}
    <button
        type="button"
        @click="open = !open"
        class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:bg-white/10 lg:hidden"
        :aria-expanded="open.toString()"
        aria-controls="mobile-navigation"
        aria-label="Ouvrir le menu"
    >
        <span class="sr-only">
            Menu
        </span>
        {{-- Icône hamburger --}}
        <svg
            x-show="!open"
            x-cloak
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
            aria-hidden="true"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16"
            />
        </svg>
        {{-- Icône fermeture --}}
        <svg
            x-show="open"
            x-cloak
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
            aria-hidden="true"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12"
            />
        </svg>
    </button>
</div>
{{-- =========================================================
     MENU MOBILE
========================================================== --}}
<div
    id="mobile-navigation"
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    @click.outside="open = false"
    class="border-t border-white/10 bg-slate-950 lg:hidden"
>
    <div class="mx-auto max-w-7xl space-y-1 px-5 py-5 sm:px-6">
        {{-- À propos --}}
        <a
            href="{{ route('home') }}#about"
            @click="open = false"
            class="group flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-slate-500 transition group-hover:text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"
                />
            </svg>
            <span>
                À propos du projet
            </span>
        </a>
        {{-- Comment ça marche --}}
        <a
            href="{{ route('home') }}#process"
            @click="open = false"
            class="group flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-slate-500 transition group-hover:text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 8v4l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                />
            </svg>
            <span>
                Comment ça marche ?
            </span>
        </a>
        {{-- Fonctionnalités --}}
        <a
            href="{{ route('home') }}#features"
            @click="open = false"
            class="group flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-slate-500 transition group-hover:text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4 5a1 1 0 0 1 1-1h5v6H4V5Zm10 0a1 1 0 0 1 1-1h4v6h-5V5ZM4 14a1 1 0 0 1 1-1h5v6H4v-5Zm10 0a1 1 0 0 1 1-1h4v6h-5v-5Z"
                />
            </svg>
            <span>
                Fonctionnalités
            </span>
        </a>
        {{-- Créateur --}}
        <a
            href="{{ route('home') }}#creator"
            @click="open = false"
            class="group flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-slate-500 transition group-hover:text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 19a6 6 0 0 0-12 0m6-8a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm6-5v6m3-3h-6"
                />
            </svg>
            <span>
                À propos du créateur
            </span>
        </a>
        {{-- Contact --}}
        <a
            href="{{ route('home') }}#contact"
            @click="open = false"
            class="group flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-slate-500 transition group-hover:text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 10.5a8.38 8.38 0 0 1-9 8.5 9.1 9.1 0 0 1-4-.9L3 20l1.9-4.4A8.4 8.4 0 1 1 21 10.5Z"
                />
            </svg>
            <span>
                Contact
            </span>
        </a>
        {{-- Postuler --}}
        <a
            href="{{ route('candidates.create') }}"
            @click="open = false"
            class="group mt-3 flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-slate-500 transition group-hover:text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 16v-4m0 0V8m0 4h4m-4 0H8m11 8H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9l5 5v9a2 2 0 0 1-2 2Z"
                />
            </svg>
            <span>
                Postuler
            </span>
        </a>
        {{-- Espace recruteur --}}
        <a
            href="{{ route('login') }}"
            @click="open = false"
            class="group flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-white/5 hover:text-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-slate-500 transition group-hover:text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4m-4-4 4-4m0 0-4-4m4 4H3"
                />
            </svg>
            <span>
                Espace recruteur — Se connecter
            </span>
        </a>
    </div>
</div>
</nav>