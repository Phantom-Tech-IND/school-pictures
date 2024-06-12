<div class="px-4 mx-auto mt-6 sm:px-6 max-w-7xl lg:px-8">
    <div class="text-center md:my-6">
        <h1 class="text-xl xs:text-2xl sm:text-3xl font-[500] uppercase text-primary">HERZLICH WILLKOMMEN BEI
            <br />
            ARTLINE FOTOGRAFIE AG
        </h1>
    </div>
    <div class="masonry pt-8 max-w-[1140px] mx-auto">
        <div class="flex flex-col gap-4">
            <!-- Adjusted for mobile: Stacked on small screens, side by side on medium screens and up -->
            <div class="flex flex-col-reverse gap-4 md:flex-row">
                @include('components.icon-card', [
                    'icon' => 'heroicon-o-academic-cap',
                    'description' =>
                        'Starten Sie durch mit unseren Bewerbungsbildern. Professionell, wirkungsvoll, bei Artlinefotografie AG.',
                ])

                <a class="w-full" href="{{ route('contact') }}">
                    <div class="w-full h-72">
                        <img src="{{ asset('MA18-6079-4415.webp') }}" alt="Banner 1"
                            class="object-cover object-top w-full h-full">
                    </div>
                </a>
            </div>
            <div class="flex flex-col gap-4 md:flex-row">
                <a class="w-full" href="{{ route('contact') }}">
                    <div style="background-image: url('{{ asset('KC24-0298-4402.webp') }}');"
                        class="object-cover w-full bg-center bg-cover h-72">
                    </div>
                </a>
                @include('components.icon-card', [
                    'icon' => 'heroicon-o-academic-cap',
                    'description' =>
                        'Mit einem Fotoshooting bei ArtLine Fotografie AG wird jeder Moment unvergesslich.',
                ])
            </div>
        </div>
    </div>
</div>
