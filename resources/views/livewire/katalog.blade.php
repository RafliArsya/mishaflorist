<div class="mt-20 pb-4 md:p-8">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex justify-center md:gap-4 lg:gap-8">
        <div class="border rounded-sm  h-fit shadow-sm bg-white hidden md:block">
            <h2 class="p-2 border-b">Filter</h2>
            <div class="p-2">
                <div class="p-2">
                    <h3>Promo</h3>
                    <div class="flex gap-2">
                        <input id="Diskon" type="checkbox" wire:model="filter.discount">
                        <label for="Diskon">Diskon</label>
                    </div>
                    <h3>Harga</h3>
                    <div class="flex gap-2" hidden>
                        <input id="SortedPrice" type="radio" wire:model="filter.price" value=0 {{ $filter["price"]>0? '': 'hidden'}}>
                        <label for="SortedPrice" {{ $filter["price"] > 0 ? '': 'hidden'}}>Hilangkan</label>
                    </div>
                    <div class="flex gap-2">
                        <input id="SortedPrice2" type="radio" wire:model="filter.price" value=1>
                        <label for="SortedPrice2">Termurah</label>
                    </div>
                    <div class="flex gap-2">
                        <input id="SortedPrice3" type="radio" wire:model="filter.price" value=2>
                        <label for="SortedPrice3">Termahal</label>
                    </div>
                    <h3>Stok</h3>
                    <div class="flex gap-2" hidden>
                        <input id="StockAvailibility" type="radio" wire:model="filter.stock" value=0 {{ $filter["stock"]>0? '': 'hidden'}}>
                        <label for="StockAvailibility" {{ $filter["stock"] > 0 ? '': 'hidden'}}>Semua</label>
                    </div>
                    <div class="flex gap-2">
                        <input id="StockAvailibility" type="radio" wire:model="filter.stock" value=1>
                        <label for="StockAvailibility">Kurang dari 10</label>
                    </div>
                    <div class="flex gap-2">
                        <input id="StockAvailibility" type="radio" wire:model="filter.stock" value=2>
                        <label for="StockAvailibility">Lebih dari 10</label>
                    </div>
                </div>

                {{--Show button: {{var_export($filter)}}--}}

                {{-- <button
                    class="w-full flex items-center justify-center rounded-sm bg-stone-800 px-3 py-2 text-center text-sm font-medium text-white hover:opacity-75 transition-opacity ease-in-out duration-500 mt-2">
                    Terapkan</button> --}}
            </div>
        </div>
        <div class="flex flex-col gap-4 flex-1">
            <div class="flex gap-1 items-center md:gap-2">
                <div class="border-2 rounded-lg bg-white flex flex-1 ">
                    <input type="text" wire:model="filter.search" class="bg-transparent flex-1 p-2 outline-none"
                        placeholder="Search...">
                </div>

                <!--<div class="border-2 rounded-lg bg-white hidden md:flex ">
                    <select class="bg-transparent flex-1 p-2 outline-none w-40 md:w-60">
                        <option value="">Urutkan</option>
                        <option value="">Sort By</option>
                        <option value="">Sort By</option>
                        <option value="">Sort By</option>
                    </select>
                </div>-->

                <div class="md:hidden">
                    <input type="checkbox" id="filter-toggle" class="hidden" />
                    <label for="filter-toggle">
                        <i class="fa-solid fa-filter text-xl"></i>
                    </label>
                    <label id="screen" for="filter-toggle"
                        class="fixed invisible inset-0 h-screen bg-black bg-opacity-25 z-10"></label>

                    <div id="filter-box"
                        class="flex flex-col bg-white p-4 fixed bottom-0 left-0 right-0 z-50 rounded-t-lg max-h-96 invisible translate-y-full transition-all ease-in-out">
                        <div class="overflow-auto">
                            <div class="p-2 ">
                                <h3>Promo</h3>
                                <div class="flex flex-wrap gap-2">
                                    <div class="flex gap-2 flex-1">
                                        <input id="Diskon" type="checkbox" wire:model="filter.discount">
                                        <label for="Diskon" class="whitespace-nowrap">Diskon</label>
                                    </div>
                                </div>
                                <h3>Urutkan harga</h3>
                                <div class="flex gap-2" hidden>
                                    <input id="SortedPrice" type="radio" wire:model="filter.price" value=0 {{ $filter['price']>0? '': 'hidden'}}>
                                    <label for="SortedPrice" {{ $filter['price']>0? '': 'hidden'}}>Hilangkan</label>
                                </div>
                                <div class="flex gap-2">
                                    <input id="SortedPrice2" type="radio" wire:model="filter.price" value=1>
                                    <label for="SortedPrice2">Murah</label>
                                </div>
                                <div class="flex gap-2">
                                    <input id="SortedPrice3" type="radio" wire:model="filter.price" value=2>
                                    <label for="SortedPrice3">Mahal</label>
                                </div>
                                <h3>Stok</h3>
                                <div class="flex gap-2" hidden>
                                    <input id="StockAvailibility" type="radio" wire:model="filter.stock" value=0 {{ $filter["stock"]>0? '': 'hidden'}}>
                                    <label for="StockAvailibility" {{ $filter["stock"] > 0 ? '': 'hidden'}}>Semua</label>
                                </div>
                                <div class="flex gap-2">
                                    <input id="StockAvailibility" type="radio" wire:model="filter.stock" value=1>
                                    <label for="StockAvailibility">Kurang dari 10</label>
                                </div>
                                <div class="flex gap-2">
                                    <input id="StockAvailibility" type="radio" wire:model="filter.stock" value=2>
                                    <label for="StockAvailibility">Lebih dari 10</label>
                                </div>
                            </div>
                        </div>

                        
                        {{-- <div class="p-2">
                            <button
                                class="w-full flex items-center justify-center rounded-sm bg-stone-800 px-3 py-2 md:px-5 md:py-3 text-center text-sm font-medium text-white hover:opacity-75 transition-opacity ease-in-out duration-500">
                                Terapkan</button>
                        </div> --}}
                    </div>
                </div>
            </div>

            @if ($products->isEmpty())
                <div class="flex flex-col items-center justify-center w-full bg-white rounded-lg h-96 shadow-sm border">
                    <img src="{{ asset('logo.ico') }}" alt="empty" class="">
                    <h2 class="text-2xl font-semibold">Oops, produk tidak ditemukan</h2>
                </div>
            @else
                <div
                    class="grid grid-cols-2 gap-2 md:gap-5 justify-items-center sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 w-full">
                    {{-- <div class="flex flex-wrap w-fit justify-start gap-2 lg:gap-4"> --}}
                    @foreach ($products as $product)
                        @livewire('product.card', ['product' => $product], key($product->id))
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>
