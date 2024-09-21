<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <div class="flex flex-col space-y-4">

                        @foreach ($cart_items as $item)
                        <!-- Cart Item -->
                        <div class="flex flex-col sm:flex-row items-center justify-between p-4 border-b">
                            <div class="flex items-center">
                                <!-- Product Image -->
                                <img class="w-24 h-24 rounded-lg" src="{{ $item->product->image_url }}" alt="T-shirt">
                                <!-- Product Details -->
                                <div class="ml-4">
                                    <h2 class="text-lg font-medium">{{ $item->product->name }}</h2>
                                    <p class="text-gray-600">H&S</p>
                                </div>
                            </div>
                            <!-- Quantity and Price -->
                            <div class="mt-4 sm:mt-0 sm:flex items-center">
                                <!-- <div class="flex items-center space-x-2">
                                    <button class="px-2 py-1 bg-gray-200 rounded">-</button>
                                    <input type="text" value="1"
                                        class="w-10 text-center border border-gray-300 rounded">
                                    <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                                </div> -->
                                <p class="ml-6 text-xl font-medium">${{ $item->product->price }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Cart Summary -->
                    <div class="mt-6 flex justify-between items-center">
                        <p class="text-lg font-medium">Total: $55.00</p>
                        <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Checkout</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>