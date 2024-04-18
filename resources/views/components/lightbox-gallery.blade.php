<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 bob">
    @foreach ($images as $image)
        <a class="h-full w-full rounded-lg object-cover bg-black group" data-fslightbox="{{ $lightbox_name }}"
            href="{{ asset($image['url']) }}">
            <img class="h-full w-full rounded-lg object-cover bg-black transition-opacity duration-300 group-hover:opacity-50"
                src="{{ asset($image['url']) }}" alt="{{ $image['alt'] }}">
        </a>
    @endforeach
</div>

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