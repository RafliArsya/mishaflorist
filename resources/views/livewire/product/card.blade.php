    <div
        class="relative flex w-40 md:w-48 lg:w-60 flex-col overflow-hidden rounded-sm border border-gray-100  shadow-md">
        {{-- <div class="relative flex w-full max-w-xs flex-col overflow-hidden rounded-sm border border-gray-100  shadow-md"> --}}
        <a class="relative w-full flex h-32 md:h-60 overflow-hidden " href="{{route('detail', $product->slug)}}">
            @if ($product->pictures->first())
                <img class="object-cover w-full" src="{{ $product->pictures->first()->url }}" alt="product image" />
            @else
                <img class="object-cover w-full" src="{{ asset('images/default/product-1.png') }}" alt="product image" />
            @endif
            <span
                class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white @if ($product->discounted<=0) hidden @endif">Diskon
                {{ $product->discounted_percent }}%</span>
            
            <span
                class="absolute bottom-0 right-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">
                {{ $product->stock }} unit</span>
            @if ($product->stock > 0)
            <span
                class="absolute bottom-0 right-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">
                {{ $product->stock }} unit</span>
            @else
            <span
                class="absolute bottom-0 right-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">
                Stok Habis!</span>
            @endif
        </a>
        <div class="p-3">
            <a href="{{route('detail', $product->slug)}}">
                <h5 class="text-base  lg:text-xl tracking-tight text-stone-900 capitalize">{{ $product->name }}
                    {{ $product->category ? '- ' . $product->category->name : '' }}
                </h5>
            </a>
            <div class="mt-2 mb-5 flex items-center justify-between">
                <p class="flex flex-col lg:block">
                    @if ($product->discounted > 0)
                    <span class="text-lg md:text-xl font-bold text-stone-900">Rp
                        {{ number_format($product->discounted, 0, ',', '.') }}</span>
                    <span
                        class="text-xs text-stone-900 line-through">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</span>
                    @else
                    <span class="text-lg md:text-xl font-bold text-stone-900">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</span>
                    @endif
                </p>
            </div>
            <a href="{{route('detail', $product->slug)}}"
                class="flex items-center justify-center rounded-sm bg-stone-800 px-3 py-2 md:px-5 md:py-3 text-center text-sm font-medium text-white hover:opacity-75 transition-opacity ease-in-out duration-500">
                Lihat</a>
            
        </div>
    </div>
