<section class="text-gray-700 body-font overflow-hidden bg-white">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <div class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200">
      <div class="exzoom" id="exzoom">
                <!-- Images -->
                <div class="exzoom_img_box">
                    <ul class='exzoom_img_ul'>
                        @foreach ($product->pictures as $itemimg)
	                        <li><img src="{{ $itemimg->url }}" style="width:75px;display: inline-block;text-align:center;"/></li>
                        @endforeach
                    </ul>
                </div>
                <div class="exzoom_nav"></div>
                <!-- Nav Buttons -->
                <p class="exzoom_btn">
                    <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                </p>
            </div>
        </div>
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <p class="no-underline text-blue-900">
        <a href="{{ route('katalog') }}"
        class="text-blue transition duration-150 ease-in-out hover:text-blue-600 focus:text-blue-600 active:text-blue-700 dark:text-blue-400 dark:hover:text-blue-500 dark:focus:text-blue-500 dark:active:text-blue-600"
        >List</a> > {{Str::upper($product->name)}}
        </p>
        
        <h2 class="text-sm title-font text-gray-500 tracking-widest">Nama Barang:</h2>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{Str::upper($product->name)}}</h1>
        <div class="flex mb-4">
          <span class="flex items-center">
          {{--<svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>--}}
            <span class="text-gray-600 ml-3">Stok: {{$product->stock>0? $product->stock : 'Habis'}}</span>
          </span>
          {{--<span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>--}}
        </div>
        <p class="leading-relaxed">
            {{$product->description}}
        </p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
        {{--<div class="flex">
            <span class="mr-3">Color</span>
            <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
            <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
            <button class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
          </div>
          <div class="flex ml-6 items-center">
            <span class="mr-3">Size</span>
            <div class="relative">
              <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                <option>SM</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
              </select>
              <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                  <path d="M6 9l6 6 6-6"></path>
                </svg>
              </span>
            </div>
          </div>--}}
        </div>
        <div class="flex">
          <span class="title-font font-medium text-2xl text-gray-900">Rp. {{$product->discounted > 0 ? number_format($product->discounted, 0, ',', '.') : number_format($product->price, 0, ',', '.')}}</span>
          @if($product->stock>0)<button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded" wire:click="toggle">
            {{--<a href="{{route('detail', $product->slug)}}">--}}
                Pesan
            {{--</a>--}}
            </button>
            @endif
          {{--<button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
            </svg>
          </button>--}}
        </div>
      </div>
    </div>
  </div>
  
  <div>
        {{-- ! Modal --}}
        <div
            class="fixed flex justify-center items-center inset-0 overflow-y-auto px-8 py-6 sm:px-4 z-50 transition-all ease-in-out {{ $show ? 'visible opacity-100' : 'invisible opacity-0' }}">
            <div class="fixed inset-0 transform transition-all">
                <div id="screen" wire:click="close" class="fixed inset-0  bg-black bg-opacity-25 ">
                </div>
            </div>
            <div
                class="bg-white rounded-md overflow-auto shadow-xl transform transition-all sm:w-full sm:mx-auto sm:max-w-2xl py-8 px-4 max-h-full">
                <form wire:submit.prevent="pesan">
                    <div class="flex justify-between">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 ">Pemesanan</h2>
                    </div>
                    <div class="grid grid-cols- gap-4 sm:grid-cols-5 sm:gap-x-2 sm:gap-y-4 overflow-x-auto ">
                        <div class="col-span-2 sm:col-span-5">
                            <label for="Ucapan" class="block mb-2 text-sm font-medium text-gray-900 ">Ucapan</label>
                            <textarea id="Ucapan" rows="3" wire:model.debounce.300ms="Ucapan"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500"
                                placeholder="Tulis Ucapan di sini"></textarea>
                            @error('Ucapan')
                                <span class="invalid-message">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-5">
                            <label for="Alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
                            <textarea id="Alamat" rows="3" wire:model.debounce.300ms="Alamat"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500"
                                placeholder="Your Alamat here"></textarea>
                            @error('Alamat')
                                <span class="invalid-message">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-5">
                            <label for="waktu" class="block mb-2 text-sm font-medium text-gray-900">Waktu Pengiriman</label>
                            <div class="flex">
                                <input type="date" name="waktu" id="waktu" wire:model.debounce.300ms="waktu"
                                    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-teal-500 focus:border-teal-500 block flex-1 min-w-0 w-full text-sm p-2.5 outline-none"
                                    >
                            </div>
                            @error('waktu')
                                <span class="invalid-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-5 justify-self-end">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-md focus:ring-4 focus:ring-teal-200 dark:focus:ring-teal-900 hover:bg-teal-800 ">
                                Pesan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>


</section>

@push('scripts')
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
$(function(){
    $("#exzoom").exzoom({
        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,
        
        // autoplay
        "autoPlay": false,
        
        // autoplay interval in milliseconds
        "autoPlayTimeout": 2000
    });
});
})
</script>
@endpush