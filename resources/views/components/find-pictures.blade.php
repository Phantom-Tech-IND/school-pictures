<div x-data="{ showDialog: false }" x-cloak class="p-2 bg-accent">
    @guest('student')
        <h1 @click="showDialog = true" class="font-semibold text-center text-white uppercase cursor-pointer">Anmelden mit
            Galerie-Code</h1>
    @endguest

    @auth('student')
        <div class="flex items-center justify-between gap-4 mx-auto font-bold text-white max-w-7xl lg:px-8">
            <a href="{{ route('gallery-code') }}"
                class="flex gap-2 cursor-pointer hover:text-accent-100"><x-heroicon-s-rectangle-stack class="w-6 h-6" />
                Zurück zur Galerie</a>
            <a href="{{ route('logout') }}" class="flex gap-2 align-middle cursor-pointer hover:text-accent-100">Abmelden
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
                        kontaktieren Sie uns per Telefon unter <a href="tel:+41419214025"
                            class="font-semibold hover:text-accent-700">+41 41 921 40 25</a> oder über das
                        <a href="{{ route('contact') }}"
                            class="font-semibold hover:text-accent-700">Kontaktformular</a>.</span>
                </p>
                <form action="{{ route('login') }}" method="POST" class="my-4"
                    onsubmit="return beforeFormSubmit(event)">
                    @csrf
                    <div class="flex flex-wrap">
                        <label class="w-full text-sm" for="name">Kinder-Code:</label>
                        <input type="text" name="name"
                            class="w-full p-2 border rounded-sm focus:outline-2 focus:outline-accent-500 focus:ring-2 focus:ring-accent-500"
                            placeholder="Galerie-Code">
                        <label class="w-full mt-4 text-sm" for="birth_date">Geburtsdatum des Kindes:</label>
                        <input type="date" name="birth_date" id="birth_date_picker"
                            class="w-full p-2 border rounded-sm focus:outline-2 focus:outline-accent-500 focus:ring-2 focus:ring-accent-500"
                            placeholder="Datum auswählen" required>
                        <button type="submit" class="w-full p-2 mt-4 text-white rounded bg-accent">Anmelden</button>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    .flatpickr-calendar {
        margin-top: 0.3rem;
        border: 3px solid #94C11C;
    }

    .flatpickr-calendar::before, .flatpickr-calendar::after {
        display: none;
    }
</style>

<script>
    const errorParagraph = document.getElementById('login-error-message');

    document.addEventListener('DOMContentLoaded', function () {
        if (window.matchMedia('(hover: none) and (pointer: coarse)').matches) {
            flatpickr("#birth_date_picker", {
                dateFormat: "Y-m-d",
            });
        }
    });
    
    function beforeFormSubmit(event) {
        event.preventDefault();

        const childrenCodeInput = event.target.name;
        const birthDateInput = event.target.birth_date;
        let isValid = true;

        // Reset styles
        birthDateInput.classList.remove('format-error-loggin');
        childrenCodeInput.classList.remove('format-error-loggin');
        errorParagraph.classList.add('hidden');

        // Check if Kinder-Code is empty
        if (!childrenCodeInput.value.trim()) {
            childrenCodeInput.classList.add('format-error-loggin');
            isValid = false;
        }

        // Check if Geburtsdatum is empty
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
