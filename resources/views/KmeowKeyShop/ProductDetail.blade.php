@include('KmeowKeyShop.head')

<body class="body">

    @include('KmeowKeyShop.navigation')


    <section id="Search">
        @include('KmeowKeyShop.search')
    </section>
    <div class="h-[5rem]"></div>


    <section id="products">
        <div class="header-background">
            <h1 class="header-title">
                {{ $productDetail->Name }}
            </h1>
        </div>
        <div class="details">
            <div class="details-content">
                <div class="detail-img">
                    <img src="{{ asset('ProductImages/' . $productDetail->Image) }}" id="img">
                </div>
                <div class="detail-descriptions">
                    <div class="game-title-descriptions">
                        <h1>{{ $productDetail->Name }}</h1>
                    </div>
                    <div class="game-detail">
                        <p>{{ $productDetail->Detail }}</p>
                    </div>
                    <div class="game-descriptions">
                        <p>{{ $productDetail->Description }}</p>
                    </div>
                    <div class="order">
                        <span class="price">$ {{ $productDetail->Price }}</span>
                        <input type="number" min="1" max="100" value="1" id="qty" class="qty min-w-[3rem]" onkeypress="return isNumberKey(event)">
                        <a id="addToCart" class="buy fa-solid fa-cart-plus"></a>
                    </div>

                    <script>
                        document.getElementById('addToCart').addEventListener('click', function(e) {
                            e.preventDefault();
                            var quantity = document.getElementById('qty').value;
                            var addToCartUrl = "{{ Route('add_to_cart', $productDetail->id) }}?quantity=" + quantity;
                            window.location.href = addToCartUrl;
                        });
                    </script>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>
</body>
<footer>
    @include('KmeowKeyShop.footer')
</footer>

</html>
