@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => 'Angebote',
        'image' => '/coverbluzz.jpeg',
    ])
    <div class="py-24 bg-white sm:py-32">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-base font-semibold leading-7 text-accent">Pricing</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Pricing
                    of&nbsp;all&nbsp;sizes</p>
            </div>
            <p class="max-w-2xl mx-auto mt-6 text-lg leading-8 text-center text-gray-600">Distinctio et nulla eum soluta et
                neque labore quibusdam. Saepe et quasi iusto modi velit ut non voluptas in. Explicabo id ut laborum.</p>
            <div
                class="grid max-w-md grid-cols-1 mx-auto mt-16 isolate gap-y-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <div
                    class="flex flex-col justify-between p-8 bg-white rounded-3xl ring-1 ring-gray-200 xl:p-10 lg:mt-8 lg:rounded-r-none">
                    <div>
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-freelancer" class="text-lg font-semibold leading-8 text-gray-900">Freelancer</h3>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-600">The essentials to provide your best work for
                            clients.</p>
                        <p class="flex items-baseline mt-6 gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-gray-900">$24</span>
                            <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                5 products
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Up to 1,000 subscribers
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Basic analytics
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                48-hour support response time
                            </li>
                        </ul>
                    </div>
                    <a href="shop" aria-describedby="tier-freelancer"
                        class="block px-3 py-2 mt-8 text-sm font-semibold leading-6 text-center rounded-md text-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300">Purchase
                        now
                    </a>
                </div>
                <div
                    class="flex flex-col justify-between p-8 bg-white rounded-3xl ring-1 ring-gray-200 xl:p-10 lg:z-10 lg:rounded-b-none">
                    <div>
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-startup" class="text-lg font-semibold leading-8 text-accent">Startup</h3>
                            <p class="rounded-full bg-accent/10 px-2.5 py-1 text-xs font-semibold leading-5 text-accent">
                                Most popular</p>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-600">A that scales with your rapidly growing
                            business.</p>
                        <p class="flex items-baseline mt-6 gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-gray-900">$32</span>
                            <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                25 products
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Up to 10,000 subscribers
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Advanced analytics
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                24-hour support response time
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Marketing automations
                            </li>
                        </ul>
                    </div>
                    <a href="shop" aria-describedby="tier-startup"
                        class="block px-3 py-2 mt-8 text-sm font-semibold leading-6 text-center text-white rounded-md shadow-sm bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent hover:bg-accent">Purchase
                        now
                    </a>
                </div>
                <div
                    class="flex flex-col justify-between p-8 bg-white rounded-3xl ring-1 ring-gray-200 xl:p-10 lg:mt-8 lg:rounded-l-none">
                    <div>
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-enterprise" class="text-lg font-semibold leading-8 text-gray-900">Enterprise</h3>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-600">Dedicated support and infrastructure for your
                            company.</p>
                        <p class="flex items-baseline mt-6 gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-gray-900">$48</span>
                            <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Unlimited products
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Unlimited subscribers
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Advanced analytics
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                1-hour, dedicated support response time
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Marketing automations
                            </li>
                        </ul>
                    </div>
                    <a href="shop" aria-describedby="tier-enterprise"
                        class="block px-3 py-2 mt-8 text-sm font-semibold leading-6 text-center rounded-md text-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300">Purchase
                        now
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
