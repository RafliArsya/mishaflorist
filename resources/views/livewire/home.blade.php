<div>
    <!-- Swiper -->
    <section id="hero" class=" w-full overflow-hidden flex items-center">
        <div id="hero-swiper" class="swiper w-full lg:h-screen group">
            <div class="swiper-wrapper ">
                <div class="swiper-slide ">
                    <div
                        class="w-full aspect-square  flex justify-around flex-col items-center bg-hero-slide-1 bg-cover bg-center lg:h-full">
                        <div>
                            <h2 class="text-white slider-title tracking-[0.2em]">
                                {{ config('app.name') }}
                            </h2>
                        </div>
                        <a href="{{ route('katalog') }}"
                            class="px-8 py-3 rounded-sm uppercase font-thin font-playfair tracking-widest border-white text-white border mt-8  hover:bg-white border-transparent hover:text-black transition-colors ease-in-out duration-500 md:text-2xl md:px-12 md:py-4 lg:text-xl">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="swiper-slide ">
                    <div class="relative w-full aspect-square bg-hero-slide-2 bg-cover bg-center lg:h-full">

                        <div class="h-full flex justify-center flex-col items-center lg:translate-x-[2%]">
                            <div class="text-black">
                                <h2 class="slider-title">
                                    {{ config('app.name') }}
                                </h2>
                                <h4 class="slider-desc">
                                    Hadir Untuk Nusantara</h4>
                            </div>
                            <a href="{{ route('katalog') }}"
                                class="px-8 py-3 rounded-sm uppercase font-thin font-playfair tracking-widest bg-stone-800  text-white border mt-8  hover:opacity-75 transition-opacity ease-in-out duration-500 md:text-2xl md:px-12 md:py-4 lg:text-xl">
                                Lihat Semua
                        </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide ">
                    <div
                        class="w-full aspect-square flex justify-around flex-col items-center bg-hero-slide-3 bg-cover bg-center lg:h-full lg:items-end">

                        <div
                            class="h-full flex justify-around flex-col items-center lg:h-fit  lg:-translate-y-1/2 lg:-translate-x-1/2">
                            <div class="text-white">
                                <h2 class="slider-title">
                                    {{ config('app.name') }}
                                </h2>
                                <h4 class="slider-desc">
                                    Semua harga terjangkau</h4>
                            </div>

                            <a href="{{ route('katalog') }}"
                                class="px-8 py-3 rounded-sm uppercase font-thin font-playfair tracking-widest border-white text-white border mt-8  hover:bg-white border-transparent hover:text-black transition-colors ease-in-out duration-500 md:text-2xl md:px-12 md:py-4 lg:text-xl">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hero-swiper-next"
                class="swiper-nav right-0 mr-4 md:mr-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div id="hero-swiper-prev"
                class="swiper-nav left-0 ml-4 md:ml-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                <i class="fa-solid fa-chevron-left"></i>
            </div>

        </div>

    </section>

    <section id="about" class="w-full overflow-hidden flex items-stretch  gap-8  lg:px-20 lg:py-16">
        <div id="about-content"
            class="flex flex-col items-center justify-center gap-5 flex-1 bg-teal-500 bg-opacity-20 p-5 md:px-28 xl:px-52 ">
            <h2
                class="w-full text-center text-xl leading-normal tracking-widest uppercase font-bold md:text-3xl lg:text-left">
                {{ config('app.name') }}
            </h2>
            <div id="about-paragraph" class="flex flex-col gap-5">
                <p class="text-xs font-light text-center lg:text-left md:text-base">
                    {{ config('app.name') }} bergerak dalam bidang usaha karangan bunga.<br />Tersedia berbagai karangan
                    bunga
                    diantaranya, bunga papan yang terdiri dari bunga papan wedding/pernikahan, bunga papan duka cita,
                    bunga papan ulang tahun, dll
                </p>
                <p class="text-xs font-light text-center lg:text-left md:text-base">
                    Dengan harga relative terjangkau dan pengiriman yang super cepat “same day” hari dimana paskah
                    memesan akan kami antar langsung ketempat tujuan.
                </p>
                <p class="text-xs font-light text-center lg:text-left md:text-base">
                    {{ config('app.name') }} bertempatan di Depok dan sekitarnya akan memberikan pengalaman kepada anda
                    semua
                    dalam
                    membeli karangan bunga dari berbagai kebutuhan anda.
                </p>
                <p class="text-xs font-light text-center lg:text-left md:text-base">
                    Kami juga menyedikan bunga krans, bunga meja, bunga artificial, bunga buket, bunga standing atau
                    standing flowers, serta bunga lainnya yang dapat di pesan secara online.
                </p>
                <p class="text-xs font-light text-center lg:text-left md:text-base">
                    Sampaikan pesan serta perasaan anda curahkanlah perhatian anda kepada teman kerabat, rekan atau
                    atasan anda dengan koleksi bunga dari {{ config('app.name') }} yang akan memberikan kesan tersendiri
                    terhadap
                    si penerima, dengan pengiriman super cepat sehingga mereka akan selalu mengingat anda akan perhatian
                    selama ini.
                </p>
                <p class="text-xs font-light text-center lg:text-left md:text-base">{{ config('app.name') }} hadir
                    untuk
                    nusantara,
                    siap untuk hampir
                    seluruh
                    wilayah
                    Indonesia.
                </p>
            </div>
        </div>

        <div id="about-image" class="w-1/3 hidden lg:block ">
            <img src="{{ asset('images/bg-about.webp') }}" alt="" class="h-full object-cover">
        </div>
    </section>

    @if ($featuredProducts->count() > 0)
        <section id="collection"
            class="w-full overflow-hidden flex flex-col items-center gap-8 p-4 md:px-8 md:py-12 lg:px-20 lg:py-16">
            <h2 class="w-full text-center text-xl leading-normal tracking-widest uppercase font-bold md:text-3xl">
                Trending
            </h2>

            <div id="collection-swiper" class="swiper w-full">
                <div class="swiper-wrapper">
                    @foreach ($featuredProducts as $product)
                        <div class="swiper-slide">
                            @livewire('product.card', ['product' => $product], $product->id)
                        </div>
                    @endforeach
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </section>

    @endif


    @vite('resources/js/home.js')

</div>
