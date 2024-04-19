@props(['images', 'galleryId'])

<div class="mt-20 grid grid-cols-4 gap-4">
    @forelse ($images as $image)
        <div class="border cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none"
            style="outline-offset: 2px;">
            <img src="{{ $image }}" alt="{{ \App\Constants\Constants::KINDERGARDEN_ALT_TEXT }}"
                class="object-cover w-full h-48 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
        </div>
    @empty
        <div>No images found.</div>
    @endforelse
</div>
