<div class="flex flex-col items-center justify-center w-full p-8 bg-darkgrey">
    {{-- <div class="w-[70px] h-[70px]">
        <x-heroicon-o-academic-cap class="text-custom-green" style="width: 100%; height: 100%; color: #94c11c" />
    </div> --}}
    <h2 class="mt-4 text-xl text-center text-white">{{ $title }}</h2>
    <hr style="margin-bottom: 20px; width: 50%; border-color: #94c11c;">
    {{-- <p class="mt-2 text-sm italic font-light text-white">{{ $heading }}</p> --}}
    <p class="mt-4 text-sm font-light text-center text-white">
        {!! $description !!}
    </p>
</div>
