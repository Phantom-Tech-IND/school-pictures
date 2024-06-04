<div class="relative p-6 bg-center bg-no-repeat bg-cover md:p-24"
    style="min-height: 300px; md:min-height: 600px; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset($product['bg-image']) }})">
    <div class="container relative z-10 grid grid-cols-1 gap-4 px-4 py-5 mx-auto mt-auto md:grid-cols-5 md:gap-6 md:px-10 md:py-10 backdrop-blur-md"
        style="background-color: rgba(255, 255, 255, 0.6);">
        <div class="grid col-span-3 grid-cols-2 gap-2 max-h-[600px] auto-rows-[1fr]">
            @foreach($product['images'] as $index => $image)
                {{-- <div class="min-h-0"> --}}
                <div class="{{ $loop->last && $loop->count % 2 != 0 ? 'col-span-2' : '' }} min-h-0">
                    <img class="object-cover w-full h-full min-h-0" src="{{ asset($image) }}" alt="{{ $product['name'] }}">
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-1 col-span-2 py-4 my-auto xs:grid-cols-2 md:grid-cols-1 md:py-12">
            <div>
                <h4 class="mb-5 md:mb-10 font-[500] uppercase text-sm md:text-md text-accent-800">Most popular</h4>
                <p class="font-[500] uppercase text-xs md:text-base">{{ $product['type'] }}</p>
                <h1 class="text-lg md:text-xl font-[500] mb-5 md:mb-10 uppercase text-primary">{{ $product['name'] }}
                </h1>
            </div>
            <div>
                @foreach ($product['description'] as $description)
                    <p class="mb-4 text-xs md:mb-6 md:text-sm text-primary">{{ $description }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>

