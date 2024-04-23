@extends('layouts.app')

@section('content')
    <div class="px-4 py-5 mt-12">
        <div class="container max-w-6xl pt-10 mx-auto text-center">
            <h1 class="mb-4 text-2xl font-semibold leading-tight text-gray-900 sm:text-3xl">
                HÄUFIG GESTELLTE FRAGEN (FAQ)
            </h1>
            <!-- Removed tab buttons here -->
            @foreach ($tabs as $tabIndex => $tab)
                <div class="faq-content">
                    <section class="px-0 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <h2 class="mb-4 text-xl font-semibold text-gray-900">{{ $tab['name'] }}</h2> <!-- Tab name as section title -->
                        @foreach ($tab['questions'] as $index => $question)
                            <div x-data="{ openAccordion: null }" @click="openAccordion = openAccordion === {{ $index }} ? null : {{ $index }}"
                                class="p-4 mb-8 transition duration-500 border-b-2 cursor-pointer hover:bg-green-50 hover:border-accent"
                                :class="{
                                    'bg-green-50 border-accent': openAccordion === {{ $index }},
                                    'border-gray-300': openAccordion !== {{ $index }}
                                }"
                                id="accordion-{{ $tabIndex }}-{{ $index }}">
                                <div class="flex items-center justify-between"
                                    :class="{ 'text-green-700': openAccordion === {{ $index }} }">
                                    <h3 class="text-base font-semibold text-left text-gray-900 sm:text-lg md:text-lg">
                                        {{ $question['title'] }}</h3>
                                    <svg :class="{ 'rotate-180': openAccordion === {{ $index }} }"
                                        class="w-6 h-6 transition duration-500 transform" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div x-show="openAccordion === {{ $index }}" x-collapse
                                    id="content-{{ $tabIndex }}-{{ $index }}">
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
