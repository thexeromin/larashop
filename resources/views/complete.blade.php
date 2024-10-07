<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Completed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-blue-50" role="alert">
                        <span class="font-medium">Order Submitted!</span> Your order will reach you soon.<a
                            href="/product" class="text-blue-500">Go back to homepage</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>