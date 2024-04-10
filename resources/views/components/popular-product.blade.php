<div class="relative p-24 bg-center bg-no-repeat bg-cover "
    style="background-repeat: no-repeat; background-size: cover; background-image: url({{ asset($product['image']) }})">
    <div class="container relative z-10 flex max-w-4xl px-10 py-10 mx-auto mt-auto backdrop-blur-md"
        style="background-color: rgba(255, 255, 255, 0.8);">
        <div>
            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
        </div>
        <div>
            <h4 class="text-xs uppercase text-accent">Most popular</h4>
            <h1 class="text-xl uppercase text-primary">{{ $product['name'] }}</h1>
            @foreach ($product['description'] as $description)
                <p class="text-sm text-primary">{{ $description }}</p>
            @endforeach
        </div>
    </div>
</div>
