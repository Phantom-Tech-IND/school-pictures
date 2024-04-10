<div class="w-full h-[400px] relative bg-cover bg-center" style="background-image: url('{{ $image }}');">
    <div class="absolute inset-0 w-full h-full bg-black bg-opacity-30">
    </div>
    <!-- Adjust the positioning classes here -->
    <div class="absolute bottom-0 left-0 right-0 z-10 flex flex-col justify-end h-full p-5 text-4xl text-white">
        <div class="block w-full px-4 py-12 mx-auto md:p-12 max-w-7xl">
            <h1 class="font-semibold uppercase">{{ $title }}</h1>
        </div>
    </div>
</div>
