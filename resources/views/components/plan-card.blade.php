<div class="p-8 rounded-3xl xl:p-10 {{ isset($badge) ? 'ring-2 ring-accent-700' : 'ring-1 ring-gray-200' }}">

        <h3 id="offer-{{ $offerId }}" class="text-lg font-semibold leading-8
            {{ isset($badge) ? 'text-accent-700' : 'text-gray-900' }}"
        >{{ $title }}
        </h3>
        

    <div class="flex items-start justify-between mt-6 gap-x-1">
        <p>
            <span class="text-4xl font-bold tracking-tight text-gray-900">{{ $price }}</span>
            <span class="text-sm font-semibold leading-6 text-gray-600">CHF</span>
        </p>
        @if (isset($badge))
            <p
                class="rounded-full text-nowrap bg-accent-700/10 px-2.5 py-1 text-xs font-semibold leading-5 text-accent-700">
                {{ $badge }}
            </p>
        @endif
    </div>
    <a href="{{ $offer_url }}" aria-describedby="offer-{{ $offerId }}"
        class="block px-3 py-2 mt-6 text-sm font-semibold leading-6 text-center
            {{ isset($badge) ?
                'text-white bg-accent-700 rounded-md shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent-7000 hover:bg-accent-800' :
                'text-accent-700 rounded-md focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent-700 ring-1 ring-inset ring-accent-500 hover:ring-accent-700'
            }}">Angebot auswählen</a>
    <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 xl:mt-10">
        @foreach ($features as $feature)
            <li class="flex gap-x-3">
                <svg class="flex-none w-5 h-6 text-accent-700" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                        clip-rule="evenodd" />
                </svg>
                {{ $feature }}
            </li>
        @endforeach
    </ul>
</div>
