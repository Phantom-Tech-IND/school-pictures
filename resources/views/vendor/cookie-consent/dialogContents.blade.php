<!-- Cookie Consent Dialog -->
<div class="fixed right-0 z-50 pb-2 bottom-8 js-cookie-consent cookie-consent">
    <div class="max-w-3xl px-6 mx-auto">
        <div class="p-2 bg-gray-100 rounded-lg shadow-2xl">

            <!-- Content Container -->
            <div class="flex flex-col gap-4 px-3 py-4">

                <!-- Title -->
                <h1 class="font-semibold text-md">
                    {!! trans('cookie-consent::texts.title') !!}
                </h1>

                <!-- Consent Message -->
                <p class="overflow-y-auto text-sm cookie-consent__message max-h-48">
                    {!! trans('cookie-consent::texts.message') !!}
                </p>

                <!-- Agree Button -->
                <div class="flex justify-center">
                    <button
                        class="w-full max-w-xs px-4 py-2 mt-2 text-sm font-medium rounded-md cursor-pointer sm:mt-0 text-accent-800 bg-accent-500 js-cookie-consent-agree cookie-consent__agree hover:bg-accent-400">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>

                <!-- Links -->
                <ul class="flex flex-wrap justify-center gap-x-6 gap-y-1">
                    <li>
                        <a href="{{ config('cookie-consent.cookie_policy_url') }}"
                            class="text-accent-800 hover:underline">{!! trans('cookie-consent::texts.cookie_policy') !!}</a>
                    </li>
                    <li>
                        <a href="{{ config('cookie-consent.privacy_policy_url') }}"
                            class="text-accent-800 hover:underline">{!! trans('cookie-consent::texts.privacy_policy') !!}</a>
                    </li>
                    <li>
                        <a href="{{ config('cookie-consent.imprint_url') }}"
                            class="text-accent-800 hover:underline">{!! trans('cookie-consent::texts.imprint') !!}</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
