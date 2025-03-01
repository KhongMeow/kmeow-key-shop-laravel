<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg m-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-12">
                        <h1 class="col-span-10 text-xl font-bold pt-2 pb-2">Create Product Types</h1>
                        <button type="button" class="col-span-2 bg-blue-600 rounded-md p-2 text-center" onclick="addProduct()">Add Product</button>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                    </div>
                    <form action="{{ Route('ProductTypes.Store') }}" method="post">
                        @csrf
                        <div id="products-type-container">
                            <div class="product-type">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-11">
                                        <label for="">Name</label>
                                        <input type="text" name="Name[]" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">
                                    </div>
                                    <div class="col-span-1">
                                        <br>
                                        <button type="button" class="h-[2.5rem] bg-red-600 rounded-md p-2 text-center" onclick="removeProduct(this)">Remove</button>
                                    </div>
                                </div>
                                <hr class="col-span-12 opacity-[20%] mt-4">
                            </div>
                        </div>
                        <div class="col-span-2">
                            <br>
                            <button type="submit" class="bg-blue-600 rounded-md p-2 text-center">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addProduct() {
            var container = document.getElementById('products-type-container');
            var productTypeTemplate = document.querySelector('.product-type');
            var productTypeClone = productTypeTemplate.cloneNode(true);
            container.appendChild(productTypeClone);

            var inputFields = productTypeClone.querySelectorAll('input');
            inputFields.forEach(function(field) {
                field.value = '';
            });
        }

        function removeProduct(button) {
            var productsType = document.querySelectorAll('.product-type');
            if (productsType.length > 1) {
                var productType = button.closest('.product-type');
                productType.remove();
            }
            else{
                alert("You can't remove at the last.")
            }
        }
    </script>
</x-app-layout>
