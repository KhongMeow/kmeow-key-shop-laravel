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
                        <h1 class="col-span-12 text-xl font-bold pt-2 pb-2">Update Product Types</h1>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                    </div>
                    <form action="{{ Route('ProductTypes.Update',$productTypes->id) }}" method="post">
                    @csrf
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12">
                                <label for="">Name</label>
                                <input type="text" name="Name" value="{{ $productTypes->Name }}" class="rounded-md bg-gray-500 border focus:border-gray-600 w-full">
                            </div>
                            <div class="col-span-2">
                                <button type="submit" class="bg-blue-600 rounded-md p-2 text-center">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
