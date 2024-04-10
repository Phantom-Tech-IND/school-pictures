@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => $product->product_type,
        'image' => $product->photo,
    ])

    <!--
                                                                      This example requires some changes to your config:
                                                                      
                                                                      ```
                                                                      // tailwind.config.js
                                                                      module.exports = {
                                                                        // ...
                                                                        plugins: [
                                                                          // ...
                                                                          require('@tailwindcss/aspect-ratio'),
                                                                        ],
                                                                      }
                                                                      ```
                                                                    -->
    <div class="bg-white">
        <div class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
            <!-- Product details -->
            <div class="lg:max-w-lg lg:self-end">
                {{-- <nav aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-2">
                        <li>
                            <div class="flex items-center text-sm">
                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Travel</a>
                                <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                    class="flex-shrink-0 w-5 h-5 ml-2 text-gray-300">
                                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                </svg>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center text-sm">
                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Bags</a>
                            </div>
                        </li>
                    </ol>
                </nav> --}}

                <div class="mt-4">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $product->product_type }}</h1>
                </div>

                <section aria-labelledby="information-heading" class="mt-4">
                    <h2 id="information-heading" class="sr-only">Product information</h2>

                    <div class="flex items-center">
                        <p class="text-lg text-gray-900 sm:text-xl">CHF {{ $product->price }}</p>


                    </div>

                    <div class="mt-4 space-y-6">
                        <p class="text-base text-gray-500">{{ $product->description }}</p>
                    </div>

                    <div class="flex items-center mt-6">
                        {{-- <svg class="flex-shrink-0 w-5 h-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd" />
                        </svg> --}}
                        {{-- <p class="ml-2 text-sm text-gray-500">In stock and ready to ship</p> --}}
                    </div>
                </section>
            </div>

            <!-- Product image -->
            <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">
                <div class="overflow-hidden rounded-lg aspect-h-1 aspect-w-1">
                    <img src="{{ $product->photo }}" alt="{{ $product->product_type }}"
                        class="object-cover object-center w-full h-full">
                </div>
            </div>

            <!-- Product form -->
            <div class="mt-10 lg:col-start-1 lg:row-start-2 lg:max-w-lg lg:self-start">
                <section aria-labelledby="options-heading">
                    <h2 id="options-heading" class="sr-only">Product options</h2>

                    <form>
                        <div class="sm:flex sm:justify-between">
                            <!-- Size selector -->
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700">Size</legend>
                                <div class="grid grid-cols-1 gap-4 mt-1 sm:grid-cols-2">
                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                    <div
                                        class="relative block p-4 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                                        <input type="radio" name="size-choice" value="18L" class="sr-only"
                                            aria-labelledby="size-choice-0-label"
                                            aria-describedby="size-choice-0-description">
                                        <p id="size-choice-0-label" class="text-base font-medium text-gray-900">18L</p>
                                        <p id="size-choice-0-description" class="mt-1 text-sm text-gray-500">Perfect for a
                                            reasonable amount of snacks.</p>
                                        <!--
                                                                                        Active: "border", Not Active: "border-2"
                                                                                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                      -->
                                        <div class="absolute border-2 rounded-lg pointer-events-none -inset-px"
                                            aria-hidden="true"></div>
                                    </div>
                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                    <div
                                        class="relative block p-4 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                                        <input type="radio" name="size-choice" value="20L" class="sr-only"
                                            aria-labelledby="size-choice-1-label"
                                            aria-describedby="size-choice-1-description">
                                        <p id="size-choice-1-label" class="text-base font-medium text-gray-900">20L</p>
                                        <p id="size-choice-1-description" class="mt-1 text-sm text-gray-500">Enough room
                                            for a serious amount of snacks.</p>
                                        <!--
                                                                                        Active: "border", Not Active: "border-2"
                                                                                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                      -->
                                        <div class="absolute border-2 rounded-lg pointer-events-none -inset-px"
                                            aria-hidden="true"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="mt-4">
                            <a href="" class="inline-flex text-sm text-gray-500 group hover:text-gray-700">
                                <span>What size should I buy?</span>
                                <svg class="flex-shrink-0 w-5 h-5 ml-2 text-gray-400 group-hover:text-gray-500"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                        <div class="mt-10">
                            <button type="submit"
                                class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white border border-transparent rounded-md bg-accent hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-gray-50">Add
                                to bag</button>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="" class="inline-flex text-base font-medium group">
                                <svg class="flex-shrink-0 w-6 h-6 mr-2 text-gray-400 group-hover:text-gray-500"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                                <span class="text-gray-500 hover:text-gray-700">Lifetime Guarantee</span>
                            </a>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
