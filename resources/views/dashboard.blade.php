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
                        <h1 class="col-span-12 text-5xl text-center font-bold pt-2 pb-2">Welcome to admin Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
