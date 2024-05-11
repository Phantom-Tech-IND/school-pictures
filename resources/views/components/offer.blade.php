<a href="{{ route('offer', ['id' => $offer->id]) }}">
    <div class="container relative h-full mx-auto text-center group">
        <div class="absolute inset-0 transition-opacity bg-black opacity-0 group-hover:opacity-50"></div>
        <img src="{{ asset('storage/'.$image) }}" alt="Offer Image" class="object-cover w-full h-full max-h-[400px]">
    </div>
</a>
