<div class="relative z-10 slide-over-cart" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-gray-200 bg-opacity-75" onclick="toggleSlideOverCart()"></div>
    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none">
                <div class="w-screen max-w-md pointer-events-auto">
                    <div class="flex flex-col h-full overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 px-4 py-6 overflow-y-auto sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Warenkorb</h2>
                                <div class="flex items-center ml-3 h-7">
                                    <button onclick="toggleSlideOverCart()" type="button"
                                        class="relative p-2 -m-2 text-gray-400 hover:text-gray-500">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Panel schließen</span>
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
                                <p>Zwischensumme</p>
                                <p class="subtotal-display">0.00 CHF</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Versand und Steuern werden beim Checkout berechnet.</p>
                            <div class="mt-6">
                                <a href={{ route('cart') }}
                                    class="flex items-center justify-center px-6 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-accent-600 hover:bg-accent-700">Zur Kasse</a>
                            </div>
                            <div class="flex justify-center mt-6 text-sm text-center text-gray-500">
                                <p>
                                    oder
                                    <button onclick="toggleSlideOverCart()" type="button"
                                        class="font-medium text-accent-600 hover:text-accent-500">
                                        Weiter einkaufen
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

<div id="emptyCartModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl empty_cart_modal--content sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Warenkorb leer</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Ihr Warenkorb ist leer. Bitte fügen Sie einige Produkte hinzu, bevor Sie zur Kasse gehen.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4 px-4 py-3 bg-gray-50 sm:px-6 sm:flex-row-reverse">
                <a href="{{ route('webshop') }}"
                    class="w-full px-4 py-2 text-base font-medium text-center text-white border border-transparent rounded-md shadow-sm bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 sm:w-auto sm:text-sm">Zum Webshop</a>
                <button type="button"
                    class="w-full px-4 py-2 text-base font-medium border rounded-md text-accent-600 border-accent-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 sm:w-auto sm:text-sm"
                    onclick="toggleModal('emptyCartModal', false)">Schließen</button>
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
    function loadCartItems() {
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
                                    <p class="mt-1 text-sm text-gray-500">Menge ${item.quantity}</p>
                                </div>
                                <div class="flex items-end justify-between flex-1 text-sm">
                                    <button onclick="removeFromCart(${item.index})" type="button" class="font-medium text-accent-600 hover:text-accent-500">Entfernen</button>
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

    function toggleSlideOverCart() {
        const slideOver = document.querySelector('.slide-over-cart');
        if (slideOver.classList.contains('open')) {
            slideOver.classList.toggle('open');
            return;
        }
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                if (data.totalItems === 0) {
                    toggleModal('emptyCartModal', true);
                    return; // Guard clause that stops execution if the cart is empty
                }
                slideOver.classList.toggle('open');
                loadCartItems(); // Load cart items if not already loaded
            })
            .catch(error => console.error('Error checking cart count:', error));
    }

    document.addEventListener('click', function(event) {
        const cartModal = document.querySelector('#emptyCartModal');
        const modalContent = document.querySelector('.empty_cart_modal--content');

        if (!cartModal.classList.contains('hidden') && !modalContent.contains(event.target)) {
            cartModal.classList.add('hidden');
        }
    });

    function toggleModal(modalId, show) {
        const modal = document.getElementById(modalId);
        if (show) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
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

</script>
