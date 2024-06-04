@extends('layouts.app')
@section('content')
    <div class="bg-gray-50">
        <div class="max-w-2xl px-4 pt-16 pb-24 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Kasse</h2>

            <form onsubmit="submitForm(event)" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                @csrf
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Kontaktinformationen</h2>

                        <div class="mt-4 input-component">
                            <div class="flex justify-between">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">E-Mail-Adresse<span
                                        class="pl-1 text-red-600">*</span></label>
                                <p class="hidden text-sm text-red-600 input-error-message" id="email-error">Keine gültige E-Mail-Adresse</p>
                            </div>
                            <div class="relative mt-1">
                                <input type="email" id="email-address" name="email-address" required
                                    title="Bitte geben Sie eine gültige E-Mail-Adresse ein" autocomplete="email"
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
                        <h2 class="text-lg font-medium text-gray-900">Informationen zur Abrechnung</h2>

                        <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div class="input-component">
                                <div class="flex justify-between">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Vorname<span class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message">Kein gültiger Vorname</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" id="first-name" name="first-name" required
                                        autocomplete="given-name" placeholder="John" title="Bitte geben Sie einen gültigen Vornamen ein"
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
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Nachname<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="last-name-error">Kein gültiger Nachname</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" id="last-name" name="last-name" required
                                        autocomplete="family-name" placeholder="Doe" title="Bitte geben Sie einen gültigen Nachnamen ein"
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
                                    <label for="company" class="block text-sm font-medium text-gray-700">Firmenname</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="company-error">Kein gültiger Firmenname</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="company" id="company" placeholder="Ihre Firma Inc."
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
                                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="address-error">Keine gültige Adresse</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="address" id="address" required
                                        autocomplete="street-address" placeholder="1234 Hauptstraße"
                                        title="Bitte geben Sie eine gültige Adresse ein"
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
                                    <label for="apartment" class="block text-sm font-medium text-gray-700">Wohnung, Suite usw.</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="apartment-error">Keine gültige Wohnung, Suite usw.</p>
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
                                    <label for="city" class="block text-sm font-medium text-gray-700">Stadt<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="city-error">Keine gültige Stadt</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="city" id="city" required
                                        autocomplete="address-level2" placeholder="Irgendstadt"
                                        title="Bitte geben Sie eine gültige Stadt ein"
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
                                    <label for="country" class="block text-sm font-medium text-gray-700">Land</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="country-error">Kein gültiges Land</p>
                                </div>
                                <div class="mt-1">
                                    <select id="country" name="country" autocomplete="country-name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                        <option>Schweiz</option>
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
                                    <label for="region" class="block text-sm font-medium text-gray-700">Bundesland /
                                        Provinz</label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="region-error">Kein gültiges Bundesland oder Provinz</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="region" id="region" autocomplete="address-level1"
                                        placeholder="Bundesland oder Provinz"
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
                                    <label for="postal-code" class="block text-sm font-medium text-gray-700">Postleitzahl<span class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="postal-code-error">Keine gültige Postleitzahl</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="text" name="postal-code" id="postal-code" required
                                        autocomplete="postal-code" placeholder="Postleitzahl" pattern="^\d{4}$"
                                        title="Bitte geben Sie eine gültige Postleitzahl ein"
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
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefon<span
                                            class="pl-1 text-red-600">*</span></label>
                                    <p class="hidden text-sm text-red-600 input-error-message" id="phone-error">Keine gültige Telefonnummer</p>
                                </div>
                                <div class="relative mt-1">
                                    <input type="tel" name="phone" id="phone" required
                                        pattern="^\+?[0-9]{1,15}$" title="Bitte geben Sie eine gültige Telefonnummer ein"
                                        autocomplete="tel" placeholder="Geben Sie Ihre Telefonnummer ein"
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
                            <h2 class="text-lg font-medium text-gray-900">Lieferadresse</h2>
                            <div class="flex flex-wrap gap-10 mt-4">
                                <div class="flex items-center">
                                    <input id="same-as-billing" type="radio" name="address-same-as-billing"
                                        value="true" x-model="sameAsBilling" checked
                                        class="w-4 h-4 text-accent-600 focus:ring-accent-500">
                                    <label for="same-as-billing" class="block ml-3 text-sm font-medium text-gray-700">
                                        Gleiche wie Rechnungsadresse
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="different-shipping-address" type="radio" name="address-same-as-billing"
                                        value="false" x-model="sameAsBilling"
                                        class="w-4 h-4 text-accent-600 focus:ring-accent-500">
                                    <label for="different-shipping-address"
                                        class="block ml-3 text-sm font-medium text-gray-700">
                                        Verschiedene Lieferadresse
                                    </label>
                                </div>
                            </div>

                            <div x-show="sameAsBilling === 'false'"
                                class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div class="sm:col-span-2 input-component">
                                    <div class="flex justify-between">
                                        <label for="shipping-address"
                                            class="block text-sm font-medium text-gray-700">Adresse<span
                                                class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-address-error">Keine gültige Adresse</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-address" id="shipping-address"
                                            :required="sameAsBilling === 'false'" autocomplete="street-address"
                                            placeholder="Geben Sie Ihre Lieferadresse ein" title="Bitte geben Sie eine gültige Adresse ein"
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
                                            class="block text-sm font-medium text-gray-700">Wohnung, Suite, etc.</label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-apartment-error"> Keine gültige Wohnung, Suite, etc.</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-apartment" id="shipping-apartment"
                                            placeholder="Wohnung, Suite, etc. (optional)"
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
                                            class="block text-sm font-medium text-gray-700">Stadt<span
                                                class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-city-error">Keine gültige Stadt</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-city" id="shipping-city"
                                            :required="sameAsBilling === 'false'" autocomplete="address-level2"
                                            placeholder="Stadt" title="Bitte geben Sie eine gültige Stadt ein"
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
                                            class="block text-sm font-medium text-gray-700">Land</label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-country-error">Kein gültiges Land</p>
                                    </div>
                                    <div class="mt-1">
                                        <select id="shipping-country" name="shipping-country" autocomplete="country-name"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input">
                                            <option>Schweiz</option>
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
                                        <label for="shipping-region" class="block text-sm font-medium text-gray-700">Bundesland
                                            /
                                            Provinz</label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-region-error">Kein gültiges Bundesland oder Provinz</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-region" id="shipping-region"
                                            autocomplete="address-level1" placeholder="Bundesland / Provinz"
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
                                            class="block text-sm font-medium text-gray-700">Postleitzahl
                                            <span class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-postal-code-error">
                                            Keine gültige Postleitzahl</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="text" name="shipping-postal-code" id="shipping-postal-code"
                                            :required="sameAsBilling === 'false'" autocomplete="postal-code"
                                            placeholder="Postleitzahl" pattern="^\d{4}$"
                                            title="Bitte geben Sie eine gültige Postleitzahl ein"
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
                                            class="block text-sm font-medium text-gray-700">Telefon<span
                                                class="pl-1 text-red-600">*</span></label>
                                        <p class="hidden text-sm text-red-600 input-error-message"
                                            id="shipping-phone-error">Keine gültige Telefonnummer</p>
                                    </div>
                                    <div class="relative mt-1">
                                        <input type="tel" name="shipping-phone" id="shipping-phone"
                                            :required="sameAsBilling === 'false'" pattern="^\+?[0-9]{1,15}$"
                                            title="Bitte geben Sie eine gültige Telefonnummer ein" autocomplete="tel"
                                            placeholder="Geben Sie Ihre Telefonnummer ein"
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
                        <h2 class="text-lg font-medium text-gray-900">Kommentare</h2>
                        <div class="mt-4 input-component">
                            <div class="flex justify-between px-1">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Ein Kommentar hinzufügen
                                    (optional)</label>
                                <p class="text-sm text-gray-600" x-text="`${commentLength} / 512 Zeichen`"></p>
                            </div>
                            <textarea id="comment" name="comment" rows="4" maxlength="512" x-model="comment"
                                x-on:input="commentLength = comment.length"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500 sm:text-sm custom-input"
                                placeholder="Geben Sie Ihren Kommentar hier ein..."></textarea>

                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">Bestellübersicht</h2>

                    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <h3 class="sr-only">Artikel in Ihrem Warenkorb</h3>
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
                                                        alt="Erstes Zusätzliches Bild"
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
                                                                alert('Produkt nicht entfernt!');
                                                                console.error('Error:', error);
                                                            });
                                                        ">
                                                    <span class="sr-only">Entfernen</span>
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
                                <dt class="text-sm">Zwischensumme</dt>
                                <dd class="text-sm font-medium text-gray-900"><span
                                        id="subtotal">{{ number_format($cartItems['subtotal'], 2) }}</span> CHF</dd>
                            </div>
                            {{-- <div class="flex items-center justify-between">
                                <dt class="text-sm">Versand</dt>
                                <dd class="text-sm font-medium text-gray-900"><span id="shipping">0</span> CHF</dd>
                            </div> --}}
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Steuern</dt>
                                <dd class="text-sm font-medium text-gray-900"><span id="taxes">0</span> CHF</dd>
                            </div>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                <dt class="text-base font-medium">Gesamt</dt>
                                <dd class="text-base font-medium text-gray-900"><span id="total">0</span> CHF</dd>
                            </div>
                        </dl>

                        <!-- Payment -->
                        <div class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900">Zahlung</h2>

                            <fieldset class="mt-4" x-data="{ paymentType: 'card' }">
                                <legend class="sr-only">Zahlungsart</legend>
                                <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                    <div class="flex items-center">
                                        <input id="card" name="payment_type" type="radio" value="card"
                                            x-model="paymentType" checked
                                            class="w-4 h-4 border-gray-300 text-accent-600 focus:ring-accent-500">
                                        <label for="card" class="block ml-3 text-sm font-medium text-gray-700">Kreditkarte /
                                            TWINT</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="bank_transfer" name="payment_type" type="radio"
                                            value="bank_transfer" x-model="paymentType"
                                            class="w-4 h-4 border-gray-300 text-accent-600 focus:ring-accent-500">
                                        <label for="bank_transfer"
                                            class="block ml-3 text-sm font-medium text-gray-700">Banküberweisung/Vorauszahlung</label>
                                    </div>
                                </div>
                                <p x-show="paymentType === 'bank_transfer'" class="mt-2 text-sm text-gray-500">
                                    Überweisen Sie direkt auf unser Bankkonto.<br>
                                    Bitte verwenden Sie Ihre Bestellnummer als Referenz.<br>
                                    Sie erhalten <span class="font-semibold">Ihre Referenznummer</span> in Ihrer Bestätigungsemail.<br>
                                    Ihre Bestellung wird erst nach Eingang der Gelder auf unserem Konto bearbeitet.<br>
                                    IBAN: <span class="font-semibold">{{ env('BANK_IBAN') }}</span>
                                </p>
                            </fieldset>
                        </div>
                        <div class="px-4 py-6 border-t border-gray-200 sm:px-6">
                            <button type="submit"
                                class="w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm btn-zahls-modal bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 focus:ring-offset-gray-50">Bestellung bestätigen</button>
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
        const submitButton = event.target.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        const buttonText = submitButton.textContent;
        submitButton.textContent = 'Processing...';

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
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = buttonText;
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
