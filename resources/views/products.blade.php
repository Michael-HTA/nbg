<x-app-layout>
    <div class="sm:flex flex-wrap max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">

        <!-- label -->
        <div class="w-full sm:hidden font-semibold text-xl text-center text-gray-900 dark:text-gray-100">Products</div>

        <!-- card -->
        @foreach ($products as $product)
            <div
                class="text-gray-900 bg-white dark:text-gray-100 dark:bg-gray-800 w-64 rounded-lg mt-4 sm:ml-8 mx-auto sm:mx-0
            transition-all ease-in-out duration-300 hover:-translate-y-1 hover:scale-105">
                <div class="p-1">
                    <img src="https://images.pexels.com/photos/1306548/pexels-photo-1306548.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="something" class="w-full h-56 rounded-md">
                    <header class="text-lg text-center font-medium">{{ $product->name }}</header>
                    <p class="text-center">{{ $product->price }}</p>
                    <button class=" bg-blue-700 hover:bg-blue-600 rounded-lg w-full mt-1">Detail</button>
                    <button class="bg-green-600 hover:bg-green-500 rounded-lg w-full mt-3 sm:mt-1">Add to Cart</button>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
