<section class="text-gray-600 body-font">
    <div class="container flex flex-wrap px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font 2xl:w-1/3 lg:mb-0">
                {{ $title }}</h1>
            <p class="mx-auto text-base leading-relaxed 2xl:pl-6 2xl:w-2/3">{{ $description }}</p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 bob">
            @foreach ($images as $image)
                <a class="h-full w-full rounded-lg object-cover bg-black group" data-fslightbox="{{ $lightbox_name }}"
                    href="{{ asset($image['url']) }}">
                    <img class="h-full w-full rounded-lg object-cover bg-black transition-opacity duration-300 group-hover:opacity-50"
                        src="{{ asset($image['url']) }}" alt="{{ $image['alt'] }}">
                </a>
            @endforeach
        </div>
    </div>
</section>

<style>
    .bob {

        &>:nth-child(6n - 3),
        &>:nth-child(6n - 2) {
            grid-column: span 2;
            grid-row: span 2;
        }
    }

    .bob>:last-child {
        grid-column: span 2;
    }
</style>
