<div class="relative p-6 bg-center bg-no-repeat bg-cover md:p-24"
    style="min-height: 300px; md:min-height: 600px; background-repeat: no-repeat; background-size: cover; background-image: url({{ asset($product['bg-image']) }})">
    <div class="container relative z-10 grid grid-cols-1 gap-4 px-4 py-5 mx-auto mt-auto md:grid-cols-5 md:gap-6 md:px-10 md:py-10 backdrop-blur-md"
        style="background-color: rgba(255, 255, 255, 0.6);">
        <div class="grid col-span-3 grid-cols-2 gap-2 max-h-[600px]">
            <div class="grid gap-4 h-[600px] grid-rows-[1fr,2fr,1fr]">
                <img class="object-cover w-full object-[center_30%] max-h-full min-h-0" src="{{ asset($product['images'][0]) }}"
                    alt="{{ $product['name'] }}">
                <img class="object-cover object-top w-full max-h-full min-h-0" src="{{ asset($product['images'][1]) }}"
                    alt="{{ $product['name'] }}">
                <img class="object-cover w-full max-h-full min-h-0" src="{{ asset($product['images'][2]) }}"
                    alt="{{ $product['name'] }}">
            </div>
            <div class="grid gap-4 h-[600px] grid-rows-[2fr,1fr,2fr]">
                <img class="object-cover object-[center_20%] w-full max-h-full min-h-0" src="{{ asset($product['images'][3]) }}"
                    alt="{{ $product['name'] }}">
                <img class="object-cover object-[center_40%] w-full max-h-full min-h-0" src="{{ asset($product['images'][4]) }}"
                    alt="{{ $product['name'] }}">
                <img class="object-cover object-top w-full max-h-full min-h-0" src="{{ asset($product['images'][5]) }}"
                    alt="{{ $product['name'] }}">
            </div>
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
