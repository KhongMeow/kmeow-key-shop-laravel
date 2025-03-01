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
                        <h1 class="col-span-10 max-sm:col-span-8 text-xl font-bold pt-2 pb-2">SlideShow</h1>
                        <a href="{{ Route('SlideShow.Create') }}" class="col-span-2 max-sm:col-span-4 bg-blue-600 rounded-md p-2 min-w-[2rem] text-center min-w-[5rem]">New</a>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                        <h1 class="col-span-2 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">ID</h1>
                        <h1 class="col-span-6 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">Image</h1>
                        <h1 class="col-span-4 font-bold pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre ">More</h1>
                    </div>
                    @foreach ($slideShow as $item)
                        <div class="grid grid-cols-12 gap-2">
                            <h1 class="col-span-2 pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre "> {{ $item->id }} </h1>
                            <img src="{{ asset('SlideShowPhotos/' . $item->Photo) }}" class="col-span-6 pt-2 pb-2 text-center text-ellipsis overflow-hidden whitespace-pre h-[3rem] m-auto"></h1>
                            <div class="col-span-4 pt-2 pb-2 text-center text-ellipsis flex justify-around ">
                                <a href="{{ Route('SlideShow.Edit',$item->id) }}" class="bg-blue-600 p-2 rounded-lg max-md:w-[2rem] w-[5rem] flex items-center justify-between"><h1 class="max-md:hidden">Edit</h1><h1 class="fa-sharp fa-solid fa-pen"></h1></a>
                                <form action="{{ Route('SlideShow.Delete',$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-2 rounded-lg max-md:w-[2rem] w-[5rem] flex items-center justify-between"><h1 class="max-md:hidden">Delete</h1> <h1 class="fa-sharp fa-solid fa-trash"></h1></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="py-5 content max-w-[81rem] w-[90%] h-[100%] m-auto flex justify-center">
                {{ $slideShow->links('KmeowKeyShop.pagination') }}
            </div>
        </div>
    </div>
</x-app-layout>
