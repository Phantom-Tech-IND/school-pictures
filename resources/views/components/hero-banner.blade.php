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
                            class="object-cover w-full h-[400px] md:h-[500px] lg:h-[700px]">
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-30 overlay">
                        <div class="flex flex-col justify-center h-full px-6 pb-8 mx-auto max-w-7xl lg:px-8">
                            <h1 class="text-4xl text-white">{{ $slide['caption'] }}</h1>
                            <button
                                class="px-4 py-2 mt-4 text-white uppercase rounded-md font-raleway w-fit bg-primary hover:bg-accent">Kontakt</button>
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
