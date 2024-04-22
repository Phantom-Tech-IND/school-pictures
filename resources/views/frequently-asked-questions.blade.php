@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-20 text-center" x-data="{ tab: '{{ $tabs[0]['id'] }}' }">
        <h1 class="text-4xl font-bold">HÄUFIG GESTELLTE FRAGEN (FAQ)</h1>
        <div class="flex flex-col items-center justify-center max-w-4xl mx-auto mt-6 space-x-0 space-y-4 lg:flex-row lg:space-x-4 lg:space-y-0">
            @foreach ($tabs as $tab)
                <button @click="tab = '{{ $tab['id'] }}'" :class="{ 'bg-green-900': tab === '{{ $tab['id'] }}' }"
                    class="w-auto px-4 py-2 text-white bg-green-600 rounded-full tab-button">{{ $tab['name'] }}</button>
            @endforeach
        </div>
        @foreach ($tabs as $tabIndex => $tab)
            <div x-show="tab === '{{ $tab['id'] }}'" class="faq-content" x-data="{ openAccordion: null }">
                <section class="px-4 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    @foreach ($tab['questions'] as $index => $question)
                        <div @click="openAccordion = openAccordion === {{ $index }} ? null : {{ $index }}"
                            :class="{
                                'bg-indigo-50 border-green-600': openAccordion === {{ $index }},
                                'border-gray-300': openAccordion !== {{ $index }}
                            }"
                            class="p-4 mb-8 transition duration-500 border-2 cursor-pointer rounded-xl"
                            id="accordion-{{ $index }}">
                            <div class="flex items-center justify-between"
                                :class="{ 'text-green-700': openAccordion === {{ $index }} }">
                                <h5>{{ $question['title'] }}</h5>
                                <svg :class="{ 'rotate-180': openAccordion === {{ $index }} }"
                                    class="w-6 h-6 transition duration-500 transform" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div x-show="openAccordion === {{ $index }}" x-collapse
                                id="content-{{ $index }}">
                                <p class="pt-4 text-left text-gray-900">
                                    {!! nl2br(e($question['answer'])) !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        @endforeach
    </div>
@endsection
