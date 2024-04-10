<div class="bg-gray-50">
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper ">
            <!-- Slides -->
            @foreach ($slides as $slide)
                <div class="swiper-slide">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset($slide['image']) }}" alt="{{ $slide['alt'] }}"
                            class="object-cover w-full h-[400px] md:h-[600px] lg:h-[800px] zoom-in-animation">
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-30 overlay">
                        <div
                            class="flex flex-col justify-end h-full px-4 pb-10 mx-auto sm:px-6 sm:pb-14 max-w-7xl lg:px-8">
                            <h1 class="max-w-lg text-2xl text-white sm:text-3xl md:text-4xl sm:max-w-lg md:max-w-2xl">
                                {{ $slide['caption'] }}</h1>
                            <p class="max-w-lg mt-2 text-xs text-white sm:mt-4 sm:text-sm md:text-base">
                                {{ $slide['alt'] }}</p>
                            <button
                                class="px-3 py-1 mt-3 text-xs text-white uppercase bg-transparent border-2 rounded-md sm:px-4 sm:py-2 sm:mt-4 sm:text-sm md:text-base border-gray-50 font-raleway w-fit hover:bg-accent">Kontakt</button>
                        </div>
                    </div>
                </div>
            @endforeach
            ...
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
</div>
