@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <div class="max-w-2xl px-4 pt-16 pb-24 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>
            <form class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
                <section aria-labelledby="cart-heading" class="lg:col-span-7">
                    <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                    <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                        @foreach ($cartItems['items'] as $item)
                            <li class="flex py-6 sm:py-10">
                                <div class="flex-shrink-0">
                                    <img src="{{ $item['product']->images[0] }}" alt="{{ $item['product']->name }}"
                                        class="object-cover object-center w-24 h-24 rounded-md sm:h-48 sm:w-48">
                                </div>
                                <div class="flex flex-col justify-between flex-1 ml-4 sm:ml-6">
                                    <div>
                                        <h3 class="text-sm">
                                            <a href="#"
                                                class="font-medium text-gray-700 hover:text-gray-800">{{ $item['product']->name }}</a>
                                        </h3>
                                        <p class="mt-1 text-sm font-medium text-gray-900">
                                            ${{ number_format($item['product']->price, 2) }}</p>
                                    </div>
                                    <div>
                                        <label for="quantity-{{ $loop->index }}" class="sr-only">Quantity</label>
                                        <select id="quantity-{{ $loop->index }}" name="quantity-{{ $loop->index }}"
                                            class="max-w-full rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-accent-500 focus:outline-none focus:ring-1 focus:ring-accent-500 sm:text-sm">
                                            @for ($i = 1; $i <= 20; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $item['quantity'] == $i ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>

                <!-- Order summary -->
                <section aria-labelledby="summary-heading"
                    class="px-4 py-6 mt-16 rounded-lg bg-gray-50 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm text-gray-600">Subtotal</dt>
                            <dd class="text-sm font-medium text-gray-900">${{ number_format($cartItems['subtotal'], 2) }}
                            </dd>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <dt class="text-base font-medium text-gray-900">Order total</dt>
                            <dd class="text-base font-medium text-gray-900">${{ number_format($cartItems['subtotal'], 2) }}
                            </dd>
                        </div>
                    </dl>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection
