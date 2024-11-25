<x-app-layout>
    <div class="sm:flex flex-wrap max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">

        <!-- label -->
        <div class="w-full sm:hidden font-semibold text-xl text-center text-gray-900 dark:text-gray-100">Products</div>
        <div class="w-full flex justify-center">
            <form class="sm:w-full flex flex-col items-center sm:flex-row gap-2 mt-2 sm:mt-0" action=""
                method="POST">
                <!-- Filter Dropdown -->
                @csrf
                <div class="flex items-center gap-1">
                    <label for="filter" class=" hidden sm:block font-medium text-gray-900 dark:text-gray-100">Filter
                        by:</label>
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
                <div class="items-center">
                    <button
                        class="bg-blue-600 hover:bg-blue-500 text-white font-semibold px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-700">
                        Search
                    </button>
                </div>
            </form>
            <a href="{{url('/cart')}}" class="hidden sm:block">
                <img class="w-10 bg-gray-700 rounded-full ml-3 p-2"
                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 24 24'%3E%3Cpath fill='white' d='M7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M5.2 4h16.5l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4H1V2h3.25z'/%3E%3C/svg%3E"
                alt="Icon">
            </a>
        </div>

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
                    <button 
                        class="bg-green-600 hover:bg-green-500 rounded-lg w-full mt-3 sm:mt-1 add-to-cart-btn"
                        data-product-id="{{ $product->id }}" 
                        data-product-name="{{ $product->name }}"
                        data-product-price="{{ $product->price }}">
                        Add to Cart
                    </button>
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

        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    const productName = this.dataset.productName;
                    const productPrice = this.dataset.productPrice;
                    console.log('clicked');

                    const product = {
                        id: productId,
                        name: productName,
                        price: productPrice
                    };

                    cartItems.push(product);

                    localStorage.setItem('cartItems', JSON.stringify(cartItems));

                    console.log('Item added to cart', product);
                });
            });
        });
    </script>
</x-app-layout>
