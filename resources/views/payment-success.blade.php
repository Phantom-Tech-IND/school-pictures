@extends('layouts.app')
@section('content')
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <div class="lg:py-24 px-4 -mb-8 sm:px-6 lg:px-8">
        <div class="relative w-full min-w-0 pt-1 -mb-48 overflow-x-hidden pointer-events-none h-96">
            <dotlottie-player src="https://lottie.host/f23675e0-dcd7-45d3-be1f-23ff7fd0209c/h1V2YckOAO.json"
                background="transparent" speed="1"
                class="absolute left-[50%] translate-x-[-50%] -top-24 w-96 h-96 sm:w-72 sm:h-72 md:w-96 md:h-96" autoplay>
            </dotlottie-player>
        </div>
        <h1
            class="pb-2 text-2xl font-semibold text-center xs:pb-3 md:pb-4 lg:pb-6 xl:pb-8 xs:text-3xl text-accent sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl">
            Payment Successful</h1>
        <p class="text-center text-normal sm:text-md md:text-lg lg:text-xl xl:text-2xl">
            Thanks for making a purchase.<br />
            You will receive an email with the confirmation.
            <x-feathericon-mail class="inline-block -mt-2" />
        </p>
        <div class="mt-4 text-center">
            <a href="{{ route('gallery-code') }}"
                class="inline-block px-4 py-2 mt-6 text-xs text-white rounded sm:px-6 sm:py-3 sm:mt-8 sm:text-sm bg-accent hover:bg-accent-600">
                Go back to main page
            </a>
        </div>
    </div>
@endsection
