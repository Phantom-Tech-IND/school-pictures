<div class="w-full p-4 md:w-1/3">
    <div class="flex flex-col items-center p-4 bg-white ">
        <img class="w-full mb-4 shadow-lg" src="{{ asset($team['image']) }}" alt="{{ $team['name'] }}">
        <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $team['name'] }}</h5>
        <p class="mt-4 mb-3 text-center text-gray-500">{{ $team['text'] }}</p>
    </div>
</div>
