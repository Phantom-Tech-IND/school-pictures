<div class="px-4 pb-8 mx-auto sm:px-6 max-w-7xl lg:px-8">
    <div class="text-center md:my-6 md:mb-10">
        <h1 class="text-2xl sm:text-3xl font-[500] uppercase text-primary">HERZLICH WILLKOMMEN BEI
            <br />
            ARTLINE FOTOGRAFIE AG
        </h1>
        <h3 class="mt-2 text-sm italic text-gray-600 sm:text-md">REM GALISUM MAXIME VEL OBCAECATI QUAERAT EOS VELIT QUIA.
        </h3>
    </div>
    <div class="masonry py-8 sm:py-[100px] max-w-[1140px] mx-auto">
        <div class="flex flex-col gap-4">
            <!-- Adjusted for mobile: Stacked on small screens, side by side on medium screens and up -->
            <div class="flex flex-col gap-4 md:flex-row">
                @include('components.icon-card', [
                    'icon' => 'heroicon-o-academic-cap',
                    'title' => 'THIS IS GRAY',
                    'description' => 'ADD YOUR HEADING TEXT HERE',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                ])
                <div style="background-image: url('{{ asset('/coverbluzz.jpeg') }}');"
                    class="object-cover w-full bg-cover h-42">
                </div>
            </div>
            <div class="flex flex-col gap-4 md:flex-row">
                <div style="background-image: url('{{ asset('/coverbluzz.jpeg') }}');"
                    class="object-cover w-full bg-cover h-42">
                </div>
                @include('components.icon-card', [
                    'icon' => 'heroicon-o-academic-cap',
                    'title' => 'THIS IS GRAY',
                    'description' => 'ADD YOUR HEADING TEXT HERE',
                ])
            </div>
        </div>
    </div>
</div>
