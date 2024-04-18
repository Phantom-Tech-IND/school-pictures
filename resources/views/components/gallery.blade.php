<section class="text-gray-600 body-font">
    <div class="container flex flex-wrap px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font 2xl:w-1/3 lg:mb-0">
                {{ $title }}</h1>
            <p class="mx-auto text-base leading-relaxed 2xl:pl-6 2xl:w-2/3">{{ $description }}</p>
        </div>

        @include('components.lightbox-gallery', ['images' => $images])
    </div>
</section>
