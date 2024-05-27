@component('mail::message')
    # {{ $mailMessage['subject'] }}

    @foreach ($mailMessage['introLines'] as $line)
        {{ $line }}
    @endforeach

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
