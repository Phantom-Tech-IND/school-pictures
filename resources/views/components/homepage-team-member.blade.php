<div class="w-full md:w-1/3">
    <div class="flex flex-col items-center mb-6 bg-white lg:p-4 ">
        <img class="w-full mb-4 shadow-lg" src="{{ asset($team['image']) }}" alt="{{ $team['name'] }}">
        <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $team['name'] }}</h5>
        <p class="mt-4 mb-3 text-center text-gray-500">{{ $team['text'] }}</p>
    </div>
</div>
