@if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if(isset($paymentUrl))
        <p>Payment URL: <a href="{{ $paymentUrl }}" target="_blank">{{ $paymentUrl }}</a></p>
    @endif