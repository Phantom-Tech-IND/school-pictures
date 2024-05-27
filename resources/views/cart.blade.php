@extends('layouts.app')
@section('content')
    <div class="bg-gray-50">
        <div class="max-w-2xl px-4 pt-16 pb-24 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Checkout</h2>

            <form onsubmit="submitForm(event)" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                @csrf
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                        <div class="mt-4 input-component">
                            <div class="flex justify-between">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address<span
                                        class="pl-1 text-red-600">*</span></label>
                                <p class="hidden text-sm text-red-600 input-error-message" id="email-error">Not a valid
                                    email address</p>
                            </div>
                            <div class="relative mt-1">
                                <input type="email" id="email-address" name="email-address" required
                                    title="Please enter a valid email address" autocomplete="email"
                                    placeholder="you@example.com"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">

                                <div
                                    class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                    <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-10 mt-10 border-t border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">Billing information</h2>

                        <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div class="input-component">
                                <div class="flex justify-between">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First
                                        name<span class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message">Not a valid first name</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" id="first-name" name="first-name" required
                                        autocomplete="given-name" placeholder="John" title="Please enter a valid first name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="input-component">
                                <div class="flex justify-between">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="last-name-error">Not a
                                        valid last name</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" id="last-name" name="last-name" required
                                        autocomplete="family-name" placeholder="Doe" title="Please enter a valid last name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-2 input-component">
                                <div class="flex justify-between">
                                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="company-error">Not a
                                        valid company name</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="company" id="company" placeholder="Your Company Inc."
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-2 input-component">
                                <div class="flex justify-between">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="address-error">Not a
                                        valid address</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="address" id="address" required
                                        autocomplete="street-address" placeholder="1234 Main St"
                                        title="Please enter a valid address"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-2 input-component">
                                <div class="flex justify-between">
                                    <label for="apartment" class="block text-sm font-medium text-gray-700">Apartment,
                                        suite, etc.</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="apartment-error">Not a
                                        valid apartment, suite, etc.</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="apartment" id="apartment" placeholder="Apt 101"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="input-component">
                                <div class="flex justify-between">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="city-error">Not a valid
                                        city</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="city" id="city" required
                                        autocomplete="address-level2" placeholder="Anytown"
                                        title="Please enter a valid city"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="input-component">
                                <div class="flex justify-between">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="country-error">Not a
                                        valid country</p>
                                </div>
                                <div class="mt-1">
                                    <select id="country" name="country" autocomplete="country-name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <option>Switzerland</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="input-component">
                                <div class="flex justify-between">
                                    <label for="region" class="block text-sm font-medium text-gray-700">State /
                                        Province</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="region-error">Not a
                                        valid state or province</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="region" id="region" autocomplete="address-level1"
                                        placeholder="State or Province"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="input-component">
                                <div class="flex justify-between">
                                    <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal
                                        code<span class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="postal-code-error">Not
                                        a valid postal code</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="postal-code" id="postal-code" required
                                        autocomplete="postal-code" placeholder="Postal Code" pattern="^\d{4}$"
                                        title="Please enter a valid postal code"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-2 input-component">
                                <div class="flex justify-between">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="phone-error">Not a
                                        valid phone number</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="tel" name="phone" id="phone" required
                                        pattern="^\+?[0-9]{1,15}$" title="Please enter a valid phone number"
                                        autocomplete="tel" placeholder="Enter your phone number"
                                        oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(\..*)\./g, '$1');"
                                        inputmode="tel"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                    <div
                                        class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10" x-data="{ sameAsBilling: true }">
                            <h2 class="text-lg font-medium text-gray-900">Shipping Address</h2>
                            <div class="flex flex-wrap gap-10 mt-4">
                                <div class="flex items-center">
                                    <input id="same-as-billing" type="radio" name="address-same-as-billing"
                                        value="true" x-model="sameAsBilling" checked
                                        class="w-4 h-4 text-accent-600 focus:ring-accent-500">
                                    <label for="same-as-billing" class="block ml-3 text-sm font-medium text-gray-700">
                                        Same as billing address
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="different-shipping-address" type="radio" name="address-same-as-billing"
                                        value="false" x-model="sameAsBilling"
                                        class="w-4 h-4 text-accent-600 focus:ring-accent-500">
                                    <label for="different-shipping-address"
                                        class="block ml-3 text-sm font-medium text-gray-700">
                                        Different shipping address
                                    </label>
                                </div>
                            </div>

                            <div x-show="sameAsBilling === 'false'"
                                class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div class="sm:col-span-2 input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-address"
                                            class="block text-sm font-medium text-gray-700">Address<span
                                                class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-address-error">Not a valid address</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-address" id="shipping-address"
                                            :required="sameAsBilling === 'false'" autocomplete="street-address"
                                            placeholder="Enter your shipping address" title="Please enter a valid address"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <div
                                            class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-2 input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-apartment"
                                            class="block text-sm font-medium text-gray-700">Apartment, suite, etc.</label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-apartment-error"> Not a valid apartment, suite, etc.</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-apartment" id="shipping-apartment"
                                            placeholder="Apartment, suite, etc. (optional)"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <div
                                            class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-city"
                                            class="block text-sm font-medium text-gray-700">City<span
                                                class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-city-error">Not a valid city</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-city" id="shipping-city"
                                            :required="sameAsBilling === 'false'" autocomplete="address-level2"
                                            placeholder="City" title="Please enter a valid city"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <div
                                            class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-country"
                                            class="block text-sm font-medium text-gray-700">Country</label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-country-error">Not a valid country</p>
                                    </div>
                                    <div class="mt-1">
                                        <select id="shipping-country" name="shipping-country" autocomplete="country-name"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                            <option>Switzerland</option>
                                            <option>Canada</option>
                                            <option>Mexico</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-region" class="block text-sm font-medium text-gray-700">State
                                            /
                                            Province</label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-region-error">Not a
                                            valid state or province</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-region" id="shipping-region"
                                            autocomplete="address-level1" placeholder="State / Province"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <div
                                            class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-postal-code"
                                            class="block text-sm font-medium text-gray-700">Postal
                                            code<span class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-postal-code-error">
                                            Not
                                            a valid postal code</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-postal-code" id="shipping-postal-code"
                                            :required="sameAsBilling === 'false'" autocomplete="postal-code"
                                            placeholder="Postal Code" pattern="^\d{4}$"
                                            title="Please enter a valid postal code"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <div
                                            class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-2 input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-phone"
                                            class="block text-sm font-medium text-gray-700">Phone<span
                                                class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-phone-error">Not a
                                            valid phone number</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="tel" name="shipping-phone" id="shipping-phone"
                                            :required="sameAsBilling === 'false'" pattern="^\+?[0-9]{1,15}$"
                                            title="Please enter a valid phone number" autocomplete="tel"
                                            placeholder="Enter your phone number"
                                            oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(\..*)\./g, '$1');"
                                            inputmode="tel"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <div
                                            class="absolute inset-y-0 right-0 items-center hidden pr-3 pointer-events-none input-error-icon">
                                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="pt-10 mt-10 border-t border-gray-200" x-data="{ deliveryMethod: 'Standard' }">
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900">Delivery method</legend>

                            <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <label
                                    class="relative flex p-4 bg-white border rounded-lg shadow-sm cursor-pointer focus:outline-none"
                                    :class="{ 'border-accent-500 ring-2 ring-accent-500': deliveryMethod === 'Standard' }"
                                    @click="deliveryMethod = 'Standard'">
                                    <input id="delivery-method-standard" type="radio" name="delivery-method"
                                        value="Standard" class="sr-only" checked x-model="deliveryMethod">
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
                                    <input id="delivery-method-express" type="radio" name="delivery-method"
                                        value="Express" class="sr-only" x-model="deliveryMethod">
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

                        <script>
                            function updateShippingCost() {
                                let deliveryMethod = document.querySelector('input[name="delivery-method"]:checked').value;
                                let deliveryCost = 0;
                                if (deliveryMethod === 'Standard') {
                                    deliveryCost = 5.00;
                                } else if (deliveryMethod === 'Express') {
                                    deliveryCost = 16.00;
                                }

                                document.getElementById('shipping').textContent = `${deliveryCost.toFixed(2)}`;
                            }
                            document.addEventListener('DOMContentLoaded', function() {
                                updateShippingCost();
                            });

                            document.getElementById('delivery-method-express').addEventListener('click', updateShippingCost);
                            document.getElementById('delivery-method-standard').addEventListener('click', updateShippingCost);
                        </script>
                    </div> --}}

                    <div class="pt-10 mt-10 border-t border-gray-200" x-data="{ comment: '', commentLength: 0 }">
                        <h2 class="text-lg font-medium text-gray-900">Comments</h2>
                        <div class="mt-4 input-component">
                            <div class="flex justify-between px-1">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Add a comment
                                    (optional)</label>
                                <p class="text-sm text-gray-600" x-text="`${commentLength} / 512 characters`"></p>
                            </div>
                            <textarea id="comment" name="comment" rows="4" maxlength="512" x-model="comment"
                                x-on:input="commentLength = comment.length"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input"
                                placeholder="Type your comment here..."></textarea>

                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul id="cart-items" role="list" class="divide-y divide-gray-200">
                            @foreach ($cartItems['items'] as $item)
                                <li id="cart-item-{{ $item['index'] }}" class="flex px-4 py-6 sm:px-6">
                                    <div class="flex flex-col items-end justify-between flex-shrink-0 gap-4">
                                        <a href="{{ route('product', ['id' => asset('storage/' . $item['product']->images[0])]) }}"
                                            class="group">
                                            <img src="{{ asset('storage/' . $item['product']->images[0]) }}"
                                                alt="{{ $item['product']->name }}"
                                                class="w-20 transition duration-300 ease-in-out transform rounded-md group-hover:scale-110">
                                        </a>

                                        @if (!empty($item['files']))
                                            <div class="relative">
                                                <a href="{{ asset('storage/' . head($item['files'])['href']) }}"
                                                    data-fslightbox="gallery-{{ $item['index'] }}" class="group">
                                                    <img src="{{ asset('storage/' . head($item['files'])['href']) }}"
                                                        alt="First Additional Image"
                                                        class="object-cover w-16 transition duration-300 ease-in-out transform rounded-md aspect-square group-hover:scale-110">
                                                    @foreach (array_slice($item['files'], 1) as $file)
                                                        <a href="{{ $file['href'] }}"
                                                            data-fslightbox="gallery-{{ $item['index'] }}"
                                                            aria-hidden="true"></a>
                                                    @endforeach
                                                </a>
                                                <div
                                                    class="absolute -top-2 -right-2 inline-block text-white bg-green-500 leading-[0] text-xs rounded-full">
                                                    <span class="inline-block py-[50%] mx-1.5">
                                                        {{ count($item['files']) }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex flex-col flex-1 ml-6">
                                        <div class="flex">
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-sm">
                                                    <a href="{{ route('product', ['id' => $item['product']->id]) }}"
                                                        class="font-medium text-gray-700 transition-all ease-in-out duration-250 hover:text-gray-800 hover:font-semibold">{{ $item['product']->name }}</a>
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $item['product']->short_description }}
                                                <ul class="mt-2 text-sm text-gray-500 list-disc list-inside">
                                                    @if ($item['selects'])
                                                        @foreach ($item['selects'] as $selectValue)
                                                            <li>{{ $selectValue }}</li>
                                                        @endforeach
                                                    @endif

                                                    @if ($item['checkbox'])
                                                        @foreach ($item['checkbox'] as $checkboxTitle => $checkboxValues)
                                                            @if (in_array(true, $checkboxValues, true))
                                                                <li>{{ $checkboxTitle }}</li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>

                                            <div class="flex-shrink-0 flow-root ml-4">
                                                <button type="button" data-product-id="{{ $item['index'] }}"
                                                    class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-gray-500"
                                                    onclick="
                                                        axios.post('/cart/remove/' + {{ $item['index'] }})
                                                            .then(response => {
                                                                const itemElement = document.getElementById('cart-item-' + {{ $item['index'] }});
                                                                if (itemElement) { itemElement.remove(); }

                                                                let subtotal = response.data.cartItems.subtotal;
                                                                document.getElementById('subtotal').textContent = `${subtotal.toFixed(2)}`;
                                                                window.updateCartCount();
                                                            })
                                                            .catch(error => {
                                                                alert('Failed to remove product!');
                                                                console.error('Error:', error);
                                                            });
                                                        ">
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
                                            <p class="pb-2 mt-1 text-sm font-medium text-gray-900">
                                                {{ number_format($item['totalPrice'], 2) }} CHF</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <dl class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Subtotal</dt>
                                <dd class="text-sm font-medium text-gray-900"><span
                                        id="subtotal">{{ number_format($cartItems['subtotal'], 2) }}</span> CHF</dd>
                            </div>
                            {{-- <div class="flex items-center justify-between">
                                <dt class="text-sm">Shipping</dt>
                                <dd class="text-sm font-medium text-gray-900"><span id="shipping">0</span> CHF</dd>
                            </div> --}}
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Taxes</dt>
                                <dd class="text-sm font-medium text-gray-900"><span id="taxes">0</span> CHF</dd>
                            </div>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                <dt class="text-base font-medium">Total</dt>
                                <dd class="text-base font-medium text-gray-900"><span id="total">0</span> CHF</dd>
                            </div>
                        </dl>

                        <!-- Payment -->
                        <div class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                            <fieldset class="mt-4" x-data="{ paymentType: 'card' }">
                                <legend class="sr-only">Payment type</legend>
                                <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                    <div class="flex items-center">
                                        <input id="card" name="payment_type" type="radio" value="card"
                                            x-model="paymentType" checked
                                            class="w-4 h-4 border-gray-300 text-accent-600 focus:ring-accent-500">
                                        <label for="card" class="block ml-3 text-sm font-medium text-gray-700">Credit
                                            card /
                                            TWINT</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="bank_transfer" name="payment_type" type="radio"
                                            value="bank_transfer" x-model="paymentType"
                                            class="w-4 h-4 border-gray-300 text-accent-600 focus:ring-accent-500">
                                        <label for="bank_transfer"
                                            class="block ml-3 text-sm font-medium text-gray-700">Bank transfer/advanced
                                            payment</label>
                                    </div>
                                </div>
                                <p x-show="paymentType === 'bank_transfer'" class="mt-2 text-sm text-gray-500">
                                    Transfer directly to our bank account. Please use your order number as the reference.
                                    Your order will be processed only after the funds have been received in our account. You
                                    will receive our bank details upon confirming your order.
                                </p>
                            </fieldset>
                        </div>
                        <div class="px-4 py-6 border-t border-gray-200 sm:px-6">
                            <button
                                class="w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm btn-zahls-modal bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 focus:ring-offset-gray-50">Confirm
                                order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<script>
    const submitForm = async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);
        const csrfToken = formData.get('_token');
        const paymentType = formData.get('payment_type');

        const apiEndpoint = '{{ route('cart.payment.bank_transfer') }}'

        try {
            const response = await fetch(apiEndpoint, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.error || 'An error occurred while processing your request.');
            }

            const data = await response.json();


            if (paymentType === 'bank_transfer') {
                window.location.href = '{{ route('payment-success') }}';
            } else if (data.paymentUrl) {
                window.location.href = data.paymentUrl;
            } else {
                throw new Error('Payment URL not found in the response.');
            }
        } catch (error) {
            console.error('Error:', error);
            window.location.href = '{{ route('payment-failed') }}';
        }
    };

    const updateTotal = () => {
        const subtotal = parseFloat(document.getElementById('subtotal').textContent);
        const taxes = parseFloat(document.getElementById('taxes').textContent);
        const total = subtotal + taxes;
        document.getElementById('total').textContent = total.toFixed(2);
    };

    document.addEventListener('DOMContentLoaded', updateTotal);
</script>
<style>
    .custom-input:user-invalid {
        border-color: red;
        padding-right: 2.5rem;
    }

    .custom-input:user-invalid:focus {
        border-color: red;
        box-shadow: 0 0 0 1px red;
    }

    .custom-input:user-invalid~.input-error-icon {
        display: flex;
    }

    .input-component:has(.custom-input:user-invalid) .input-error-message {
        display: block;
    }
</style>
