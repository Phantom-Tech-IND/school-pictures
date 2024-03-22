<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen bg-gray-100" oncontextmenu="return false;">
    <div class="container h-screen px-4 py-8 mx-auto">
        <div class="max-w-md p-8 mx-auto overflow-hidden bg-white shadow-md rounded-xl">
            <h1 class="text-2xl font-bold">Upload pictures</h1>
            <p class="mt-4 text-gray-600">Upload pictures of the student to be used in the student's profile.</p>
            <form id="folderUploadForm" class="mt-4">
                <div id="dragArea"
                    class="p-10 text-center text-gray-400 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:border-gray-400 hover:text-gray-600">
                    Drag and drop folders here or <span class="text-blue-600 underline">click to select</span>
                </div>
                <input type="file" id="folderInput" webkitdirectory directory multiple class="hidden" />
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-700">Upload
                    Folder</button>
            </form>
        </div>
    </div>

    <script>
        const dragArea = document.getElementById('dragArea');
        const folderInput = document.getElementById('folderInput');

        dragArea.addEventListener('click', () => folderInput.click());

        dragArea.addEventListener('dragover', (e) => {
            e.preventDefault(); // Prevent default behavior (Prevent file from being opened)
            dragArea.classList.add('border-gray-400', 'text-gray-600');
        });

        dragArea.addEventListener('dragleave', () => {
            dragArea.classList.remove('border-gray-400', 'text-gray-600');
        });

        dragArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dragArea.classList.remove('border-gray-400', 'text-gray-600');

            // Assign dropped files to the input
            folderInput.files = e.dataTransfer.files;

            // Log information about each file
            console.log("Files to be uploaded:");
            for (const file of folderInput.files) {
                console.log(`File name: ${file.name}, Type: ${file.type}, Size: ${file.size} bytes`);
            }

            // Optional: Automatically submit the form here or handle the files as needed
        });
    </script>
</body>

</html>
