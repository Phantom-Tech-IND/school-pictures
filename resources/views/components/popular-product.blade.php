<div class="relative p-24 bg-center bg-no-repeat bg-cover "
    style="min-height: 600px; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset($product['image']) }})">
    <div class="container relative z-10 grid max-w-4xl grid-cols-2 gap-6 px-10 py-10 mx-auto mt-auto backdrop-blur-md"
        style="background-color: rgba(255, 255, 255, 0.6);">
        <div>
            <img class="object-cover h-full" src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
        </div>
        <div class="my-12">
            <h4 class="mb-10 font-[500] uppercase text-md text-accent">Most popular</h4>
            <p class="font-[500] uppercase">{{ $product['type'] }}</p>
            <h1 class="text-xl font-[500] mb-10 uppercase text-primary">{{ $product['name'] }}</h1>
            @foreach ($product['description'] as $description)
                <p class="mb-6 text-xs text-primary">{{ $description }}</p>
            @endforeach
        </div>
    </div>
</div>
