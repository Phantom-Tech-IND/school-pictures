<div x-data="{ showDialog: false }" class="p-2 bg-accent">
    <h1 @click="showDialog = true" class="font-semibold text-center text-white uppercase cursor-pointer">Search by gallery
        code</h1>
    <div x-show="showDialog" class="fixed inset-0 p-4 bg-black bg-opacity-50" @click="showDialog = false">
        <div @click.stop class="flex items-center justify-center min-h-screen">
            <div class="relative max-w-lg p-8 bg-white rounded-lg" @click="event.stopPropagation()">
                <button @click="showDialog = false"
                    class="absolute top-0 right-0 z-40 mt-4 mr-4 text-xl font-semibold leading-none cursor-pointer text-accent">&times;</button>
                <h2 class="mb-4 text-lg font-semibold text-center">Galerie Code Anmeldung</h2>
                <p class="mb-4 text-center">Um die Bilder Ihres Shootings betrachten zu können, sowie für
                    Nachbestellungen und Fotoprodukte, melden Sie sich bitte mit Ihrem Galerie-Code an.</p>
                <form action="/gallery-code" method="GET" class="my-4">
                    <div class="flex flex-wrap gap-2 lg:flex-nowrap">
                        <input type="text" name="code" class="w-full p-2 border md:w-1/2"
                            placeholder="Gallery Code">
                        <input type="date" name="date" class="w-full p-2 border md:w-1/2"
                            placeholder="Select Date">
                        <button type="submit" class="w-full p-2 text-white rounded md:w-1/2 bg-accent"
                            @click="showDialog = false">Search</button>
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
