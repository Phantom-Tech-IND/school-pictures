<div class="px-4 py-5 mt-12 text-white bg-darkgrey">
    <div class="container relative z-10 max-w-6xl py-10 mx-auto backdrop-blur-md">
        <div class="flex flex-wrap">
            <!-- Contact Information -->
            <div class="w-full mb-6 md:w-1/2 md:mb-0">
                <h4 class="mb-4 text-lg font-semibold">ADRESSE:</h4>
                <p class="mb-4 text-sm">Gewerbezone 59, Buttisholz, 6018, Schweiz</p>
                <h4 class="mb-4 text-lg font-semibold">INFORMATIONEN:</h4>
                <p class="text-sm">+41 41 921 40 25<br>artline@email.com</p>
            </div>
            <!-- Contact Form -->
            <div class="w-full md:w-1/2">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="flex gap-4 mb-4">
                        <input type="text" name="name"
                            class="w-full p-2 text-sm text-black border border-gray-300 " placeholder="Name">
                        <input type="email" name="email"
                            class="w-full p-2 text-sm text-black border border-gray-300" placeholder="E-Mail">
                    </div>
                    <div class="mb-4">
                        <textarea name="text" class="w-full p-2 text-sm text-black border border-gray-300 " rows="4"
                            placeholder="Nachricht"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-sm text-white lg:w-40 bg-accent hover:bg-primary">SENDEN</button>
                </form>
            </div>
        </div>
    </div>
</div>
