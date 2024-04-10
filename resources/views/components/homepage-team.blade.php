<div class="px-6 pb-8 mx-auto max-w-7xl lg:px-8">
    <div class="my-6 mb-10 text-center">
        <h1 class="text-2xl font-bold uppercase text-primary">UBER UNS</h1>
        <h3 class="italic text-gray-600 text-md">REM GALISUM MAXIME VEL OBCAECATI QUAERAT EOS VELIT QUIA.
        </h3>
        <p class="w-1/2 mx-auto my-4 text-md">Vestibulum sed lacinia diam. Morbi varius augue quis fringilla molestie.
            Etiam
            eget
            mattis
            dolor.
            Pellentesque porta metus dolor, eu pretium felis sagittis ac.
        </p>
    </div>
    <div class="flex flex-wrap">
        @foreach ($teams as $team)
            @include('components.team-member', $team)
        @endforeach

    </div>
</div>

</div>
