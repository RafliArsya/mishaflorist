<div>
    <header id="header"
            class="fixed w-full flex justify-between px-5 py-6 z-30 top-0 {{ $visibleOnScroll ? '-translate-y-full' : '' }} lg:px-24 lg:py-5 transition-all {{ $showSidebar ? 'header-scroll' : 'header-scroll' }}">
        
        <a href="{{ route('home') }}">
            <h1 id="header-name"class="text-xl font-bold leading-none uppercase tracking-widest lg:text-2xl">{{ config('app.name') }}
            </h1>
        </a>

        {{-- <nav class="hidden sm:flex items-center gap-6">
            @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->routeIs('home'), 'text' => 'home'], 'home')
            @livewire('components.nav-link', ['href' => route('katalog'), 'active' => request()->routeIs('katalog'), 'text' => 'katalog'], 'katalog')
        </nav> --}}
    </header>

    @vite('resources/js/header.js')
</div>
