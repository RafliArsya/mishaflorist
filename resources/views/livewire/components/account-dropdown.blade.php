<div class="relative">
    <div for="menu-toggle" wire:click="toggleDropdown"
        class="text-sm md:text-white inline-flex gap-2 items-center justify-center rounded-full cursor-pointer">
        <img src="{{ asset('images/default/avatar.svg') }}" alt=""
            class="w-8 h-8 md:w-12 md:h-12 rounded-full align-middle border-none shadow-lg bg-stone-200 order-2">
        <div class=" flex-col order-1 hidden md:flex">
            <span class="text-sm ">{{ auth()->user()->name }}</span>
            <span class="text-xs ">{{ auth()->user()->email }}</span>
        </div>
    </div>

    <div id="screen" for="menu-toggle" wire:click="toggleDropdown"
        class="fixed inset-0 h-screen bg-transparent -z-10 {{ $showDropdown ? 'visible' : 'invisible' }}"></div>

    <ul id="menu"
        class="absolute right-0 top-full  bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-[12rem] block transition-all ease-in-out {{ $showDropdown ? 'visible opacity-100 translate-y-2' : 'invisible opacity-0 translate-y-1/2' }}">
        <li>
            <a href=""
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-stone-700 hover:bg-stone-200">Profile</a>
        </li>
        <div class="h-0 my-2 border border-solid border-stone-100"></div>
        <li>
            <span wire:click="logout"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-stone-700 hover:bg-stone-200">
                Log
                out</span>
        </li>
    </ul>
</div>
