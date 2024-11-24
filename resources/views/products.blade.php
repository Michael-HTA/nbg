<x-app-layout>
    <div class="sm:flex flex-wrap max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">

        <!-- label -->
        <div class="w-full sm:hidden font-semibold text-xl text-center text-gray-900 dark:text-gray-100">Products</div>

        <form class="sm:w-full flex flex-col sm:flex-row gap-2 items-center mt-2 sm:mt-0" action="" method="POST">
            <!-- Filter Dropdown -->
            @csrf
            <div class="flex items-center gap-1">
                <label for="filter" class=" hidden sm:block font-medium text-gray-900 dark:text-gray-100">Filter by:</label>
                <select name="filter" id="filter"
                    class="w-44 sm:w-auto border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-700">
                    <option value="price">Price</option>
                    <option value="category">Category</option>
                </select>
            </div>

            <div id="dynamicInput" class="flex-grow">
                <input type="text" id="priceInput" name="search" placeholder="Enter price..."
                    class="w-44 sm:w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-700 px-3 py-2">
            </div>

            <!-- Search Button -->
            <div>
                <button
                    class="bg-blue-600 hover:bg-blue-500 text-white font-semibold px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-700">
                    Search
                </button>
            </div>
        </form>

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
                    <a href="{{ url("/products/$product->id") }}"
                        class=" block text-center bg-blue-700 hover:bg-blue-600 rounded-lg w-full mt-1">Detail</a>
                    <button class="bg-green-600 hover:bg-green-500 rounded-lg w-full mt-3 sm:mt-1">Add to Cart</button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
            document.addEventListener('DOMContentLoaded', function() {
            const filterSelect = document.getElementById('filter');
            const dynamicInput = document.getElementById('dynamicInput');
            const categories = @json($categories);

            filterSelect.addEventListener('change', function() {

                dynamicInput.innerHTML = '';

                if (this.value === 'price') {

                    const priceInput = document.createElement('input');
                    priceInput.type = 'text';
                    priceInput.name = 'search';
                    priceInput.placeholder = 'Enter price...';
                    priceInput.className =
                        'w-44 sm:w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-700 px-3 py-2';
                    dynamicInput.appendChild(priceInput);
                } else if (this.value === 'category') {

                    const categorySelect = document.createElement('select');
                    categorySelect.name = 'search';
                    categorySelect.className =
                        'w-44 sm:w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-700 px-3 py-2';


                    categories.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        categorySelect.appendChild(option);
                    });

                    dynamicInput.appendChild(categorySelect);
                }
            });
        });
    </script>
</x-app-layout>
