@include('KmeowKeyShop.head')

<body class="body">
    @include('KmeowKeyShop.navigation')

    <section id="Search">
        @include('KmeowKeyShop.search')
    </section>
    <div class="h-[5rem]"></div>
    <section id="{{ $Type }}">
        <div class="header-background">
            <h1 class="header-title">
                {{ $Type }}
            </h1>
        </div>
        <div class="box-content">
            @foreach ($products as $item)
                <div class="box">
                    <div class="box-show">
                        <img src="{{ asset('ProductImages/' . $item->Image) }}" id="img">
                        <div class="box-hide">
                            <a href="{{ Route('add_to_cart',$item->id) }}" class='fa-solid fa-cart-plus'></a>
                            {{-- <a href="{{ Route('ProductDetail',$item->id) }}" class='bx bx-show'></a> --}}
                            <a href="{{ route('ProductDetail', ['Type' => $Type, 'products' => $item->id]) }}" class='bx bx-show'></a>
                        </div>
                    </div>
                    <div class="box-text">
                        <div class="title-box">
                            <a href="{{ route('ProductDetail', ['Type' => $Type, 'products' => $item->id]) }}" id="title">{{ $item->Name }}</a>
                        </div>
                        <h1 id="price">$ {{ $item->Price }}</h1>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="py-5 content max-w-[81rem] w-[90%] h-[100%] m-auto flex justify-center">
            {{ $products->links('KmeowKeyShop.pagination') }}
        </div>
    </section>
</body>
<footer>
    @include('KmeowKeyShop.footer')
</footer>

</html>
