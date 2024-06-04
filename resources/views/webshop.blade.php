@extends('layouts.app')
@section('content')
    <div class="bg-white" x-data="{ isOpen: false }">
        <div>
            <div class="relative z-50 lg:hidden" x-cloak role="dialog" aria-modal="true" x-show="isOpen">
                <div class="fixed inset-0 bg-black bg-opacity-25"></div>
                <div class="fixed inset-0 z-40 flex">
                    <div @click.away="isOpen = false"
                        class="relative flex flex-col w-full h-full max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900">Filter</h2>
                            <button @click="isOpen = false" type="button"
                                class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 bg-white rounded-md">
                                <span class="sr-only">Menü schließen</span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Kategorien</h3>
                            <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                                <!-- Show All button -->
                                <li>
                                    <a href="{{ route('webshop') }}"
                                        class="block px-2 py-3 capitalize text-lg transition-all duration-300 ease-in-out transform hover:text-accent-800 origin-left hover:scale-110 hover:font-semibold {{ is_null($selectedCategory) ? 'text-accent-600' : '' }}">Alle anzeigen</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('webshop', ['slug' => $category->slug]) }}"
                                            class="block px-2 py-3 capitalize text-lg transition-all duration-300 ease-in-out transform hover:text-accent-800 origin-left hover:scale-110 hover:font-semibold {{ optional($selectedCategory)->id === $category->id ? 'text-accent-600' : '' }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-wrap items-baseline justify-between pt-24 pb-6 border-b border-gray-200">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Unsere Produkte</h1>
                    <form action="{{ route('webshop') }}" method="GET" class="flex items-center my-4 ">
                        <input type="text" name="search" placeholder="Produkte suchen..."
                            class="block w-full py-2 text-gray-900 border-0 shadow-sm rounded-l-md pr-14 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-accent-600 sm:text-sm sm:leading-6">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-accent rounded-r-md hover:bg-accent-dark">Suchen</button>
                    </form>
                    <div class="flex items-center lg:hidden">
                        <button type="button" x-on:click="isOpen = true"
                            class="p-2 ml-4 -m-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                            <span class="sr-only">Kategorien</span>
                            <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <section aria-labelledby="products-heading" class="pt-6 pb-24">
                    <h2 id="products-heading" class="sr-only">Produkte</h2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <!-- Filter -->
                        <form class="hidden lg:block">
                            <h3 class="sr-only">Kategorien</h3>
                            <ul role="list"
                                class="pb-6 space-y-4 text-sm font-medium text-gray-900 border-b border-gray-200">
                                <!-- Show All button -->
                                <li>
                                    <a href="{{ route('webshop') }}"
                                        class="block px-2 py-3 capitalize hover:text-accent-800 text-lg transition-all duration-300 ease-in-out transform origin-left hover:scale-110 hover:font-semibold {{ is_null($selectedCategory) ? 'text-accent-600' : '' }}">Alle anzeigen</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('webshop', ['slug' => $category->slug]) }}"
                                            class="block px-2 py-3 capitalize hover:text-accent-800 text-lg transition-all duration-300 ease-in-out transform origin-left hover:scale-110 hover:font-semibold {{ optional($selectedCategory)->id === $category->id ? 'text-accent-600' : '' }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </form>
                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <div class="max-w-2xl px-4 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
                                <h2 class="text-xl font-bold text-gray-900">Produktliste</h2>
                                <div
                                    class="grid grid-cols-1 mt-8 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                                    @foreach ($products as $product)
                                        <div>

                                            <div class="relative">
                                                <a href="{{ route('product', ['id' => $product->id]) }}"
                                                    class="relative block overflow-hidden rounded-lg h-72 group">
                                                        <img src="{{ $product->images && count($product->images) > 0 ? asset('storage/' . $product->images[0]) : asset('images/no-image.jpg') }}"
                                                            alt="{{ $product->type }}"
                                                            class="object-contain object-center w-full h-full transition duration-300 ease-in-out bg-[#726765] group-hover:opacity-75">
                                                        <div
                                                            class="absolute inset-0 flex items-center justify-center transition duration-300 ease-in-out bg-black bg-opacity-0 group-hover:bg-opacity-50">
                                                            <span
                                                                class="text-lg text-white opacity-0 group-hover:opacity-100">Produkt ansehen</span>
                                                        </div>

                                                </a>
                                                <div class="flex items-baseline justify-between mx-2 mt-4">
                                                    <h3 class="font-medium text-gray-900 truncate ">
                                                        {{ $product->name }}
                                                    </h3>
                                                    <h5 class="font-light text-gray-900 whitespace-nowrap">{{ $product->price }} CHF</h5>
                                                </div>
                                                <div class="px-2">
                                                    <p class="h-[3.75rem] text-sm text-gray-800 break-words line-clamp-3">
                                                        {{ $product->short_description }}
                                                    </p>
                                                </div>

                                            </div>

                                        </div>
                                    @endforeach
                                    <!-- More products... -->
                                </div>
                            </div>
                            {{ $products->links() }}
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
@endsection
