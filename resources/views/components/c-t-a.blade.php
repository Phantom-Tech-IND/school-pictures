<div class="relative py-12 bg-center bg-cover sm:py-24" style="background-image: url('{{ asset($background_image) }}');">
    <div class="container max-w-[1140px] px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="p-6 sm:p-12 lg:mx-24 max-w-[570px] bg-white w-full sm:w-fit bg-opacity-5"
            style="background-color : rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);">
            <h3 class="text-xl sm:text-2xl text-primary">{{ $title }}</h3>
            <p class="max-w-xl mt-4 text-xs sm:text-sm font-raleway text-primary">{{ $description }}</p>
            <a href="{{ url($link) }}"
                class="inline-block px-4 py-2 mt-6 text-xs text-white rounded sm:px-6 sm:py-3 sm:mt-8 sm:text-sm bg-accent hover:bg-accent-dark">
                {{ $button }}
            </a>
        </div>
    </div>
</div>
