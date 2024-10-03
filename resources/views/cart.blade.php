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
                    <div class="flex w-full p-5 gap-10">
                        
                    <div class="flex flex-col space-y-4 w-[50%]">

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
                                <p class="ml-6 text-xl font-medium">${{ $item->product->price }}</p>

                                <div class="flex items-center space-x-2 ml-5">
                                    <form action="{{ route('cart.destroy', $item) }}" method="POST"
                                        id="cart_destroy_form">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa-solid fa-xmark cursor-pointer"
                                            onclick="document.getElementById('cart_destroy_form').submit();">
                                        </i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <form action="" method="post" class="w-[50%]">
                        @csrf
                        <div>
                            <div class="my-5">

                                <div class="mb-5">
                                    <x-input-label for="card_holder_name" :value="__('Card Holder Name')" />
                                    <x-text-input id="card_holder_name" class="block mt-1 w-full" type="text"
                                        name="card_holder_name" required autofocus />
                                </div>
                                <div class="mb-5">
                                    <x-input-label for="card_number" :value="__('Card Number')" />
                                    <x-text-input id="card_number" class="block mt-1 w-full" type="text"
                                        name="card_number" required />
                                </div>
                                <div class="mb-5">
                                    <x-input-label for="expir_month" :value="__('Expiration Month')" />
                                    <x-text-input id="expir_month" class="block mt-1 w-full" type="text"
                                        name="expir_month" required />
                                </div>
                                <div class="mb-5">
                                    <x-input-label for="expir_year" :value="__('Expiration Year')" />
                                    <x-text-input id="expir_year" class="block mt-1 w-full" type="text"
                                        name="expir_year" required />
                                </div>
                                <div class="mb-5">
                                    <x-input-label for="cvc" :value="__('CVC')" />
                                    <x-text-input id="cvc" class="block mt-1 w-full" type="text" name="cvc" required />
                                </div>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="mt-6 flex justify-between items-center">
                            <p class="text-lg font-medium">$ {{ $cart_items->reduce(function($c, $item) { return $c +
                                $item->product->price; }) ?? 0 }}</p>
                            <button
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Checkout</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>