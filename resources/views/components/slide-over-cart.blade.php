<div class="relative z-10 slide-over-cart" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-gray-200 bg-opacity-75" onclick="toggleSlideOverCart()"></div>
    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none">
                <div class="w-screen max-w-md pointer-events-auto">
                    <div class="flex flex-col h-full overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 px-4 py-6 overflow-y-auto sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                                <div class="flex items-center ml-3 h-7">
                                    <button onclick="toggleSlideOverCart()" type="button"
                                        class="relative p-2 -m-2 text-gray-400 hover:text-gray-500">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Close panel</span>
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-6 border-t border-gray-200 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Subtotal</p>
                                <p class="subtotal-display">$0.00</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">
                                <a href={{ route('cart') }}
                                    class="flex items-center justify-center px-6 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-accent-600 hover:bg-accent-700">Checkout</a>
                            </div>
                            <div class="flex justify-center mt-6 text-sm text-center text-gray-500">
                                <p>
                                    or
                                    <button onclick="toggleSlideOverCart()" type="button"
                                        class="font-medium text-accent-600 hover:text-accent-500">
                                        Continue Shopping
                                        <span aria-hidden="true"> &rarr;</span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .slide-over-cart {
        transform: translateX(100%);
        transition: transform 0.2s ease-in-out;
    }

    .slide-over-cart.open {
        z-index: 999;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        transform: translateX(0);
    }
</style>
<script>
    function toggleSlideOverCart() {
        const slideOver = document.querySelector('.slide-over-cart');
        slideOver.classList.toggle('open'); // Adjust this class based on your actual open/close classes
        loadCartItems(); // Optionally load cart items if not already loaded
    }

    function removeFromCart(productId) {
        fetch(`/cart/remove/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    productId: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.updateCartCount();
                    loadCartItems(); // Reload cart items to reflect the changes
                }
            })
            .catch(error => console.error('Error removing cart item:', error));
    }

    function loadCartItems() {
        // Fetch cart items from a Laravel route and update the slide-over cart's content
        fetch('/cart/items') // Adjust the URL based on your actual route for fetching cart items
            .then(response => response.json())
            .then(data => {
                const itemsList = document.querySelector('.slide-over-cart ul');
                itemsList.innerHTML = ''; // Clear existing items
                data.items.forEach(item => {
                    itemsList.innerHTML += `
                        <li class="flex py-6">
                            <div class="flex-shrink-0 w-24 h-24 overflow-hidden border border-gray-200 rounded-md">
                                <img src="storage/${item.product.images[0]}" alt="${item.product.name}" class="object-cover object-center w-full h-full">
                            </div>
                            <div class="flex flex-col flex-1 ml-4">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3><a href="/product?id=${item.product.id}">${item.product.name}</a></h3>
                                        <p class="ml-4">CHF ${item.totalPrice}</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">${item.product.short_description}</p>
                                    <p class="mt-1 text-sm text-gray-500">Qty ${item.quantity}</p>
                                </div>
                                <div class="flex items-end justify-between flex-1 text-sm">
                                    <button onclick="removeFromCart(${item.index})" type="button" class="font-medium text-accent-600 hover:text-accent-500">Remove</button>
                                </div>
                            </div>
                        </li>
                    `;
                });
                document.querySelector('.slide-over-cart .subtotal-display').textContent =
                    `CHF ${data.subtotal.toFixed(2)}`;

            })
            .catch(error => console.error('Error loading cart items:', error));
    }
</script>
