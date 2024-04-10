<div class="relative p-6 bg-center bg-no-repeat bg-cover md:p-24"
    style="min-height: 300px; md:min-height: 600px; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset($product['image']) }})">
    <div class="container relative z-10 grid grid-cols-1 gap-4 px-4 py-5 mx-auto mt-auto md:grid-cols-2 md:gap-6 md:px-10 md:py-10 backdrop-blur-md"
        style="background-color: rgba(255, 255, 255, 0.6);">
        <div>
            <img class="object-cover w-full h-full md:h-full" src="{{ asset($product['image']) }}"
                alt="{{ $product['name'] }}">
        </div>
        <div class="my-4 md:my-12">
            <h4 class="mb-5 md:mb-10 font-[500] uppercase text-sm md:text-md text-accent">Most popular</h4>
            <p class="font-[500] uppercase text-xs md:text-base">{{ $product['type'] }}</p>
            <h1 class="text-lg md:text-xl font-[500] mb-5 md:mb-10 uppercase text-primary">{{ $product['name'] }}</h1>
            @foreach ($product['description'] as $description)
                <p class="mb-4 text-xs md:mb-6 md:text-sm text-primary">{{ $description }}</p>
            @endforeach
        </div>
    </div>
</div>
