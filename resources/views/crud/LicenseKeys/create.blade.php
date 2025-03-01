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
                        <h1 class="col-span-10 text-xl font-bold pt-2 pb-2">Create License Keys</h1>
                        <button type="button" class="col-span-2 bg-blue-600 rounded-md p-2 text-center" onclick="addProduct()">Add Product</button>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                    </div>
                    <form action="{{ Route('LicenseKeys.Store') }}" method="post">
                        @csrf
                        <div id="license-keys-container">
                            <div class="license-key">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-5 max-sm:col-span-12">
                                        <label for="">Product</label>
                                        <select class="rounded-md bg-gray-500 border focus:border-gray-600 w-full" name="ProductID[]">
                                            <option value="" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">Select</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">{{ $product->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="">License Keys</label>
                                        <input type="text" name="LicenseKeys[]" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">
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
            var container = document.getElementById('license-keys-container');
            var licenseKeyTemplate = document.querySelector('.license-key');
            var licenseKeyClone = licenseKeyTemplate.cloneNode(true);
            container.appendChild(licenseKeyClone);

            var inputFields = licenseKeyClone.querySelectorAll('input');
            inputFields.forEach(function(field) {
                field.value = '';
            });
        }

        function removeProduct(button) {
            var licenseKey = document.querySelectorAll('.license-key');
            if (licenseKey.length > 1) {
                var licenseKey = button.closest('.license-key');
                licenseKey.remove();
            }
            else{
                alert("You can't remove at the last.")
            }
        }
    </script>
</x-app-layout>
