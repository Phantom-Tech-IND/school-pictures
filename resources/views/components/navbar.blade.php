<div class="px-6 pb-8 mx-auto max-w-7xl lg:px-8 " x-data="{ open: false }">
    <nav class="relative flex items-center justify-between px-3 py-6">
        <div class="flex items-center flex-shrink-0 text-black">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" width="150" alt="Logo">
            </a>
        </div>
        <div class="hidden lg:block">
            <div class="flex gap-4 text-sm text-center align-middle">
                <!-- Add your menu items here -->
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-accent' : ' hover:text-accent' }}  uppercase">Home</a>
                <a href="{{ route('shop') }}"
                    class="{{ request()->routeIs('shop') ? 'text-accent' : ' hover:text-accent' }} uppercase">Webshop</a>
                <!-- Add more links as needed -->
                <a href="{{ route('shop') }}"
                    class="{{ request()->routeIs('shop') ? 'text-accent' : ' hover:text-accent' }} uppercase">Kindergarten
                    und Schulfotografie</a>
                <a href="{{ route('shop') }}"
                    class="{{ request()->routeIs('shop') ? 'text-accent' : ' hover:text-accent' }} uppercase">Unsere
                    angebote</a>


                <a href="{{ route('shop') }}"
                    class="{{ request()->routeIs('shop') ? 'text-accent' : ' hover:text-accent' }} uppercase">Unsere
                    Kontakt</a>
            </div>
        </div>
        <div class="lg:hidden">
            <button @click="open = !open" class="text-black focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
    </nav>
    <div x-show="open" @click.away="open = false" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute left-0 right-0 bg-white shadow-sm top-[100px] lg:hidden">
        <div class="container flex flex-col h-full gap-2 px-3 pb-4 mx-auto space-y-1 text-right">
            <!-- Add your responsive menu items here with fade-in transitions -->
            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'text-accent' : ' hover:text-accent' }}"
                x-transition:enter="ease-out duration-300 delay-100" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">Home</a>
            <!-- Repeat for other menu items, increasing the delay for each to stagger their appearance -->
            <a href="{{ route('shop') }}"
                class="{{ request()->routeIs('shop') ? 'text-accent' : ' hover:text-accent' }}"
                x-transition:enter="ease-out duration-300 delay-200" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">Webshop</a>
            <!-- Continue adding items with increasing delay values -->
        </div>
    </div>
</div>

<style>
    .slide-down-enter-active,
    .slide-down-leave-active {
        transition: all 0.1s linear;
    }

    .slide-down-enter,
    .slide-down-leave-to {
        transform: translateY(-100%);
        opacity: 0;
    }
</style>
