<x-app-layout>
    <div id="cart-list" class="max-w-sm mx-auto mt-10 shadow-lg rounded-lg text-gray-900 bg-white dark:text-gray-100 dark:bg-gray-800">
        <header class="text-center text-lg font-semibold">Shopping Cart Item List</header>
        <ul id="cart-items-list" class="list-none p-0">
        </ul>
        <div class="w-full flex justify-center mt-4 pb-1"> <!-- Centering the button -->
            <button class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-700">
                Order
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            const cartList = document.getElementById('cart-items-list');

            if (cartItems.length === 0) {
                cartList.innerHTML = '<p class="text-center p-4">No items in your cart</p>';
            } else {

                cartItems.forEach((item, index) => {
                    const itemElement = document.createElement('li');
                    itemElement.className = 'cart-item flex justify-between items-center py-2 px-4 border-b';
                    itemElement.textContent = `${item.name} - $${item.price}`;

                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Remove';
                    removeButton.className = 'text-red-500 hover:text-red-700';
                    
                    removeButton.addEventListener('click', function() {

                        cartItems.splice(index, 1);

                        localStorage.setItem('cartItems', JSON.stringify(cartItems));

                        itemElement.remove();

                        if (cartItems.length === 0) {
                            cartList.innerHTML = '<p class="text-center p-4">No items in your cart</p>';
                        }
                    });

                    itemElement.appendChild(removeButton);

                    cartList.appendChild(itemElement);
                });
            }
        });
    </script>
</x-app-layout>
