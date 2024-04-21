@php
    use App\Constants\Constants;
@endphp
<div class="px-6 py-4 bg-white isolate lg:px-8"> <!-- Reduced padding here -->
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">KONTAKTFORMULAR</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">Optional können Sie aus den Bereichen auswählen:</p>
    </div>
    <form id="contactForm" method="POST" class="max-w-xl mx-auto mt-8 sm:mt-10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                @foreach (Constants::CHECKBOX_LABELS as $index => $label)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="interests[]" value="{{ $label }}" class="w-5 h-5 text-gray-600 form-checkbox">
                    <span class="ml-2">{{ $label }}</span>
                </label>
                @endforeach
            </div>
            <div class="sm:col-span-2">
                <label for="appointment_date" class="block text-sm font-semibold leading-6 text-gray-900">Bewerbungsbild - Fotoshooting- Terminwunsch</label>
                <div class="mt-2.5">
                    <input type="date" name="appointment_date" id="appointment_date" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Ihr Name (Pflichtfeld)</label>
                <div class="mt-2.5">
                    <input type="text" name="name" id="name" placeholder="Ihr Name" maxlength="255" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Ihre E-Mail-Adresse (Pflichtfeld)</label>
                <div class="mt-2.5">
                    <input type="email" name="email" id="email" placeholder="Ihre E-Mail-Adresse" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="subject" class="block text-sm font-semibold leading-6 text-gray-900">Betreff: Zu welchem Bereich haben Sie Fragen?</label>
                <div class="mt-2.5">
                    <input type="text" name="subject" id="subject" placeholder="Betreff" maxlength="255" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Ihre Nachricht</label>
                <div class="mt-2.5">
                    <textarea name="message" id="message" rows="4" placeholder="Ihre Nachricht" maxlength="10000" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Senden</button>
        </div>
    </form>
</div>


<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Gather form data
        const formData = new FormData(event.target);
        const data = {
            appointment_date: formData.get('appointment_date'),
            name: formData.get('name'),
            email: formData.get('email'),
            subject: formData.get('subject'),
            message: formData.get('message'),
            interests: formData.getAll('interests[]').join(', ')
        };

        // Create a message string from the data
        const message = `
        Appointment Date: ${data.appointment_date}
        Name: ${data.name}
        Email: ${data.email}
        Subject: ${data.subject}
        Message: ${data.message}
        Interests: ${data.interests}
    `;

        // Show the data in an alert
        alert(message);
    });
</script>
