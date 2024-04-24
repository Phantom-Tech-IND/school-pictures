<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <input type="text" wire:model="name" placeholder="Name" required>
        <input type="date" wire:model="birth_date" placeholder="Birth Date" required>
        <select wire:model="institution_type" required>
            <option value="">Select Institution Type</option>
            <option value="school">School</option>
            <option value="kindergarden">Kindergarden</option>
        </select>
        <input type="file" wire:model="student_photos" multiple>

        <button type="submit">Save Student</button>
    </form>
</div>