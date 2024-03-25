<x-filament-panels::page>
    <form wire:submit.prevent="uploadPhotos" x-on:submit="console.log('Submitting form...')">
        <div x-data="{ files: [] }" x-on:dragover.prevent
            x-on:drop.prevent="files = $event.dataTransfer.files; console.log('Files dropped:', files); $wire.set('photos', files)"
            class="flex flex-col items-center justify-center py-12 border border-4 border-blue-300 border-dashed h-96">
            <p>Drag and drop files here</p>
            <input type="file" wire:model="photos" multiple mozdirectory webkitdirectory directory class="hidden">
        </div>
        <button type="submit"
            class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-700">Upload</button>
    </form>
</x-filament-panels::page>
