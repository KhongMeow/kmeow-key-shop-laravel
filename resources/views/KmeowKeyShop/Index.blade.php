@include('KmeowKeyShop.head')

<body class="body">
    @include('KmeowKeyShop.navigation')

    <section id="Search">
        @include('KmeowKeyShop.search')
    </section>
    <div class="h-[5rem]"></div>
    @if(session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
    @endif
    <section class="slide-show">
        <div id="carouselExampleIndicators" class="relative" data-te-carousel-init data-te-ride="carousel">
            <!--Carousel indicators-->
            <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0" data-te-carousel-indicators>
                <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="0" data-te-carousel-active class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="1" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                    aria-label="Slide 2"></button>
                <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="2" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                    aria-label="Slide 3"></button>
            </div>

            <!--Carousel items-->
            <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                @foreach ($slideShow as $Index => $item)
                    @if($Index == 0)
                        <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item data-te-carousel-active>
                            <img src="SlideShowPhotos/{{ $item->Photo }}" class="block w-full" alt=""/>
                        </div>
                    @else
                        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item>
                            <img src="SlideShowPhotos/{{ $item->Photo }}" class="block w-full" alt=""/>
                        </div>
                    @endif
                @endforeach
            </div>

            <!--Carousel controls - prev item-->
            <button class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                type="button" data-te-target="#carouselExampleIndicators" data-te-slide="prev">
            <span class="inline-block h-8 w-8">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
            <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
            </button>
                <!--Carousel controls - next item-->
                <button class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button" data-te-target="#carouselExampleIndicators" data-te-slide="next">
            <span class="inline-block h-8 w-8">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                >Next</span
            >
            </button>
        </div>
    </section>
    @foreach ($productTypes as $item)
        @php
            $allProducts = $products->where('TypeID', $item->id);
        @endphp

        @if ($allProducts->count() > 0)
            <section id="{{ $item->Name }}">
                <div class="header-background">
                    <h1 class="header-title">
                        {{ $item->Name }}
                    </h1>
                </div>
                <div class="box-content">
                    @foreach ($allProducts as $product)
                        <div class="box">
                            <div class="box-show">
                                <img src="ProductImages/{{ $product->Image }}" id="img">
                                <div class="box-hide flex">
                                    <a href="{{ Route('add_to_cart', $product->id) }}" class='fa-solid fa-cart-plus'></a>
                                    <a href="{{ route('ProductDetail', ['Type' => $item->Name, 'products' => $product->id]) }}" class='bx bx-show'></a>
                                </div>
                            </div>
                            <div class="box-text">
                                <div class="title-box">
                                    <a href="{{ route('ProductDetail', ['Type' => $item->Name, 'products' => $product->id]) }}" id="title">{{ $product->Name }}</a>
                                </div>
                                <h1 id="price">$ {{ $product->Price }}</h1>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="see-more-box">
                    <a href="{{ route('Products', ['Type' => $item->Name]) }}" class="see-more">See More</a>
                </div>
            </section>
        @endif
    @endforeach
    {{-- <section id="software">
        <div class="header-background">
            <h1 class="header-title">
                Software
            </h1>
        </div>
        <div class="box-content">
            @foreach ($Software as $item)
                <div class="box">
                    <div class="box-show">
                        <img src="ProductImages/{{ $item->Image }}" id="img">
                        <div class="box-hide">
                            <a href="{{ Route('add_to_cart',$item->id) }}" class='fa-solid fa-cart-plus'></a>
                            <a href="{{ Route('SoftwareDetail',$item->id) }}" class='bx bx-show'></a>
                        </div>
                    </div>
                    <div class="box-text">
                        <div class="title-box">
                            <a href="{{ Route('SoftwareDetail',$item->id) }}" id="title">{{ $item->Name }}</a>
                        </div>
                        <h1 id="price">$ {{ $item->Price }}</h1>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="see-more-box">
            <a href="{{ Route('Software') }}" class="see-more">See More</a>
        </div>
    </section> --}}
</body>
<footer>
    @include('KmeowKeyShop.footer')
</footer>

</html>
