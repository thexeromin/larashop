<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Product Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add product details to list your clothing item.") }}
                            </p>
                        </header>

                        <form 
                            class="mt-6 space-y-6"
                            method="post"
                            action="{{ route('product.store') }}" 
                            enctype="multipart/form-data"
                        >
                            @csrf

                            <div>
                                <x-input-label for="name" :value="__('Product Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Product Description')" />
                                <x-textarea-input id="description" name="description" type="text" class="mt-1 block w-full"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"
                                    min="0" required />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-input-label for="image_file" :value="__('Product Image')" />
                                <x-text-input id="image_file" name="image_file" type="file" class="mt-1 block w-full"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
                            </div>

                            <div>
                                <x-input-label for="stock" :value="__('Stock')" />
                                <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full"
                                    min="0" required />
                                <x-input-error class="mt-2" :messages="$errors->get('stock')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'product-added')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{
                                    __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>