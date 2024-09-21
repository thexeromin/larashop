<button 
    {{ $attributes->merge(['class' => 'px-2 py-1 text-xs font-medium ext-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150']) }}
>
    {{ $slot }}
</button>