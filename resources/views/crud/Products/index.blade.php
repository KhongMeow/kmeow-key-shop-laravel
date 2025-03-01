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
                    <div class="grid grid-cols-12 gap-2">
                        <h1 class="col-span-9 text-xl font-bold pt-2 pb-2">Products</h1>
                        <a href="{{ Route('Products.Create') }}" class="col-span-3 bg-blue-600 rounded-md p-2 min-w-[4rem] text-center">New</a>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                        <div class="max-md:hidden col-span-12 grid grid-cols-12">
                            <h1 class="col-span-1 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">ID</h1>
                            <h1 class="col-span-2 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">Name</h1>
                            <h1 class="col-span-1 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">Type</h1>
                            <h1 class="col-span-2 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">Detail</h1>
                            <h1 class="col-span-2 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">Description</h1>
                            <h1 class="col-span-1 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">Image</h1>
                            <h1 class="col-span-1 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">Price</h1>
                            <h1 class="col-span-2 max-sm:col-span-3 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">More</h1>
                        </div>
                    </div>
                    @foreach ($products as $item)
                    <div class="max-md:bg-gray-700 p-2 my-2 rounded">
                        <div class="grid grid-cols-12 gap-2">
                            <h1 class="hidden max-md:block max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden whitespace-pre ">ID</h1>
                            <h1 class="col-span-1 max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-right text-center text-ellipsis overflow-hidden whitespace-pre "> {{ $item->id }} </h1>
                            <h1 class="hidden max-md:block max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden whitespace-pre ">Name</h1>
                            <h1 class="col-span-2 max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-right text-center text-ellipsis overflow-hidden whitespace-pre "> {{ $item->Name }} </h1>
                            <h1 class="hidden max-md:block max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden whitespace-pre ">Type</h1>
                            <h1 class="col-span-1 max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-right text-center text-ellipsis overflow-hidden whitespace-pre "> {{ $item->productTypes->Name }}</h1>
                            <h1 class="hidden max-md:block max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden whitespace-pre ">Detail</h1>
                            <h1 class="col-span-2 max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-right text-center text-ellipsis overflow-hidden whitespace-pre "> {{ $item->Detail }} </h1>
                            <h1 class="hidden max-md:block max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden whitespace-pre ">Description</h1>
                            <h1 class="col-span-2 max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-right text-center text-ellipsis overflow-hidden whitespace-pre "> {{ $item->Description }} </h1>
                            <h1 class="hidden max-md:block max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden whitespace-pre ">Image</h1>
                            <img src="{{ asset('ProductImages/' . $item->Image) }}" class="col-span-1 max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-right text-center text-ellipsis overflow-hidden whitespace-pre h-[3rem] m-auto"></h1>
                            <h1 class="hidden max-md:block max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden whitespace-pre ">Price</h1>
                            <h1 class="col-span-1 max-md:text-xs text-sm max-md:col-span-6 pt-2 pb-2 max-md:text-right text-center text-ellipsis overflow-hidden whitespace-pre "> {{ '$ '.$item->Price }} </h1>
                            <div class="col-span-2 max-md:text-xs text-sm max-md:col-span-6 max-sm:col-span-3 max-md:text-xs max-lg:text-xs max-md:col-span-6 pt-2 pb-2 max-md:text-left text-center text-ellipsis overflow-hidden flex justify-around min-w-[8rem]">
                                <a href="{{ Route('Products.Edit',$item->id) }}" class="bg-blue-600 p-2 rounded-lg">Edit <h1 class="fa-sharp fa-solid fa-pen"></h1></a>
                                <form action="{{ Route('Products.Delete',$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-2 rounded-lg">Delete <h1 class="fa-sharp fa-solid fa-trash"></h1></button>
                                </form>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="py-5 content max-w-[81rem] w-[90%] h-[100%] m-auto flex justify-center">
                {{ $products->links('KmeowKeyShop.pagination') }}
            </div>
        </div>
    </div>
</x-app-layout>
