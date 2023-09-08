<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    {{-- In work, do what you enjoy. --}}
    <header class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex justify-between items-center px-4">
            <h3 class="font-semibold text-base text-stone-700">
                {{ $title }}
            </h3>

            {{ $additionHeader ?? '' }}
        </div>
    </header>
    <main class="block w-full ">
        {{ $slot }}
    </main>
</div>
