<div class="relative py-24 bg-center bg-cover" style="background-image: url('{{ asset($background_image) }}');">
    <div class="container p-12 mx-auto bg-white w-fit bg-opacity-5"
        style="background-color : rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);">
        <h3 class="text-md text-primary">{{ $title }}</h3>
        <p class="max-w-xl mt-4 font-raleway text-primary">{{ $description }}</p>
        <a href="{{ url($link) }}"
            class="inline-block px-6 py-3 mt-8 text-white rounded bg-accent hover:bg-accent-dark">
            {{ $button }}
        </a>
    </div>
</div>
