@extends('layouts.app')

@section('content')
    <div class="px-4 py-5 mt-12">
        <div class="container max-w-6xl pt-10 mx-auto text-center" x-data="{ tab: '{{ $tabs[0]['id'] }}' }">
            <h1 class="text-2xl font-bold leading-tight text-gray-900 sm:text-3xl">
                HÄUFIG GESTELLTE FRAGEN (FAQ)
            </h1>
            <div
                class="flex flex-col items-center justify-center max-w-4xl mx-auto mt-6 space-x-0 space-y-4 lg:flex-row lg:space-x-4 lg:space-y-0">
                @foreach ($tabs as $tab)
                    <button @click="tab = '{{ $tab['id'] }}'" :class="{ 'bg-accent-700': tab === '{{ $tab['id'] }}' }"
                        class="w-auto px-4 py-2 text-sm text-gray-100 rounded-full bg-accent sm:text-base lg:text-lg tab-button">{{ $tab['name'] }}</button>
                @endforeach
            </div>
            @foreach ($tabs as $tabIndex => $tab)
                <div x-show="tab === '{{ $tab['id'] }}'" class="faq-content" x-data="{ openAccordion: null }">
                    <section class="px-0 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        @foreach ($tab['questions'] as $index => $question)
                            <div @click="openAccordion = openAccordion === {{ $index }} ? null : {{ $index }}"
                                :class="{
                                    'bg-green-50 border-accent': openAccordion === {{ $index }},
                                    'border-gray-300': openAccordion !== {{ $index }}
                                }"
                                class="p-4 mb-8 transition duration-500 border-2 cursor-pointer rounded-xl"
                                id="accordion-{{ $index }}">
                                <div class="flex items-center justify-between"
                                    :class="{ 'text-green-700': openAccordion === {{ $index }} }">
                                    <h2 class="text-base font-semibold text-left text-gray-900 sm:text-lg md:text-lg">
                                        {{ $question['title'] }}</h2>
                                    <svg :class="{ 'rotate-180': openAccordion === {{ $index }} }"
                                        class="w-6 h-6 transition duration-500 transform" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div x-show="openAccordion === {{ $index }}" x-collapse
                                    id="content-{{ $index }}">
                                    <p class="pt-4 text-base text-left text-gray-700 sm:text-lg">
                                        {!! nl2br(e($question['answer'])) !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            @endforeach
        </div>
    </div>
@endsection
