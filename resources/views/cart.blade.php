@extends('layouts.app')

@section('content')
    <div class="bg-gray-50">
        <div class="max-w-2xl px-4 pt-16 pb-24 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Checkout</h2>

            <form onsubmit="submitForm(event)" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                        <div class="mt-4">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <div class="mt-1">
                                <input type="email" id="email-address" name="email-address" autocomplete="email"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="pt-10 mt-10 border-t border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                        <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                <div class="mt-1">
                                    <input type="text" id="first-name" name="first-name" autocomplete="given-name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <div class="mt-1">
                                    <input type="text" id="last-name" name="last-name" autocomplete="family-name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <div class="mt-1">
                                    <input type="text" name="company" id="company"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <div class="mt-1">
                                    <input type="text" name="address" id="address" autocomplete="street-address"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="apartment" class="block text-sm font-medium text-gray-700">Apartment, suite,
                                    etc.</label>
                                <div class="mt-1">
                                    <input type="text" name="apartment" id="apartment"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <div class="mt-1">
                                    <input type="text" name="city" id="city" autocomplete="address-level2"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <div class="mt-1">
                                    <select id="country" name="country" autocomplete="country-name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="region" class="block text-sm font-medium text-gray-700">State /
                                    Province</label>
                                <div class="mt-1">
                                    <input type="text" name="region" id="region" autocomplete="address-level1"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal code</label>
                                <div class="mt-1">
                                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <div class="mt-1">
                                    <input type="text" name="phone" id="phone" autocomplete="tel"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-10 mt-10 border-t border-gray-200" x-data="{ deliveryMethod: 'Standard' }">
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900">Delivery method</legend>

                            <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <label
                                    class="relative flex p-4 bg-white border rounded-lg shadow-sm cursor-pointer focus:outline-none"
                                    :class="{ 'border-accent-500 ring-2 ring-accent-500': deliveryMethod === 'Standard' }"
                                    @click="deliveryMethod = 'Standard'">
                                    <input type="radio" name="delivery-method" value="Standard" class="sr-only"
                                        checked x-model="deliveryMethod">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span id="delivery-method-0-label"
                                                class="block text-sm font-medium text-gray-900">Standard</span>
                                            <span id="delivery-method-0-description-0"
                                                class="flex items-center mt-1 text-sm text-gray-500">4–10 business
                                                days</span>
                                            <span id="delivery-method-0-description-1"
                                                class="mt-6 text-sm font-medium text-gray-900">$5.00</span>
                                        </span>
                                    </span>
                                    <svg class="w-5 h-5 text-accent-600" x-show="deliveryMethod === 'Standard'"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="absolute border-2 rounded-lg pointer-events-none -inset-px"
                                        aria-hidden="true"></span>
                                </label>

                                <label
                                    class="relative flex p-4 bg-white border rounded-lg shadow-sm cursor-pointer focus:outline-none"
                                    :class="{ 'border-accent-500 ring-2 ring-accent-500': deliveryMethod === 'Express' }"
                                    @click="deliveryMethod = 'Express'">
                                    <input type="radio" name="delivery-method" value="Express" class="sr-only"
                                        x-model="deliveryMethod">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span id="delivery-method-1-label"
                                                class="block text-sm font-medium text-gray-900">Express</span>
                                            <span id="delivery-method-1-description-0"
                                                class="flex items-center mt-1 text-sm text-gray-500">2–5 business
                                                days</span>
                                            <span id="delivery-method-1-description-1"
                                                class="mt-6 text-sm font-medium text-gray-900">$16.00</span>
                                        </span>
                                    </span>
                                    <svg class="w-5 h-5 text-accent-600" x-show="deliveryMethod === 'Express'"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="absolute border-2 rounded-lg pointer-events-none -inset-px"
                                        aria-hidden="true"></span>
                                </label>
                            </div>
                        </fieldset>
                    </div>


                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($cartItems['items'] as $item)
                                <li class="flex px-4 py-6 sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $item['product']->images[0] }}" alt="{{ $item['product']->name }}"
                                            class="w-20 rounded-md">
                                    </div>

                                    <div class="flex flex-col flex-1 ml-6">
                                        <div class="flex">
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-sm">
                                                    <a href="#"
                                                        class="font-medium text-gray-700 hover:text-gray-800">{{ $item['product']->name }}</a>
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-500">{{ $item['product']->description }}
                                                </p>
                                            </div>

                                            <div class="flex-shrink-0 flow-root ml-4">
                                                <button type="button"
                                                    class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Remove</span>
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex items-end justify-between flex-1 pt-2">
                                            <p class="mt-1 text-sm font-medium text-gray-900">
                                                ${{ number_format($item['product']->price, 2) }}</p>

                                            <div class="ml-4" x-data="{ quantity: {{ $item['quantity'] }} }">
                                                <label for="quantity-{{ $item['id'] }}" class="sr-only">Quantity</label>
                                                <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
                                                    <button type="button"
                                                        @click="updateQuantity(-1, {{ $item['id'] }})"
                                                        class="p-2 text-base font-medium text-gray-700 focus:outline-none focus:border-accent-500 focus:ring-1 focus:ring-accent-500 sm:text-lg">-</button>
                                                    <input id="quantity-{{ $item['id'] }}" name="quantity"
                                                        type="text" x-model="quantity"
                                                        class="w-12 text-base font-medium text-center text-gray-700 border-none focus:outline-none focus:ring-0 sm:text-sm"
                                                        readonly>
                                                    <button type="button" @click="updateQuantity(1, {{ $item['id'] }})"
                                                        class="p-2 text-base font-medium text-gray-700 focus:outline-none focus:border-accent-500 focus:ring-1 focus:ring-accent-500 sm:text-lg">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @dump($cartItems)

                        <dl class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Subtotal</dt>
                                <dd id="subtotal" class="text-sm font-medium text-gray-900">
                                    ${{ number_format($cartItems['subtotal'], 2) }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Shipping</dt>
                                <dd id="shipping" class="text-sm font-medium text-gray-900">$5.00</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Taxes</dt>
                                <dd id="taxes" class="text-sm font-medium text-gray-900">$5.52</dd>
                            </div>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                <dt class="text-base font-medium">Total</dt>
                                <dd id="total" class="text-base font-medium text-gray-900">$75.52</dd>
                            </div>

                            <script>
                                function updateTotal() {
                                    const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace('$', ''));
                                    const shipping = parseFloat(document.getElementById('shipping').textContent.replace('$', ''));
                                    const taxes = parseFloat(document.getElementById('taxes').textContent.replace('$', ''));

                                    const total = subtotal + shipping + taxes;
                                    document.getElementById('total').textContent = `$${total.toFixed(2)}`;
                                }

                                // Event listeners to update total when subtotal, shipping, or taxes change
                                document.getElementById('subtotal').addEventListener('DOMSubtreeModified', updateTotal);
                                document.getElementById('shipping').addEventListener('DOMSubtreeModified', updateTotal);
                                document.getElementById('taxes').addEventListener('DOMSubtreeModified', updateTotal);
                            </script>
                        </dl>

                        <!-- Payment -->
                        <div class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                            <fieldset class="mt-4">
                                <legend class="sr-only">Payment type</legend>
                                <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                    <div class="flex items-center">
                                        <input id="credit-card" name="payment-type" type="radio" checked
                                            class="w-4 h-4 border-gray-300 text-accent-600 focus:ring-accent-500">
                                        <label for="credit-card"
                                            class="block ml-3 text-sm font-medium text-gray-700">Credit
                                            card</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="paypal" name="payment-type" type="radio"
                                            class="w-4 h-4 border-gray-300 text-accent-600 focus:ring-accent-500">
                                        <label for="paypal"
                                            class="block ml-3 text-sm font-medium text-gray-700">PayPal</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="etransfer" name="payment-type" type="radio"
                                            class="w-4 h-4 border-gray-300 text-accent-600 focus:ring-accent-500">
                                        <label for="etransfer"
                                            class="block ml-3 text-sm font-medium text-gray-700">eTransfer</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="px-4 py-6 border-t border-gray-200 sm:px-6">
                            <button type="submit"
                                class="w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 focus:ring-offset-gray-50">Confirm
                                order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function submitForm(event) {
        event.preventDefault();
        var formData = new FormData(event.target);
        alert(JSON.stringify(Object.fromEntries(formData), null, 2));
    }
</script>

<script>
    function updateQuantity(change, productId) {
        var quantityInput = document.getElementById('quantity-' + productId);
        var currentQuantity = parseInt(quantityInput.value);
        var newQuantity = currentQuantity + change;
        if (newQuantity > 0) {
            axios.post('/cart/update-quantity/' + productId, {
                    quantity: newQuantity
                })
                .then(response => {
                    const items = response.data.cartItems.items;
                    const item = items.find(item => item.id === productId);
                    const subtotal = response.data.cartItems.subtotal;

                    quantityInput.value = item.quantity;
                    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
                })
                .catch(error => {
                    /* Handle error */ });
        }
    }
</script>
