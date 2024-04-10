<div>
    <div class="container relative z-10 max-w-4xl px-10 py-10 mx-auto mt-auto text-center backdrop-blur-md">
        @isset($title)
            <h1 class="text-4xl mb-4 uppercase font-[500] text-center text-primary">{{ $title }}</h1>
        @endisset
        @isset($subtitle)
            <h2 class="text-xl mb-6 uppercase font-[500] font-raleway text-primary">{{ $subtitle }}</h2>
        @endisset
        @isset($description)
            <p class="text-sm text-primary">{{ $description }}</p>
        @endisset
    </div>
    <div class="container max-w-6xl mx-auto">
        <div class="flex flex-wrap justify-center gap-4 p-4 md:flex-nowrap lg:p-0">
            @include('components.icon-card')
            @include('components.icon-card')
            @include('components.icon-card')
        </div>
    </div>
</div>
