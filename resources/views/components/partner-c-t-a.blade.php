<div class="mx-auto my-6 max-w-7xl lg:px-8">
    <div
        class="flex p-4 flex-wrap md:flex-nowrap {{ $direction === 'right' ? 'flex-row-reverse' : 'flex-row' }} gap-6 my-6 md:my-20">
        <div class="w-full md:w-1/2">
            <a href="{{ $link }}">
                <img src="{{ asset($image) }}" class="w-full min-h-[400px] object-contain bg-cover" alt=""
                    srcset="">
            </a>
        </div>
        <div class="flex flex-col justify-between w-full py-4 xl:w-1/2">
            <h4 class="mb-4 text-lg font-semibold">{{ $title }}</h4>
            {!! $text !!}
            <a href="{{ $link }}"
                class="block px-4 py-2 mt-12 border-2 border-accent text-accent w-fit btn btn-primary hover:border-primary hover:text-primary">{{ $link }}</a>
        </div>
    </div>
</div>
