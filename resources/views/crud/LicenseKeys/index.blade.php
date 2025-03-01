<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('alert'))
                <div class="p-4 m-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium"> {{ session('alert') }} </span>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg m-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-12">
                        <h1 class="col-span-10 max-sm:col-span-8 text-xl font-bold pt-2 pb-2">License Keys</h1>
                        <a href="{{ Route('LicenseKeys.Create') }}" class="col-span-2 max-sm:col-span-4 bg-blue-600 rounded-md p-2 minw-[2rem] text-center">New</a>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                        <h1 class="col-span-1 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre">ID</h1>
                        <h1 class="col-span-3 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre">Product Name</h1>
                        <h1 class="col-span-3 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre">License Keys</h1>
                        <h1 class="col-span-1 font-bold pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre">Status</h1>
                        <h1 class="col-span-4 max-sm:col-span-3 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre">More</h1>
                    </div>
                    @foreach ($licenseKeys as $item)
                        <div class="grid grid-cols-12 gap-2">
                            <h1 class="col-span-1 pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre"> {{ $item->id }} </h1>
                            <h1 class="col-span-3 pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre"> {{ $item->products->Name }} </h1>
                            <h1 class="col-span-3 pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre"> {{ $item->LicenseKeys }} </h1>
                            <h1 class="col-span-1 pt-2 pb-2 text-ellipsis overflow-hidden whitespace-pre"> {{ $item->Status }} </h1>
                            <div class="col-span-4 max-sm:col-span-3 pt-2 pb-2 text-center text-ellipsis flex justify-around">
                                <a href="{{ route('LicenseKeys.Edit',$item->id) }}" class="bg-blue-600 p-2 mx-4 rounded-lg max-md:w-[2rem] w-[5rem] flex items-center justify-between"><h1 class="max-md:hidden">Edit</h1> <h1 class="fa-sharp fa-solid fa-pen"></h1></a>
                                <form action="{{ Route('LicenseKeys.Delete',$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-2 rounded-lg max-md:w-[2rem] w-[5rem] flex items-center justify-between"><h1 class="max-md:hidden">Delete</h1><h1 class="fa-sharp fa-solid fa-trash"></h1></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="py-5 content max-w-[81rem] w-[90%] h-[100%] m-auto flex justify-center">
                {{ $licenseKeys->links('KmeowKeyShop.pagination') }}
            </div>
        </div>
    </div>
</x-app-layout>
