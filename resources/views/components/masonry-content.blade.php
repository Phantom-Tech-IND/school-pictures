<div class="px-4 mx-auto sm:px-6 max-w-7xl lg:px-8">
    <div class="text-center md:my-6">
        <h1 class="text-xl xs:text-2xl sm:text-3xl font-[500] uppercase text-primary">HERZLICH WILLKOMMEN BEI
            <br />
            ARTLINE FOTOGRAFIE AG
        </h1>
        <h3 class="mt-2 text-sm italic text-gray-600 sm:text-md">REM GALISUM MAXIME VEL OBCAECATI QUAERAT EOS VELIT QUIA.
        </h3>
    </div>
    <div class="masonry pt-8 max-w-[1140px] mx-auto">
        <div class="flex flex-col gap-4">
            <!-- Adjusted for mobile: Stacked on small screens, side by side on medium screens and up -->
            <div class="flex flex-col-reverse gap-4 md:flex-row">
                @include('components.icon-card', [
                    'icon' => 'heroicon-o-academic-cap',
                    'title' => 'Entdecken Sie unsere Angebote!',
                    'description' => 'Starten Sie durch mit unseren Bewerbungsbildern. Professionell, wirkungsvoll, bei Artlinefotografie AG.',
                ])
                <div style="background-image: url('{{ asset('gr20-6782-7121.jpg') }}');" class="object-cover w-full bg-center bg-cover h-72">
                </div>
            </div>
            <div class="flex flex-col gap-4 md:flex-row">
                <div style="background-image: url('{{ asset('banner-3.jpg') }}');" class="object-cover w-full bg-cover h-72">
                </div>
                @include('components.icon-card', [
                    'icon' => 'heroicon-o-academic-cap',
                    'title' => 'Entdecken Sie unsere Angebote!',
                    'description' => 'Mit einem Fotoshooting bei ArtLine Fotografie AG wird jeder Moment unvergesslich.',
                ])
            </div>
        </div>
    </div>
</div>
