<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen bg-gray-100" oncontextmenu="return false;">
    <div class="container h-screen px-4 py-8 mx-auto">
        <div class="max-w-md p-8 mx-auto overflow-hidden bg-white shadow-md rounded-xl">
            @if (is_null($student))
                <h1 class="mb-4 text-2xl font-bold">Search for a Student</h1>
                <form action="" method="GET" class="mb-6">
                    <input class="w-full p-2 border border-gray-300 rounded-md" type="text" name="search"
                        placeholder="Enter student code" aria-label="Search">
                    <input class="w-full p-2 mt-2 border border-gray-300 rounded-md" type="date" name="birth_date"
                        placeholder="Enter birth date" aria-label="Birth Date" required>
                    <button class="w-full px-4 py-2 mt-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                        type="submit">
                        Search
                    </button>
                </form>
            @endif
            @if ($student)
                <div class="text-lg">
                    <p><strong>Name:</strong> {{ $student->name }}</p>
                    <p><strong>Birth Date:</strong> {{ $student->birth_date }}</p>
                    <!-- Display student photos -->

                    @if ($student)
                        {{-- Debugging: Output the count of photos --}}
                        <p>Photos count: {{ $student->photos->count() }}</p>

                        @if ($student->photos->isNotEmpty())
                            <div class="mt-4">
                                <h2 class="mb-2 text-xl font-bold">Photos</h2>
                                @foreach ($student->photos as $photo)
                                    <img src="{{ asset('storage/' . $photo->photo_path) }}"
                                        alt="Photo of {{ $student->name }}" class="mb-2 rounded-lg"
                                        style="max-width: 100%; height: auto;">
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
            @else
                @if (request()->has('search'))
                    <p class="text-red-500">No student found.</p>
                @endif
            @endif


        </div>
        {{-- Below the student search results --}}
        @if ($products->isNotEmpty())
            <div class="mt-8">
                <h2 class="mb-4 text-2xl font-bold">Products</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    @foreach ($products as $product)
                        <div class="p-4 bg-white rounded-lg shadow">
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="Photo of {{ $product->name }}"
                                class="mb-2 rounded-lg" style="max-width: 100%; height: auto;">
                            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                            <p class="mt-2 font-bold">${{ number_format($product->price, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</body>

</html>
