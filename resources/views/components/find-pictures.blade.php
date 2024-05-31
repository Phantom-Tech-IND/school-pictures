<div x-data="{ showDialog: false }" x-cloak class="p-2 bg-accent">
    @guest('student')
        <h1 @click="showDialog = true" class="font-semibold text-center text-white uppercase cursor-pointer">Search by gallery
            code</h1>
    @endguest

    @auth('student')
        <div class="flex items-center justify-between gap-4 mx-auto font-bold text-white max-w-7xl lg:px-8">
            <a href="{{ route('gallery-code') }}"
                class="flex gap-2 cursor-pointer hover:text-accent-100"><x-heroicon-s-rectangle-stack class="w-6 h-6" />
                Go
                back to gallery</a>
            <a href="{{ route('logout') }}" class="flex gap-2 align-middle cursor-pointer hover:text-accent-100">Logout
                <x-heroicon-s-arrow-left-on-rectangle class="w-6 h-6 font-bold stroke-current" /></a>
        </div>
    @endauth
    <div x-show="showDialog" class="fixed inset-0 z-10 p-4 bg-black bg-opacity-50" @click="showDialog = false">
        <div class="flex items-center justify-center min-h-screen">
            <div class="relative max-w-lg p-8 bg-white rounded-lg" @click="event.stopPropagation()">
                <button @click="showDialog = false"
                    class="absolute top-0 right-0 z-40 mt-4 mr-4 text-xl font-semibold leading-none cursor-pointer text-accent">&times;</button>
                <h2 class="mb-4 text-lg font-semibold text-center">
                    Galerie Code Anmeldung</h2>
                <p class="mb-4 text-center">Um die Bilder Ihres Shootings betrachten zu können, sowie für
                    Nachbestellungen und Fotoprodukte, melden Sie sich bitte mit Ihrem Galerie-Code an.</p>
                <p id="login-error-message" class="hidden my-4 text-center text-red-500">
                    <span class="block text-lg font-semibold">Wir konnten Ihre Daten nicht finden.</span>
                    <span class="block">Entweder der eingegebene Code oder das Geburtsdatum ist falsch. Bitte
                        kontaktieren Sie uns per E-Mail unter <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}"
                            class="font-semibold hover:text-accent-700">{{ env('MAIL_FROM_ADDRESS') }}</a> oder ber das
                        <a href="{{ route('contact') }}"
                            class="font-semibold hover:text-accent-700">Kontaktformular</a>.</span>
                </p>
                <form action="{{ route('login') }}" method="POST" class="my-4"
                    onsubmit="return beforeFormSubmit(event)">
                    @csrf
                    <div class="flex flex-wrap">
                        <label class="w-full text-sm" for="name">Children-Code:</label>
                        <input type="text" name="name"
                            class="w-full p-2 border rounded-sm focus:outline-2 focus:outline-accent-500 focus:ring-2 focus:ring-accent-500"
                            placeholder="Gallery Code">
                        <label class="w-full mt-4 text-sm" for="birth_date">Child's Birth-Date:</label>
                        <input type="date" name="birth_date"
                            class="w-full p-2 border rounded-sm focus:outline-2 focus:outline-accent-500 focus:ring-2 focus:ring-accent-500"
                            placeholder="Select Date" required>
                        <button type="submit" class="w-full p-2 mt-4 text-white rounded bg-accent">Login</button>
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

<script>
    const errorParagraph = document.getElementById('login-error-message');

    function beforeFormSubmit(event) {
        event.preventDefault();

        const childrenCodeInput = event.target.name;
        const birthDateInput = event.target.birth_date;
        let isValid = true;

        // Reset styles
        birthDateInput.classList.remove('format-error-loggin');
        childrenCodeInput.classList.remove('format-error-loggin');
        errorParagraph.classList.add('hidden');

        // Check if Children-Code is empty
        if (!childrenCodeInput.value.trim()) {
            childrenCodeInput.classList.add('format-error-loggin');
            isValid = false;
        }

        // Check if Birth-Date is empty
        if (!birthDateInput.value) {
            birthDateInput.classList.add('format-error-loggin');
            isValid = false;
        }

        if (!isValid) {
            return false;
        }

        // Proceed with fetch call if inputs are valid
        const formData = new FormData(event.target);

        fetch('{{ route('login') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else if (data.error) {
                    errorParagraph.classList.remove('hidden'); // Show the error message paragraph
                }
            })
            .catch(error => {
                errorParagraph.classList.remove('hidden'); // Show the error message paragraph
            });

        return true;
    }
</script>

<style>
    .format-error-loggin {
        border: 2px solid red;
    }
</style>
</style>
