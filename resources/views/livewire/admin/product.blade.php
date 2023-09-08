<div>

    @livewire('product.edit', [], key('edit' . now()))
    @livewire('product.create', [], key('create' . now()))

    <x-card-container>
        @slot('title')
            Product
        @endslot

        @slot('additionHeader')
            <div class="flex gap-4 items-center">
                <div class="flex gap-1 items-center">
                    <input type="text" id="search" wire:model.lazy="search"
                        class="border-b-2 border-gray-300 text-gray-900 text-xs md:text-sm  focus:ring-teal-600 focus:border-teal-600 px-2 peer"
                        placeholder="Search product by name">
                    <label for="search" class="block text-xs md:text-sm ">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>

                <div class="flex items-center relative">
                    <span class="text-xs md:text-sm cursor-pointer" wire:click="toggleShowFilter">
                        <i class="fa-solid fa-filter"></i>
                    </span>
                    <label id="screen"
                        class="fixed  inset-0 h-screen bg-stone-900 bg-opacity-25 md:bg-transparent z-10 {{ $showFilter ? 'visible' : 'invisible' }}"
                        wire:click="toggleShowFilter"></label>

                    <div
                        class="bg-white border p-4 fixed top-full  right-0 z-50 overflow-auto rounded-t-lg max-h-96 transition-all ease-in-out shadow-md w-full md:w-fit md:rounded-lg md:absolute  {{ $showFilter ? 'visible opacity-100 -translate-y-full md:translate-y-2' : 'invisible opacity-0 translate-y-full md:-translate-y-2' }}">

                        <div class="flex flex-col divide-y md:flex-row md:divide-x md:divide-y-0">
                            <div
                                class="flex flex-col gap-2 py-2 first:pt-0 last:pb-0 md:px-2 md:first:pl-0 md:last:pr-0 md:py-0  ">
                                <h3 class="mb-2 w-full text-center">Discount</h3>
                                <div class="flex justify-between gap-2 md:flex-col">
                                    <label class="flex gap-1 text-sm whitespace-nowrap">
                                        <input type="radio" name="discount" wire:model="filter.discount"
                                            value="{{ 'all' }}">
                                        All
                                    </label>
                                    <label class="flex gap-1 text-sm whitespace-nowrap">
                                        <input type="radio" name="discount" wire:model="filter.discount"
                                            value="{{ true }}">
                                        Discount
                                    </label>
                                    <label class="flex gap-1 text-sm whitespace-nowrap">
                                        <input type="radio" name="discount" wire:model="filter.discount"
                                            value="{{ false }}">
                                        No discount
                                    </label>
                                </div>
                            </div>
                            <div
                                class="flex flex-col gap-2 py-2 first:pt-0 last:pb-0 md:px-2 md:first:pl-0 md:last:pr-0 md:py-0  ">
                                <h3 class="mb-2 w-full text-center">Featured</h3>
                                <div class="flex justify-between gap-2 md:flex-col">
                                    <label class="flex gap-1 text-sm whitespace-nowrap">
                                        <input type="radio" name="featured" wire:model="filter.featured"
                                            value="{{ 'all' }}">
                                        All
                                    </label>
                                    <label class="flex gap-1 text-sm whitespace-nowrap">
                                        <input type="radio" name="featured" wire:model="filter.featured"
                                            value="{{ true }}">
                                        Featured
                                    </label>
                                    <label class="flex gap-1 text-sm whitespace-nowrap">
                                        <input type="radio" name="featured" wire:model="filter.featured"
                                            value="{{ false }}">
                                        Not featured
                                    </label>
                                </div>
                            </div>
                            <div
                                class="flex flex-col gap-2 py-2 first:pt-0 last:pb-0 md:px-2 md:first:pl-0 md:last:pr-0 md:py-0  ">
                                <h3 class="mb-2 w-full text-center">Category</h3>
                                <div class="flex justify-between gap-2 md:flex-col">
                                    @foreach ($categoryOptions as $category)
                                        <label class="flex gap-1 text-sm capitalize">
                                            <input type="checkbox" wire:model="filter.category" value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div
                                class="flex flex-col gap-2 py-2 first:pt-0 last:pb-0 md:px-2 md:first:pl-0 md:last:pr-0 md:py-0  ">
                                <h3 class="mb-2 w-full text-center">Price</h3>
                                <div class="flex justify-between gap-2 md:flex-col">
                                    <label class="flex flex-col gap-1 text-xs capitalize">
                                        Min :
                                        <div
                                            class="rounded text-xs flex items-center overflow-hidden bg-stone-50 h-fit text-stone-700 border">
                                            <span class="p-1 bg-stone-300 ">Rp.</span>
                                            <input type="number" class="bg-transparent h-full p-1 w-full md:w-16"
                                                placeholder="1000" wire:model.lazy="filter.price.min">
                                        </div>
                                    </label>
                                    <label class="flex flex-col gap-1 text-xs capitalize">
                                        Max :
                                        <div
                                            class="rounded text-xs flex items-center overflow-hidden bg-stone-50 h-fit text-stone-700 border">
                                            <span class="p-1 bg-stone-300 ">Rp.</span>
                                            <input type="number" class="bg-transparent h-full p-1 w-full md:w-16"
                                                placeholder="1000" wire:model.lazy="filter.price.max">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div
                                class="flex flex-col gap-2 py-2 first:pt-0 last:pb-0 md:px-2 md:first:pl-0 md:last:pr-0 md:py-0  ">
                                <h3 class="mb-2 w-full text-center">Stock</h3>
                                <div class="flex justify-between gap-2 md:flex-col">
                                    <label class="flex flex-col gap-1 text-xs capitalize w-full">
                                        Min :
                                        <div
                                            class="rounded text-xs flex items-center overflow-hidden bg-stone-50 h-fit text-stone-700 border">
                                            <input type="number" class="bg-transparent h-full p-1 w-full md:w-16"
                                                placeholder="1" wire:model.lazy="filter.stock.min">
                                        </div>
                                    </label>
                                    <label class="flex flex-col gap-1 text-xs capitalize w-full">
                                        Max :
                                        <div
                                            class="rounded text-xs flex items-center overflow-hidden bg-stone-50 h-fit text-stone-700 border">
                                            <input type="number" class="bg-transparent h-full p-1 w-full md:w-16"
                                                placeholder="1" wire:model.lazy="filter.stock.max">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <span wire:click="resetFilter"
                            class="mt-4 cursor-pointer text-sm text-center bg-stone-500 text-white hover:bg-stone-600 active:bg-stone-700 font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none ease-in-out transition-all duration-150 w-full md:bg-transparent md:hover:bg-transparent md:active:bg-transparent md:mt-2 md:text-teal-400 md:hover:text-teal-500 md:active:text-teal-600 md:underline block md:text-right md:capitalize md:font-medium">Reset
                            Filter</span>
                    </div>

                </div>

                <div class="hidden md:block">
                    <button wire:click="create"
                        class="bg-stone-500 text-white hover:bg-stone-600 active:bg-stone-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-in-out transition-all duration-150 w-full">Add
                        Product</button>
                </div>
            </div>
        @endslot

        <div class="fixed bottom-0 right-0 mr-4 mb-6 z-40 md:hidden">
            <button wire:click="create"
                class="bg-teal-500 text-white hover:bg-teal-600 active:bg-teal-700 text-lg w-12 aspect-square font-bold uppercase rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-200 shadow">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        <div class="w-full overflow-y-hidden overflow-x-auto">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="table-head">Pictures</th>
                        <th class="table-head">Name</th>
                        <th class="table-head">category</th>
                        <th class="table-head">Normal price</th>
                        <th class="table-head">discount</th>
                        <th class="table-head">Discounted Price</th>
                        <th class="table-head">stock</th>
                        <th class="table-head">Featured</th>
                        <th class="table-head">description</th>
                        <th class="table-head">action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="table-data max-w-fit">
                                <div class="flex flex-wrap gap-1 items-center">
                                    @foreach ($product->pictures as $picture)
                                        <img class="aspect-video h-8 object-cover inline-block"
                                            src="{{ $picture->url }}" alt="{{ $picture->name }}">
                                    @endforeach
                                </div>
                            </td>
                            <td class="table-data capitalize">{{ $product->name }}</td>
                            <td class="table-data capitalize">
                                @if ($product->category)
                                    {{ $product->category->name }}
                                @endif
                            </td>
                            <td class="table-data capitalize">Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="table-data capitalize">Rp {{ $product->discounted }}</td>
                            <td class="table-data capitalize">
                                {{ number_format($product->discounted_percent, 0, ',', '.') }}%</td>
                            <td class="table-data capitalize">{{ $product->stock }}</td>
                            <td class="table-data capitalize">
                                @php
                                    $style = $product->featured ? 'text-green-600 bg-green-200' : 'text-red-600 bg-red-200';
                                @endphp

                                @livewire(
                                    'components.badge-dropdown',
                                    [
                                        'width' => 'w-28',
                                        'style' => $style,
                                        'options' => [
                                            [
                                                'text' => 'Not Featured',
                                                'value' => 0,
                                                'style' => 'text-red-600 bg-red-200',
                                            ],
                                            [
                                                'text' => 'Featured',
                                                'value' => 1,
                                                'style' => 'text-green-600 bg-green-200',
                                            ],
                                        ],
                                        'selected' => $product->featured,
                                        'data' => $product->id,
                                        'onSelect' => 'changeFeatured',
                                    ],
                                    key($product->id . now())
                                )
                            </td>
                            <td class="table-data">
                                {{ $product->description }}
                            </td>
                            <td class="table-data ">
                                <div class="flex  items-center gap-1">
                                    <span class="badge clickable badge-info"
                                        wire:click="edit('{{ $product->id }}')">
                                        Edit
                                    </span>
                                    <span wire:click="deleteProduct('{{ $product->id }}')"
                                        class="badge clickable badge-danger">Delete</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $products->links() }}
    </x-card-container>
</div>
