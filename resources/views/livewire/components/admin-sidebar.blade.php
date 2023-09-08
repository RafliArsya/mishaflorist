<nav id="sidebar"
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-48 py-2 md:py-4 px-6">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="flex flex-col justify-between items-start w-8 aspect-video cursor-pointer relative md:hidden"
        wire:click="toggleSidebar">
        <span id="bar"
            class="block h-0.5 rounded-full bg-stone-800  transition-all duration-300 ease-in-out {{ $showSidebar ? 'w-1/4 ' : 'w-full' }}"></span>
        <span id="bar"
            class="block h-0.5 rounded-full bg-stone-800  transition-all duration-300 ease-in-out {{ $showSidebar ? 'w-1/2 ' : 'w-full' }}"></span>
        <span id="bar"
            class="block h-0.5 rounded-full bg-stone-800  transition-all duration-300 ease-in-out {{ $showSidebar ? 'w-3/4 ' : 'w-full' }}"></span>
    </div>
    <h2
        class="md:block text-left md:pb-2 text-stone-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold md:p-4 px-0">
        {{ config('app.name') }}</h2>

    <div class="block md:hidden">
        @livewire('components.account-dropdown', 'sidebar-account-dropdown')
    </div>

    <div
        class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-full md:top-0 md:left-0 right-0 z-40 overflow-y-auto overflow-x-hidden items-center flex-1 w-48 bg-white px-2 md:px-0 h-screen md:h-auto transition-all ease-in-out {{ $showSidebar ? 'left-0 ' : '-left-full' }} z-20">
        <div>
            <hr class="my-4 md:min-w-full">
            <h6 class="md:min-w-full text-stone-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Admin Menu</h6>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none ml-2">
                <li class="items-center">
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-xs uppercase py-3 font-bold block {{ Request::is('admin/dashboard*') ? 'text-teal-500 hover:text-teal-600' : 'text-stone-700 hover:text-stone-500' }}">
                        <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                        Dashboard</a>
                </li>
            </ul>
        </div>
        <div>
            <hr class="my-4 md:min-w-full">
            <h6 class="md:min-w-full text-stone-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Products</h6>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none ml-2">
                <li class="items-center">
                    <a href="{{ route('admin.products') }}"
                        class="text-xs uppercase py-3 font-bold block {{ Request::is('admin/product*') ? 'text-teal-500 hover:text-teal-600' : 'text-stone-700 hover:text-stone-500' }}">
                        <i class="fa-solid fa-list-ul mr-2 text-sm opacity-75"></i>
                        Product</a>
                </li>
                {{--<li class="items-center">
                    <a href=""
                        class="text-xs uppercase py-3 font-bold block text-stone-700 hover:text-stone-500">
                        <i class="fa-solid fa-bookmark mr-2 text-sm opacity-75"></i>
                        Category</a>
                </li>
                <li class="items-center">
                    <a href=""
                        class="text-xs uppercase py-3 font-bold block text-stone-700 hover:text-stone-500">
                        <i class="fa-solid fa-calendar-days  mr-2 text-sm opacity-75"></i>
                        Events</a>
                </li>--}}
            </ul>
        </div>

    </div>

    <div id="screen" for="menu-toggle" wire:click="toggleSidebar"
        class="absolute top-full left-0 right-0 h-screen  bg-black bg-opacity-25 z-10 md:hidden {{ $showSidebar ? 'visible' : 'invisible' }}">
    </div>

</nav>
