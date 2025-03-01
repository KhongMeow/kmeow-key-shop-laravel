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
    <section id="cart" class="max-sm:m-4 m-[5rem] flex items-center">
        <div class="w-[90%] max-w-[85rem] m-auto bg-gray-800 overflow-hidden shadow-sm rounded">
            <div class="p-6 text-gray-900 text-gray-100">
                <div class="max-md:hidden grid grid-cols-12 px-6 py-2">
                    <h1 class="col-span-10 text-xl font-bold pt-2 pb-2 text-gray-100">Cart</h1>
                    <hr class="col-span-12 opacity-[20%] mt-4">
                    <h1 class="col-span-2 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">Photo</h1>
                    <h1 class="col-span-3 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">Name</h1>
                    <h1 class="col-span-2 text-center font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">Price</h1>
                    <h1 class="col-span-2 text-center font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">QTY</h1>
                    <h1 class="col-span-2 text-center font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">SubTotal</h1>
                </div>
                <div class="max-md:block hidden grid grid-cols-12 py-2">
                    <h1 class="col-span-12 text-xl font-bold pt-2 pb-2 text-gray-100">Cart</h1>
                    <hr class="col-span-12 opacity-[20%] mt-4">
                </div>
                @if(session('cart'))
                    @foreach(collect(session('cart'))->reverse() as $id => $product)
                        <div class="bg-gray-700 item px-6 py-2 my-2 rounded flex items-center justify-between grid grid-cols-12" data-id="{{ $id }}">
                            <h1 class="hidden max-md:grid col-span-6 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">Photo</h1>
                            <img src="{{ asset('ProductImages') }}/{{ $product['Image'] }}" class="max-md:col-span-6 col-span-2 text-center pt-2 pb-2 w-[3rem] min-w-[3rem] h-[5rem]" alt="">
                            <h1 class="hidden max-md:grid col-span-6 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">Name</h1>
                            <h1 class="max-md:col-span-6 col-span-3 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">{{ $product['Name'] }}</h1>
                            {{-- <h1 class="col-span-2 text-center font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">{{ $product['quantity'] }}</h1> --}}
                            <h1 class="hidden max-md:grid col-span-6 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">Price</h1>
                            <h1 class="max-md:col-span-6 col-span-2 max-md:text-left text-center font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">$ {{ $product['Price'] }}</h1>
                            <h1 class="hidden max-md:grid col-span-6 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">QTY</h1>
                            <input type="number" class="max-md:col-span-6 w-full col-span-2 m-auto font-bold outline-none rounded text-gray-900 quantity update_cart" min="1" onkeypress="return isNumberKey(event)" value="{{ $product['quantity'] }}">
                            <h1 class="hidden max-md:grid col-span-6 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">SubTotal</h1>
                            <h1 class="max-md:col-span-6 col-span-2 max-md:text-left text-center font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">$ {{ $product['Price'] * $product['quantity'] }}</h1>
                            <h1 class="hidden max-md:grid col-span-6 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100">Remove</h1>
                            <button class="col-span-1 text-center font-semibold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre text-gray-100 bg-red-600 rounded text-center justify-center cart_remove"><h1 class="hidden max-lg:block fa-solid fa-trash"></h1><h1 class="max-lg:hidden max-lg:hidden max-xl:text-xs text-md">Remove</h1></button>
                        </div>
                    @endforeach
                @else
                    <div class="item px-6 py-2 my-2 flex items-center justify-center grid grid-cols-12">
                        <h1 class="max-md:col-span-12 col-span-12 font-bold text-2xl pt-2 pb-2 text-center overflow-hidden whitespace-pre text-gray-400">Cart Empty!!!</h1>
                    </div>
                @endif

                <hr class="my-5">
                <div class="mt-5 flex justify-end">
                    <div class="w-[30rem]">
                        <div class="flex justify-end max-sm:justify-center">
                            <div class="max-w-[20rem] w-[90%]">
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $product)
                                    @php $total += $product['Price'] * $product['quantity'] @endphp
                                @endforeach
                                <div class="total mx-4 mt-4 flex justify-between">
                                    <a class="text-xl text-white font-bold">Total</a>
                                    <a class="text-xl text-white font-bold">$ {{ $total }}</a>
                                </div>
                            </div>

                        </div>

                        <div class="total mx-4 mt-[5rem] max-sm:m-0 flex justify-between max-sm:pt-[2rem]">
                            <a href="{{ route('Index') }}" class="max-sm:text-sm text-xl cursor-pointer text-white font-bold bg-red-500 p-2 rounded">Continue Shoping</a>
                            <a href="@if(Auth::check())
                                {{  route('Orders.Store')  }}
                            @else
                                {{  route('login')  }}
                            @endif" class="max-sm:text-sm text-xl cursor-pointer text-white font-bold bg-green-500 p-2 rounded">Check Out</a>
                        </div>
                    </div>
                </div>
                {{-- @foreach ($productTypes as $item)
                    <div class="grid grid-cols-12 gap-2">
                        <h1 class="col-span-4 pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre">  </h1>
                        <h1 class="col-span-4 pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre">  </h1>
                        <div class="col-span-4 max-sm:col-span-3 pt-2 pb-2 text-center text-ellipsis overflow-hidden flex justify-around">

                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>
    <script>
        $(".update_cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PATCH',
                    id: ele.closest(".item").data("id"), // Updated selector
                    quantity: ele.val()
                },
                success: function(response) {
                    // If the request was successful, reload the page
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle any errors here
                    console.error("Failed to update cart:", errorThrown);
                    alert('Failed to update cart. Please try again.');
                }
            });
        });

        $(".cart_remove").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            // if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.closest(".item").data("id")  // Get data-id from the closest item
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            window.location.reload();  // Reload the page
                        } else {
                            alert("Error while removing the item!");
                        }
                    }
                });
            // }
        });


    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
<footer>
    @include('KmeowKeyShop.footer')
</footer>

</html>
