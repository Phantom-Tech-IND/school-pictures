@php
    use App\Constants\Constants;
@endphp

@extends('layouts.app')

@section('content')
    @include('components.image-selector')
    <div class="w-48 h-48 bg-red-600"></div>

    <image-gallery-container id="myGallery" class="p-4 bg-red-300">
        <div class="grid grid-cols-4 gap-4 bg-blue-400">
            <!-- Image selectors for individual images -->
            <image-selector container-id="myGallery" alt="Image 1" key="key1" src="https://statusneo.com/wp-content/uploads/2023/02/MicrosoftTeams-image551ad57e01403f080a9df51975ac40b6efba82553c323a742b42b1c71c1e45f1.jpg"></image-selector>
            <image-selector container-id="myGallery" alt="Image 2" key="key2" src="https://img.freepik.com/free-photo/colorful-design-with-spiral-design_188544-9588.jpg?size=626&ext=jpg&ga=GA1.1.553209589.1713484800&semt=sph"></image-selector>
            <image-selector container-id="myGallery" alt="Image 3" key="key3" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg"></image-selector>
            <image-selector container-id="myGallery" alt="Image 1" key="key4" src="https://statusneo.com/wp-content/uploads/2023/02/MicrosoftTeams-image551ad57e01403f080a9df51975ac40b6efba82553c323a742b42b1c71c1e45f1.jpg"></image-selector>
            <image-selector container-id="myGallery" alt="Image 2" key="key5" src="https://img.freepik.com/free-photo/colorful-design-with-spiral-design_188544-9588.jpg?size=626&ext=jpg&ga=GA1.1.553209589.1713484800&semt=sph"></image-selector>
            <image-selector container-id="myGallery" alt="Image 3" key="key6" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg"></image-selector>
            <image-selector container-id="myGallery" alt="Image 1" key="key7" src="https://statusneo.com/wp-content/uploads/2023/02/MicrosoftTeams-image551ad57e01403f080a9df51975ac40b6efba82553c323a742b42b1c71c1e45f1.jpg"></image-selector>
            <image-selector container-id="myGallery" alt="Image 2" key="key8" src="https://img.freepik.com/free-photo/colorful-design-with-spiral-design_188544-9588.jpg?size=626&ext=jpg&ga=GA1.1.553209589.1713484800&semt=sph"></image-selector>
            <image-selector container-id="myGallery" alt="Image 3" key="key9" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg"></image-selector>
        </div>
        
        <!-- Display for selected images -->
        <image-display container-id="myGallery" class="bg-green-600"></image-display>
    </image-gallery-container>
@endsection
