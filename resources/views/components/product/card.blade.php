@props([
    'id' => '',
    'image_url' => '',
    'title' => '',
    'description' => 'H&S',
    'price' => ''
])

<div>
    <div class="group relative">
        <div
            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
            <img src="{{ $image_url }}" alt="Front of men&#039;s Basic Tee in black."
                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>

        <div class="mt-4 flex justify-between">
            <div>
                <h3 class="text-sm text-gray-700">
                    <a href="#">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $title }}
                    </a>
                </h3>
            </div>

            <p class="text-sm font-medium text-gray-900">${{ $price }}</p>
        </div>
    </div>

    <div class="mt-4 flex justify-between items-center">
        <p class="block mt-1 text-sm text-gray-500">{{ $description }}</p>
        <form
            method="post"
            action="{{ route('cart.store') }}" 
        >
           @csrf
           <input type="hidden" name="product_id" type="text" value="{{ $id }}"> 
           <input type="hidden" name="quantity" type="number" value="1"> 

           <x-button-sm>Add to cart</x-button-sm>
        </form>
    </div>
</div>