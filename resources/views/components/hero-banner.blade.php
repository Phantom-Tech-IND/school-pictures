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
                            class="object-cover w-full md:h-[600px] lg:h-[800px] zoom-in-animation">
                    </div>
                </div>
            @endforeach
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
