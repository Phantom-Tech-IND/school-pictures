@extends('layouts.app')
@section('content')
    <iframe
        class="box-border w-full h-screen"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10861.469461779034!2d8.072933718514744!3d47.111471535971205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478fde276a6f0f23%3A0x5f29a9e362137116!2sGewerbezone%2059%2C%206018%20Buttisholz%2C%20Switzerland!5e0!3m2!1sen!2sro!4v1713497353069!5m2!1sen!2sro"
        style="border:0;" allowfullscreen loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <div class="flex flex-col justify-center mt-12 lg:flex-row">
        @include('components.contact-form', ['class' => 'w-full md:w-2/3'])
        @include('components.location-info', ['class' => 'w-full md:w-1/3'])
    </div>
@endsection
