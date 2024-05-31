<div class="p-8 bg-white isolate lg:px-8">
    <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 xs:text-3xl md:text-4xl">KONTAKTFORMULAR</h2>
    </div>
    <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" onsubmit="submitForm(event)"
        class="mx-auto mt-8 sm:mt-10">
        @csrf
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <fieldset>
                    <legend class="block text-sm font-semibold leading-6 text-gray-900">Optional können Sie aus den Bereichen auswählen:</legend>
                    @foreach ($offers as $offer)
                        <label class="inline-flex items-center text-sm mt-2.5 mr-2">
                            <input type="checkbox" name="interests" value="{{ $offer->title }}"
                                class="w-5 h-5 text-green-500 form-checkbox"
                                {{ $offerItem && $offerItem->offer_id == $offer->id ? 'checked' : '' }}>
                            <span class="ml-2">{{ $offer->title }}</span>
                        </label>
                    @endforeach
                </fieldset>
            </div>
            <div class="sm:col-span-2">
                <label for="appointment_date" class="block text-sm font-semibold leading-6 text-gray-900">Bewerbungsbild
                    - Fotoshooting- Terminwunsch</label>
                <div class="mt-2.5 flex gap-8">
                    <input type="date" name="appointment_date" id="appointment_date" required
                        class="block w-full flex-1 flex-grow-[2] text-center rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <input type="time" name="appointment_time" id="appointment_time" required
                        class="block w-full flex-1 flex-grow-[1] text-center rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Ihr Name
                    (Pflichtfeld)</label>
                <div class="mt-2.5">
                    <input type="text" name="name" id="name" placeholder="Ihr Name" maxlength="255" required
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Ihre E-Mail-Adresse
                    (Pflichtfeld)</label>
                <div class="mt-2.5">
                    <input type="email" name="email" id="email" placeholder="Ihre E-Mail-Adresse" required
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="subject" class="block text-sm font-semibold leading-6 text-gray-900">Betreff: Zu welchem
                    Bereich haben Sie Fragen?</label>
                <div class="mt-2.5">
                    <input type="text" name="subject" id="subject" placeholder="Betreff" maxlength="255"
                        value="{{ $offerItem ? $offerItem->name . ' paket' : '' }}"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Ihre Nachricht</label>
                <div class="mt-2.5">
                    <textarea name="message" id="message" rows="4" placeholder="Ihre Nachricht" maxlength="10000" required
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
@if ($offerItem)
I am interested in the offer {{ $offerItem->name }} with price {{ $offerItem->price }} which contains:

@foreach ($offerItem->custom_attributes as $attribute)
- {!! strip_tags(html_entity_decode($attribute['title'])) !!}
@endforeach
@endif
</textarea>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <button type="submit"
                class="block w-full rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Senden</button>
        </div>
    </form>
    <div id="successMessage" class="hidden mt-3 text-sm font-medium text-green-600"></div>
    <div id="errorMessage" class="hidden mt-3 text-sm font-medium text-red-600"></div>
</div>


<script>
    function submitForm(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);
        const formObject = Object.fromEntries(formData.entries());
        formObject['interests'] = formData.getAll('interests');

        // const prettyJson = JSON.stringify(formObject, null, 2);

        // alert(prettyJson);
        // return false;

        function validateDate(date) {
            const year = date.split('-')[0];
            return year > 1900 && year < 10000;
        }

        fetch(event.target.action, {
                method: 'POST',
                body: JSON.stringify(formObject),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status === 'success') {
                    document.getElementById('successMessage').textContent = data.message;
                    document.getElementById('successMessage').classList.remove('hidden');
                    document.getElementById('errorMessage').classList.add('hidden');
                    form.reset(); // Reset the form
                    // Manually clear the 'subject' and 'message' fields
                    document.getElementById('subject').value = '';
                    document.getElementById('message').value = '';
                } else {
                    document.getElementById('errorMessage').textContent = data.message;
                    document.getElementById('errorMessage').classList.remove('hidden');
                    document.getElementById('successMessage').classList.add('hidden');
                }
            })
            .catch((error) => {
                document.getElementById('errorMessage').textContent = 'Error: ' + error.message;
                document.getElementById('errorMessage').classList.remove('hidden');
                document.getElementById('successMessage').classList.add('hidden');
            });
    }
</script>
