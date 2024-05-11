<div x-data="{ showDialog: false }" x-cloak class="p-2 bg-accent">
    @guest
        <h1 @click="showDialog = true" class="font-semibold text-center text-white uppercase cursor-pointer">Search by gallery
            code</h1>
    @endguest

    @auth
        <div class="flex items-center mx-auto max-w-7xl lg:px-8 font-bold justify-between text-white gap-4">
            <a href="{{ route('gallery-code') }}"
                class="cursor-pointer flex gap-2 hover:text-accent-100"><x-heroicon-s-rectangle-stack class="w-6 h-6" />
                Go
                back to gallery</a>
            <a href="{{ route('logout') }}" class="cursor-pointer hover:text-accent-100 flex gap-2 align-middle">Logout
                <x-heroicon-s-arrow-left-on-rectangle class="w-6 h-6 font-bold stroke-current" /></a>
        </div>
    @endauth
    <div x-show="showDialog" class="fixed inset-0 p-4 bg-black bg-opacity-50" @click="showDialog = false">
        <div @click.stop class="flex items-center justify-center min-h-screen">
            <div class="relative max-w-lg p-8 bg-white rounded-lg" @click="event.stopPropagation()">
                <button @click="showDialog = false"
                    class="absolute top-0 right-0 z-40 mt-4 mr-4 text-xl font-semibold leading-none cursor-pointer text-accent">&times;</button>
                <h2 class="mb-4 text-lg font-semibold text-center">
                    Galerie Code Anmeldung</h2>
                <p class="mb-4 text-center">Um die Bilder Ihres Shootings betrachten zu können, sowie für
                    Nachbestellungen und Fotoprodukte, melden Sie sich bitte mit Ihrem Galerie-Code an.</p>
                <form action="{{ route('login') }}" method="POST" class="my-4">
                    @csrf
                    <div class="flex flex-wrap">
                        <label class="w-full text-sm" for="name">Children-Code:</label>
                        <input type="text" name="name"
                            class="w-full p-2 border  focus:outline-2 focus:outline-accent-500 focus:ring-2 focus:ring-accent-500 rounded-sm"
                            placeholder="Gallery Code">
                        <label class="w-full text-sm mt-4" for="birth_date">Child's Birth-Date:</label>
                        <input type="date" name="birth_date"
                            class="w-full p-2 border  focus:outline-2 focus:outline-accent-500 focus:ring-2 focus:ring-accent-500 rounded-sm"
                            placeholder="Select Date">
                        <button type="submit" class="w-full mt-4 p-2 text-white rounded  bg-accent"
                            @click="showDialog = false">Login</button>
                    </div>
                </form>
                <p class="text-center">Sie haben keinen Galerie-Code? Bitte kontaktieren Sie unseren Kundenservice
                    unter:
                    <br />
                    <a class="hover:text-accent" href="tel:+41419214025">+41 (0) 41 921 40 25</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
