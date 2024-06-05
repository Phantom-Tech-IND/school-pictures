<div class="bg-gray-50">
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($slides as $slide)
                <div class="swiper-slide">
                    <img src="{{ asset($slide['image']) }}" alt="{{ $slide['alt'] }}"
                        class="object-cover w-full h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px]">
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

<style>
    .swiper-button-prev,
    .swiper-button-next {
        color: #94C11C;
    }

    .swiper-pagination-bullet {
        background-color: #94C11C;
    }

    .swiper-slide {
        transform: translate3d(0, 0, 0);
        /* Force hardware acceleration */
    }
</style>
