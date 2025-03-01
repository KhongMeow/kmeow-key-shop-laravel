<div id="blank-background" class=" absolute w-full bg-gray-800 opacity-0 z-[10] hidden"></div>
<div class="header absolute z-[10]">
    <div class="header-backgound fixed h-[5rem] w-full bg-gray-900" id="header-backgound">
        <div class="content max-w-[81rem] w-[90%] h-[100%] m-auto flex justify-between items-center max-lg:items-start cursor-default">
            <div class="w-full h-full items-center flex max-lg:flex-wrap">
                <div class="left flex min-w-[12rem] items-center">
                    <h1 class="fa-solid fa-bars text-white m-6 mx-5 hidden max-lg:block text-xl cursor-pointer bar item-center max-sm:text-md" id="bar"></h1>
                    <a href="{{ route('Index') }}" class="max-w-[12rem] min-w-[12rem] text-white text-xl font-bold item-center max-sm:text-sm">K'meow Key Shop</a>
                    {{-- <a href="{{ Route('Index') }}"><img src="{{ asset("images/logo/kmeowkeyshop_logo.png") }}" class="w-[2rem] hidden max-sm:block" alt=""></a> --}}
                </div>
                <div class="right h-full w-full lg:flex justify-between items-center">
                    <div class="laft min-w-[13rem] max-lg:hidden flex max-lg:flex-col justify-start max-lg:mt-[3rem] max-lg:absolute max-lg:w-[90%]" id="category">
                        <a href="{{ Route('Index') }}" class="text-gray-400 text-m font-semibold m-1 max-lg:mx-0 max-lg:pl-2 max-lg:bg-gray-700 rounded max-lg:h-[3rem] max-lg:leading-[3rem] {{ request()->routeIs('Index') ? 'text-white' : '' }}">Home</a>
                        {{-- <a href="{{ Route('Games') }}" class="text-gray-400 text-m font-semibold m-1 max-lg:mx-0 max-lg:pl-2 max-lg:bg-gray-700 rounded max-lg:h-[3rem] max-lg:leading-[3rem] {{ request()->routeIs('Games','GameDetail') ? 'text-white' : '' }}">Games</a>
                        <a href="{{ Route('Software') }}" class="text-gray-400 text-m font-semibold m-1 max-lg:mx-0 max-lg:pl-2 max-lg:bg-gray-700 rounded max-lg:h-[3rem] max-lg:leading-[3rem] {{ request()->routeIs('Software', 'SoftwareDetail') ? 'text-white' : '' }}">Software</a> --}}
                        @foreach ($productTypes as $item)
                            <a href="{{ route('Products', ['Type' => $item->Name]) }}" class="text-gray-400 text-m font-semibold m-1 max-lg:mx-0 max-lg:pl-2 max-lg:bg-gray-700 rounded max-lg:h-[3rem] max-lg:leading-[3rem] {{ request()->is('Products/' . $item->Name) || request()->is('ProductDetail/' . $item->Name . '/*') ? 'text-white' : '' }}">{{ $item->Name }}</a>
                        @endforeach
                    </div>
                    <div class="search items-center max-w-[25rem] w-full max-lg:max-table block max-lg:hidden" id="search">
                        <button class="bg-gray-800 show-search active:bg-gray-600 text-white p-2 w-[90%] rounded max-lg:absolute max-lg:m-auto max-lg:mt-0">Search...</button>
                    </div>
                </div>
            </div>
            <div class="right flex justify-between max-md:relative max-sm:ml-[-4rem] h-[5rem] items-center" id="right">
                <div id="cart" class="bg-gray-600 cursor-pointer max-md:bg-transparent text-white p-2 max-md:p-0 m-1 min-w-[7rem] max-md:min-w-0 max-md:w-full rounded flex items-center justify-around"><button><h6 class="fa-solid fa-cart-shopping"></h6></button>
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $product)
                        @php $total += $product['Price'] * $product['quantity'] @endphp
                    @endforeach
                    <button class="max-md:hidden">$ {{ $total }}</button>
                </div>
                @if((array) session('cart') > 0)

                <div id="cart-pop-up" class="absolute hidden bg-gray-800 rounded top-[5rem] w-[19rem] ml-[-12rem] max-md:ml-[-15rem] max-sm:ml-[-12.8rem] @if(!Auth::check()) max-sm:ml-[-6rem] @endif">
                    <div class="flex justify-between">
                        <div class="text-white font-bold p-4 text-xl">Cart</div>
                        <div id="cart-cancel" class="flex jusify-centter items-center bg-red-600 p-2 m-4 max-w-[2rem] max-h-[2rem] rounded text-white font-bold text-xl">
                            <h1 class="fa-solid fa-xmark"></h1>
                        </div>
                    </div>
                    <hr class="mb-3">
                    <div class="cart mx-4 overflow-y-auto max-h-[13rem] pr-[1rem] mr-0" id="scrollable-container">
                        @if(session('cart'))
                            @foreach(collect(session('cart'))->reverse() as $id => $product)
                                <div class="item bg-gray-700 p-2 my-2 rounded h-[5rem] flex items-center justify-between">
                                    <img src="{{ asset('ProductImages') }}/{{ $product['Image'] }}" class="w-[2.3rem] h-[3rem]" alt="">
                                    <div class="p-4 pr-0 min-w-[9.5rem]">
                                        <h6 class="text-white font-bold text-xs overflow-hidden text-ellipsis whitespace-nowrap"> {{ $product['Name'] }} </h6>
                                        {{-- <input type="number" class="w-[25%] px-2 py-1 outline-none rounded" min="1" onkeypress="return isNumberKey(event)"> --}}
                                        <h6 class="text-white font-bold text-xs">X {{ $product['quantity'] }}</h6>
                                    </div>
                                    <h6 class="text-white font-bold pl-1 text-md whitespace-nowrap">$ {{ $product['Price'] }}</h6>
                                </div>
                                {{-- <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{ asset('img') }}/{{ $details['Image'] }}" />
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['name'] }}</p>
                                        <span class="price text-success"> ${{ $details['Price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                    </div>
                                </div> --}}
                            @endforeach
                        @else
                            <div class="item p-2 my-2 h-[5rem] flex items-center justify-center">
                                <h6 class="text-gray-400 font-bold text-xl overflow-hidden text-ellipsis whitespace-nowrap"> Cart Empty!!! </h6>
                            </div>
                        @endif
                        {{-- <div class="item bg-gray-700 p-2 my-2 rounded h-[5rem] flex items-center justify-between">
                            <a href="" class="flex">
                                <img src="kmeowkeyshop_logo.png" class=" h-[3rem]" alt="">
                                <h6 class="text-white font-bold p-4 text-md">Meow</h6>
                            </a>
                            <input type="number" class="w-[25%] px-2 py-1 outline-none rounded" min="1" onkeypress="return isNumberKey(event)">
                            <!-- <h6 class="text-white font-bold p-4 text-md">6</h6> -->
                        </div> --}}
                    </div>
                    <hr class="m-4">
                    <div class="total mx-4 mt-4 flex justify-between">
                        <a class="text-xl text-white font-bold">Total</a>
                        <a class="text-xl text-white font-bold">$ {{ $total }}</a>
                    </div>
                    <div class="my-[2rem] text-center">
                        <a href="{{ route('cart') }}" class="text-white font-bold bg-blue-700 p-4 rounded">View Card</a>
                    </div>
                </div>
                @endif
                @if(!Auth::check())
                    {{-- <a class="text-gray-400 cursor-pointer m-5 hidden max-md:block text-xl">Account</a> --}}
                    <div id="account" class="max-sm:hidden flex h-[5rem] items-center">
                        <a href="{{ route('login') }}" class="bg-green-600 max-md:bg-transparent cursor-pointer text-white p-2 m-1 w-[35%] rounded">Login</a>
                        <h1 class="max-md:block hidden text-white p-2 m-1 ">|</h1>
                        <a href="{{ route('register') }}" class="bg-blue-600 max-md:bg-transparent cursor-pointer text-white p-2 m-1 w-[50%] rounded">Register</a>
                    </div>

                    <div id="profile" class="max-sm:block hidden text-gray-400 cursor-pointer text-xl m-5 items-center flex gap-2">
                        <a class="fa-solid fa-user"></a>
                    </div>

                    <div id="profile-pop-up" class="absolute hidden bg-gray-800 rounded top-[5rem] w-[10rem] ml-[5rem] max-md:ml-[-1rem] max-sm:ml-[-5rem]">
                        <x-dropdown-link :href="route('login')" class="text-white hover:bg-gray-600 focus:bg-gray-600 rounded">
                            Login
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('register')" class="text-white hover:bg-gray-600 focus:bg-gray-600 rounded">
                            Register
                        </x-dropdown-link>
                    </div>
                @elseif(Auth::check())
                    <div id="profile" class="text-gray-400 cursor-pointer text-xl m-5 items-center flex gap-2">
                        <a class="fa-solid"></a>
                        <a class="fa-solid fa-user"></a>
                        <button class="max-sm:hidden ml-[0.5rem]"><div>{{ Auth::user()->name }}</div></button>
                    </div>
                    <div class="profile-pop-up">
                        <div id="profile-pop-up" class="absolute hidden bg-gray-800 rounded top-[5rem] w-[10rem] ml-[-11rem]">
                            <b class="text-white hover:bg-gray-600 focus:bg-gray-600 rounded">
                                <div class="max-sm:block hidden mx-4 my-2">{{ Auth::user()->name }}</div>
                            </b>
                            <hr class="max-sm:block hidden">
                            <x-dropdown-link :href="route('profile.edit')" class="text-white hover:bg-gray-600 focus:bg-gray-600 rounded">
                                <div class="max-sm:hidden">{{ __('Profile') }}</div> <div class="max-sm:block hidden">Profile</div>
                            </x-dropdown-link>
                            @if(auth()->check() && auth()->user()->user_type === 'admin')
                            <x-dropdown-link href="{{ route('dashboard') }}" class="text-white hover:bg-gray-600 focus:bg-gray-600 rounded">Dashboard</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-white hover:bg-gray-600 focus:bg-gray-600 rounded">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <div class="h-[5rem]"></div>
</div>
