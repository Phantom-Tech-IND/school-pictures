<div class="bg-white">
    <div>

        {{-- <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-black bg-opacity-25"></div>

            <div class="fixed inset-0 z-40 flex">

                <div
                    class="relative flex flex-col w-full h-full max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                        <button type="button"
                            class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 bg-white rounded-md">
                            <span class="sr-only">Close menu</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Filters -->
                    <form class="mt-4 border-t border-gray-200">
                        <h3 class="sr-only">Categories</h3>
                        <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                            <li>
                                <a href="#" class="block px-2 py-3">Totes</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Backpacks</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Travel Bags</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Hip Bags</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Laptop Sleeves</a>
                            </li>
                        </ul>

                        <div class="px-4 py-6 border-t border-gray-200">
                            <h3 class="flow-root -mx-2 -my-3">
                                <button type="button"
                                    class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-mobile-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Color</span>
                                    <span class="flex items-center ml-6">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6" id="filter-section-mobile-0">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-color-0"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">White</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-color-1"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Beige</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox"
                                            checked
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-color-2"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Blue</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-color-3"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Brown</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-color-4"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Green</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-5" name="color[]" value="purple" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-color-5"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Purple</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-6 border-t border-gray-200">
                            <h3 class="flow-root -mx-2 -my-3">
                                <button type="button"
                                    class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-mobile-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Category</span>
                                    <span class="flex items-center ml-6">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6" id="filter-section-mobile-1">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-0" name="category[]" value="new-arrivals"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-category-0"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">New Arrivals</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-1" name="category[]" value="sale"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-category-1"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Sale</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-2" name="category[]" value="travel"
                                            type="checkbox" checked
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-category-2"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Travel</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-3" name="category[]" value="organization"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-category-3"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Organization</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-4" name="category[]" value="accessories"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-category-4"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">Accessories</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-6 border-t border-gray-200">
                            <h3 class="flow-root -mx-2 -my-3">
                                <button type="button"
                                    class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-mobile-2" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Size</span>
                                    <span class="flex items-center ml-6">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6" id="filter-section-mobile-2">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-0" name="size[]" value="2l"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-size-0"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">2L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-1" name="size[]" value="6l"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-size-1"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">6L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-2" name="size[]" value="12l"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-size-2"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">12L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-3" name="size[]" value="18l"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-size-3"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">18L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-4" name="size[]" value="20l"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-size-4"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">20L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-5" name="size[]" value="40l"
                                            type="checkbox" checked
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-mobile-size-5"
                                            class="flex-1 min-w-0 ml-3 text-gray-500">40L</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between pt-24 pb-6 border-b border-gray-200">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>

                <div class="flex items-center">
                    <div class="relative inline-block text-left">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center text-sm font-medium text-gray-700 group hover:text-gray-900"
                                id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Sort
                                <svg class="flex-shrink-0 w-5 h-5 ml-1 -mr-1 text-gray-400 group-hover:text-gray-500"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>


                        {{-- <div class="absolute right-0 z-10 w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">

                                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-1">Best Rating</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-2">Newest</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-3">Price: Low to High</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-4">Price: High to Low</a>
                            </div>
                        </div> --}}
                    </div>

                    <button type="button" class="p-2 ml-5 -m-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                        <span class="sr-only">View grid</span>
                        <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button type="button" class="p-2 ml-4 -m-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <h3 class="sr-only">Categories</h3>
                        <ul role="list"
                            class="pb-6 space-y-4 text-sm font-medium text-gray-900 border-b border-gray-200">
                            <li>
                                <a href="#">Totes</a>
                            </li>
                            <li>
                                <a href="#">Backpacks</a>
                            </li>
                            <li>
                                <a href="#">Travel Bags</a>
                            </li>
                            <li>
                                <a href="#">Hip Bags</a>
                            </li>
                            <li>
                                <a href="#">Laptop Sleeves</a>
                            </li>
                        </ul>

                        <div class="py-6 border-b border-gray-200">
                            <h3 class="flow-root -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Color</span>
                                    <span class="flex items-center ml-6">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-0">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-color-0" name="color[]" value="white" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-color-0" class="ml-3 text-sm text-gray-600">White</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-color-1" name="color[]" value="beige" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-color-1" class="ml-3 text-sm text-gray-600">Beige</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-color-2" name="color[]" value="blue" type="checkbox" checked
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-color-2" class="ml-3 text-sm text-gray-600">Blue</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-color-3" name="color[]" value="brown" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-color-3" class="ml-3 text-sm text-gray-600">Brown</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-color-4" name="color[]" value="green" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-color-4" class="ml-3 text-sm text-gray-600">Green</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-color-5" name="color[]" value="purple" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-color-5" class="ml-3 text-sm text-gray-600">Purple</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-6 border-b border-gray-200">
                            <h3 class="flow-root -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Category</span>
                                    <span class="flex items-center ml-6">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-1">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-category-0" name="category[]" value="new-arrivals"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-category-0" class="ml-3 text-sm text-gray-600">New
                                            Arrivals</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-category-1" name="category[]" value="sale"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-category-1" class="ml-3 text-sm text-gray-600">Sale</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-category-2" name="category[]" value="travel"
                                            type="checkbox" checked
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-category-2"
                                            class="ml-3 text-sm text-gray-600">Travel</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-category-3" name="category[]" value="organization"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-category-3"
                                            class="ml-3 text-sm text-gray-600">Organization</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-category-4" name="category[]" value="accessories"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-category-4"
                                            class="ml-3 text-sm text-gray-600">Accessories</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-6 border-b border-gray-200">
                            <h3 class="flow-root -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-2" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Size</span>
                                    <span class="flex items-center ml-6">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-2">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-size-0" name="size[]" value="2l" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-size-0" class="ml-3 text-sm text-gray-600">2L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-size-1" name="size[]" value="6l" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-size-1" class="ml-3 text-sm text-gray-600">6L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-size-2" name="size[]" value="12l" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-size-2" class="ml-3 text-sm text-gray-600">12L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-size-3" name="size[]" value="18l" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-size-3" class="ml-3 text-sm text-gray-600">18L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-size-4" name="size[]" value="20l" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-size-4" class="ml-3 text-sm text-gray-600">20L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-size-5" name="size[]" value="40l" type="checkbox"
                                            checked
                                            class="w-4 h-4 border-gray-300 rounded text-accent focus:ring-accent">
                                        <label for="filter-size-5" class="ml-3 text-sm text-gray-600">40L</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Product grid -->
                    <div class="lg:col-span-3">
                        <div class="max-w-2xl px-4 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
                            <h2 class="text-xl font-bold text-gray-900">Latest Products</h2>

                            <div
                                class="grid grid-cols-1 mt-8 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                                @foreach ($products as $product)
                                    <div>
                                        <a href="{{ route('product', ['id' => $product->id]) }}">
                                            <div class="relative">
                                                <div class="relative w-full overflow-hidden rounded-lg h-72">
                                                    <img src="{{ $product->photo }}" alt="{{ $product->type }}"
                                                        class="object-cover object-center w-full h-full">
                                                </div>
                                                <div class="relative mt-4">
                                                    <h3 class="text-sm font-medium text-gray-900">
                                                        {{ $product->type }}</h3>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        {{ $product->description }}</p>
                                                </div>
                                                <div
                                                    class="absolute inset-x-0 top-0 flex items-end justify-end p-4 overflow-hidden rounded-lg h-72">
                                                    <div aria-hidden="true"
                                                        class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black">
                                                    </div>
                                                    <p class="relative text-lg font-semibold text-white">
                                                        ${{ $product->price }}</p>
                                                </div>
                                            </div>
                                            <div class="mt-6">
                                                <a href=""
                                                    class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200">Add
                                                    to bag<span class="sr-only">, {{ $product->name }}</span></a>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                <!-- More products... -->
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    </section>
    </main>
</div>
</div>

<script>
    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        const isExpanded = section.getAttribute('aria-expanded') === 'true';
        section.setAttribute('aria-expanded', !isExpanded);
        section.style.display = isExpanded ? 'none' : 'block';
    }
</script>
