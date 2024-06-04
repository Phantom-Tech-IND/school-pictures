@component('mail::message')
    # {{ $mailMessage['subject'] }}

    @foreach ($mailMessage['introLines'] as $line)
        {{ $line }}
    @endforeach

    Danke,
    {{ config('app.name') }}
@endcomponent
