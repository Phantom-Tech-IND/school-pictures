@component('mail::message')
    # {{ $mailMessage['subject'] }}

    @foreach ($mailMessage['introLines'] as $line)
        {{ $line }}
    @endforeach

    Thanks,
    {{ config('app.name') }}
@endcomponent
