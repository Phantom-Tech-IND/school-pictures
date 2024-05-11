@extends('layouts.app')
@section('content')
    <iframe
        class="box-border w-full h-[50vh]"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10861.469461779034!2d8.072933718514744!3d47.111471535971205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478fde276a6f0f23%3A0x5f29a9e362137116!2sGewerbezone%2059%2C%206018%20Buttisholz%2C%20Switzerland!5e0!3m2!1sen!2sro!4v1713497353069!5m2!1sen!2sro"
        style="border:0;" allowfullscreen loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <div class="flex flex-col justify-center m-auto mt-12 lg:flex-row max-w-7xl lg:px-8">
        @include('components.contact-form')
        @include('components.location-info')
    </div>
@endsection
