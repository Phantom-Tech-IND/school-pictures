<a href="{{ route('offer', ['id' => $offer->id]) }}">
    <div class="container relative h-full mx-auto text-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="{{ asset('storage'.$image) }}" alt="Offer Image" class="object-cover w-full h-full max-h-[400px]">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-2xl font-semibold text-white uppercase">{{ $title }}</h2>
        </div>
    </div>
</a>
