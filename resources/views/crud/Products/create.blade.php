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
                    <div class="grid grid-cols-12 ">
                        <h1 class="col-span-10 max-sm:col-span-7 text-xl font-bold pt-2 pb-2">Create Products</h1>
                        <button type="button" class="col-span-2 max-sm:col-span-5 bg-blue-600 rounded-md p-2 text-center max-sm:min-w-[8rem]" onclick="addProduct()">Add Product</button>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                    </div>
                    <form action="{{ Route('Products.Store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="products-container">
                            <div class="product">
                                <div class="grid grid-cols-12 gap-4 flex flex-wrap">
                                    <div class="col-span-6 max-sm:col-span-12">
                                        <label for="">Name</label>
                                        <input type="text" name="Name[]" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">
                                    </div>
                                    <div class="col-span-6 max-sm:col-span-12">
                                        <label for="">Type</label>
                                        <select class="rounded-md bg-gray-500 border focus:border-gray-600 w-full" name="TypeID[]">
                                            <option value="" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">Select</option>
                                            @foreach ($productTypes as $productType)
                                                <option value="{{ $productType->id }}" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">{{ $productType->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-6 max-sm:col-span-12">
                                        <label for="">Detail</label>
                                        <input type="text" name="Detail[]" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">
                                    </div>
                                    <div class="col-span-6 max-sm:col-span-12">
                                        <label for="">Description</label>
                                        <input type="text" name="Description[]" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">
                                    </div>
                                    <div class="col-span-6 max-sm:col-span-12">
                                        <label for="">Price</label>
                                        <input type="text" name="Price[]" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">
                                    </div>
                                    <div class="col-span-6 max-sm:col-span-12">
                                        <label for="">Image</label>
                                        <input class="rounded-md bg-gray-500 border focus:border-gray-600 w-full file:h-full file:bg-gray-600 file:w-1/3 file:border-0 focus:outline-none border-0 h-[2.6rem]" type="file" name="Image[]" onchange="previewImage(event)">
                                    </div>
                                    <div class="col-span-6 max-sm:col-span-12">
                                    </div>
                                    <div class="col-span-6 max-sm:col-span-12">
                                        <img class="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                                    </div>
                                    <div class="col-span-12 grid justify-items-end">
                                        <button type="button" class="h-[3rem] bg-red-600 rounded-md p-2 text-center min-w-[5.5rem]" onclick="removeProduct(this)">Remove</button>
                                    </div>
                                </div>
                                <hr class="col-span-12 opacity-[20%] mt-4">
                            </div>
                        </div>
                        <div class="col-span-6">
                            <br>
                            <button type="submit" class="bg-blue-600 rounded-md p-2 text-center">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var imagePreview = input.closest('.grid').querySelector('.preview');
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function addProduct() {
            var container = document.getElementById('products-container');
            var productTemplate = document.querySelector('.product');
            var productClone = productTemplate.cloneNode(true);
            var imagePreview = productClone.querySelector('.preview');
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
            container.appendChild(productClone);

            var inputFields = productClone.querySelectorAll('input, select');
            inputFields.forEach(function(field) {
                field.value = '';
            });
        }

        function removeProduct(button) {
            var products = document.querySelectorAll('.product');
            if (products.length > 1) {
                var product = button.closest('.product');
                product.remove();
            }
            else{
                alert("You can't remove at the last.")
            }
        }
    </script>
</x-app-layout>
