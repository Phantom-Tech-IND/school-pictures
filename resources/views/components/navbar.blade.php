<div class="fixed left-0 right-0 z-50 bg-white">
    @include('components.find-pictures')
    <div class="mx-auto max-w-7xl lg:px-8" x-data="{ open: false }">
        <nav class="relative flex items-center justify-between px-3 py-3">
            <div class="flex items-center flex-shrink-0 text-black">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('logo.png') }}" width="150" class="w-32 " alt="Logo">
                </a>
            </div>
            <div class="hidden xl:block">
                <div class="flex gap-4 text-sm text-center align-middle">
                    <!-- Add your menu items here -->
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-accent' : ' hover:text-accent' }}  uppercase">Home</a>
                    <a href="{{ route('shop') }}"
                        class="{{ request()->routeIs('shop') ? 'text-accent' : ' hover:text-accent' }} uppercase">Webshop</a>
                    <!-- Add more links as needed -->
                    <a href="{{ route('kindergarden') }}"
                        class="{{ request()->routeIs('kindergarden') ? 'text-accent' : ' hover:text-accent' }} uppercase">Kindergarten
                        und Schulfotografie</a>
                    <a href="{{ route('offers') }}"
                        class="{{ request()->routeIs('offers') ? 'text-accent' : ' hover:text-accent' }} uppercase">Unsere
                        angebote</a>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex uppercase {{ request()->routeIs('about.*') ? 'text-accent' : 'hover:text-accent' }}">
                            Über uns
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-50 w-48 mt-2 origin-top-right rounded-md shadow-sm"
                            style="display: none;">
                            <div class="py-1 text-right bg-white rounded-md ring-1 ring-black ring-opacity-5">
                                <a href="{{ route('team') }}"
                                    class="{{ request()->routeIs('team') ? 'bg-gray-100' : '' }} block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Unser
                                    Team</a>
                                <a href="{{ route('partners') }}"
                                    class="{{ request()->routeIs('partners') ? 'bg-gray-100' : '' }} block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Unsere
                                    Partnerseiten</a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}"
                        class="{{ request()->routeIs('contact') ? 'text-accent' : ' hover:text-accent' }} uppercase">Unsere
                        Kontakt</a>
                </div>
            </div>
            <div class="xl:hidden">
                <button @click="open = !open" class="text-black focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </button>
            </div>
        </nav>
        {{-- 
            Alex, te rog, poti sa o rezolvi tu ca nu stiu de ce nu merge
            La sfarsitul animatiei, in loc ca modalul sa fie 50% opacity, este 100% opacity.
            Ori o rezolvi ori o poti sterge
        --}}
        {{-- <div class="fixed top-0 left-0 w-full h-full transition-opacity bg-black"
            x-show="open"
            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-50"
            x-transition:leave="transition-opacity ease-in duration-300"
            x-transition:leave-start="opacity-50"
            x-transition:leave-end="opacity-0">
        </div> --}}
        <div x-show="open" @click.away="open = false" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 -right-full" x-transition:enter-end="opacity-100 right-0"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 right-0"
            x-transition:leave-end="opacity-0 -right-full"
            class="absolute right-0 z-50 bg-white shadow-sm xl:hidden ">
            <nav class="container flex flex-col h-full gap-2 px-8 py-8 mx-auto space-y-1 xl:px-8">
                <a href="{{ route('home') }}"
                    class="{{
                        request()->routeIs('home') ?
                        'text-accent font-semibold relative -left-2' :
                        'relative left-0 font-medium
                        transition-all duration-300
                        hover:pl-0 hover:text-accent hover:-left-2'
                    }}">Home</a>
                <a href="{{ route('shop') }}"
                    class="{{
                        request()->routeIs('shop') ?
                        'text-accent font-semibold relative -left-2' :
                        'relative left-0 font-medium
                        transition-all duration-300
                        hover:pl-0 hover:text-accent hover:-left-2'
                    }}">Webshop</a>
                <a href="{{ route('kindergarden') }}"
                    class="{{
                        request()->routeIs('kindergarden') ?
                        'text-accent font-semibold relative -left-2' :
                        'relative left-0 font-medium
                        transition-all duration-300
                        hover:pl-0 hover:text-accent hover:-left-2'
                    }}">Kindergarten und Schulfotografie</a>
                <a href="{{ route('offers') }}"
                    class="{{
                        request()->routeIs('offers') ?
                        'text-accent font-semibold relative -left-2' :
                        'relative left-0 font-medium
                        transition-all duration-300
                        hover:pl-0 hover:text-accent hover:-left-2'
                    }}">Unsere angebote</a>
                <a href="{{ route('team') }}"
                    class="{{
                        request()->routeIs('team') ?
                        'text-accent font-semibold relative -left-2' :
                        'relative left-0 font-medium
                        transition-all duration-300
                        hover:pl-0 hover:text-accent hover:-left-2'
                    }}">Unsere Team</a>
                <a href="{{ route('partners') }}"
                    class="{{
                        request()->routeIs('partners') ?
                        'text-accent font-semibold relative -left-2' :
                        'relative left-0 font-medium
                        transition-all duration-300
                        hover:pl-0 hover:text-accent hover:-left-2'
                    }}">Unsere Partnerseiten</a>
                <a href="{{ route('contact') }}"
                    class="{{
                        request()->routeIs('contact') ?
                        'text-accent font-semibold relative -left-2' :
                        'relative left-0 font-medium
                        transition-all duration-300
                        hover:pl-0 hover:text-accent hover:-left-2'
                    }}">Unsere Kontakt</a>
            </nav>
        </div>
    </div>

</div>
