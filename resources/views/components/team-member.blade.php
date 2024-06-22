@php
    use App\Constants\Constants;
@endphp

<li>
    <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="{{ $team['image'] }}" alt="{{ $team['name'] }}">
    <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">{{ $team['name'] }}</h3>
    <p class="text-base leading-7 text-gray-600">{{ $team['role'] }}</p>
</li>
