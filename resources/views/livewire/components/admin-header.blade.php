<header
    class="absolute top-0 left-0 w-full z-30 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4 ">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <h2 class="text-white text-sm uppercase lg:inline-block font-semibold">{{ $title }}</h2>

        <div class="hidden md:block">
            @livewire('components.account-dropdown', 'header-account-dropdown')
        </div>

    </div>
</header>
