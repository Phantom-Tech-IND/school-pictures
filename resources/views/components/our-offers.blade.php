<div class="py-24 bg-white sm:py-32">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-base font-semibold leading-7 text-accent-600">{{ $title }}</h2>
            <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ $subtitle }}</p>
        </div>
        <p class="mx-auto mt-6 text-lg leading-8 text-center text-gray-600">{{ $description }}</p>
        <div class="grid max-w-md grid-cols-1 gap-8 mx-auto mt-10 isolate lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($offers as $offer)
                @include('components.plan-card', [
                    'offerId' => 'freelancer',
                    'offer_url' => $offer['offer_url'],
                    'title' => $offer['title'],
                    'badge' => $offer['badge'] ?? null,
                    'price' => $offer['price'],
                    'features' => $offer['features']
                ])
            @endforeach
        </div>
    </div>
</div>
