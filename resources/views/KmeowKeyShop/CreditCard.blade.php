
@include('KmeowKeyShop.head')

<body class="body">
    @include('KmeowKeyShop.navigation')


    <section id="Search">
        @include('KmeowKeyShop.search')
    </section>
    <div class="h-[5rem]"></div>

    <section id="Credit-Card">
        <div class="header-background">
            <h1 class="header-title">
                Credit Card
            </h1>
        </div>
        <div class="flex justify-center items-center">
            <div class="w-full max-w-xl bg-black p-6 rounded-lg shadow-md">
                <div class="w-full max-w-xl bg-black rounded-lg shadow-md">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-bold mb-2">Email</label>
                        <input id="email" name="email" type="email" class="grid justify-items-center w-full p-3 border rounded-md focus:outline-none focus:border-indigo-500 bg-gray-600 text-gray-200 caret-gray-200" autocomplete="email" placeholder="Email" required>
                    </div>
                </div>
                <hr>
                <br>

                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-bold">CREDIT CARD PAYMENT</h3>
                    <div class="flex space-x-3">
                        <img src="https://img.icons8.com/color/36/000000/visa.png">
                        <img src="https://img.icons8.com/color/36/000000/mastercard.png">
                    </div>
                </div>
                <form class="mt-4">
                    <div class="mb-4">
                        <label for="cc-number" class="block text-sm font-bold mb-2">CARD NUMBER</label>
                        <input id="cc-number" name="cc-number" type="tel" class="grid justify-items-center w-full p-3 border rounded-md focus:outline-none focus:border-indigo-500 bg-gray-600 text-gray-200 caret-gray-200" autocomplete="cc-number" minlength="19" maxlength="19" placeholder="XXXX XXXX XXXX XXXX" onkeypress="cardspace(),validate(event)" required>
                    </div>
                    <div class="flex -mx-2 mb-4">
                        <div class="w-1/2 px-2">
                            <label for="cc-exp" class="block text-sm font-bold mb-2">CARD EXPIRY</label>
                            <input id="cc-exp" name="cc-exp" type="tel" class="w-full p-3 border rounded-md focus:outline-none focus:border-indigo-500 bg-gray-600 text-gray-200 caret-gray-200" autocomplete="cc-exp" placeholder="YYYY / MM" minlength="7" maxlength="7" onkeypress="addSlashes(),validate(event)" required>
                        </div>
                        <div class="w-1/2 px-2">
                            <label for="cc-cvv" class="block text-sm font-bold mb-2">CVV</label>
                            <input id="cc-cvv" type="tel" class="w-full p-3 border rounded-md focus:outline-none focus:border-indigo-500 bg-gray-600 text-gray-200 caret-gray-200" autocomplete="cc-cvv" placeholder="XXX" minlength="3" maxlength="3" onkeypress="validate(event)" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="cc-name" class="block text-sm font-bold mb-2">CARD NAME</label>
                        <input id="cc-name" type="text" autocomplete="cc-name" minlength="6" placeholder="XXXXX XXXXXXXXX" class="w-full p-3 border rounded-md focus:outline-none focus:border-indigo-500 bg-gray-600 text-gray-200 caret-gray-200" required>
                    </div>
                    <div>
                        <input type="submit" class="w-full py-3 bg-green-500 text-white rounded-md focus:outline-none focus:bg-green-600" value="BUY" style="font-size: 0.8rem;"></input>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <br>
</body>
<footer>
    @include('KmeowKeyShop.footer')
</footer>

</html>
