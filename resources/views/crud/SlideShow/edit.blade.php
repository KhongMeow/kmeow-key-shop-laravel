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
                        <h1 class="col-span-12 text-xl font-bold pt-2 pb-2">Update SlideShow</h1>
                        <hr class="col-span-12 opacity-[20%] mt-4">
                    </div>
                    <form action="{{ Route('SlideShow.Update',$products->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="grid grid-cols-12 gap-4 flex flex-wrap">
                            <div class="col-span-6 max-sm:col-span-12">
                                <label for="">Photo</label>
                                <input class="rounded-md bg-gray-500 border focus:border-gray-600 w-full file:h-full file:bg-gray-600 file:w-1/3 file:border-0 focus:outline-none border-0 h-[2.6rem]" type="file" name="Photo" onchange="previewImage(event)">
                            </div>
                            <div class="col-span-6 max-sm:col-span-12">
                                <img id="preview" src="{{ asset('SlideShowPhotos/' . $products->Photo) }}" alt="Preview" style="display: block; max-width: 200px; max-height: 200px;">
                            </div>
                            <div class="col-span-12">
                                <button type="submit" class="bg-blue-600 rounded-md p-2 text-center">Update</button>
                            </div>
                            <script>
                                function previewImage(event) {
                                    var input = event.target;
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            var imagePreview = document.getElementById('preview');
                                            imagePreview.src = e.target.result;
                                            imagePreview.style.display = 'block';
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
