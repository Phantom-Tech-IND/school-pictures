<x-filament-panels::page>
    <div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <form wire:submit.prevent="uploadPhotos">
        <input type="file" wire:model="photos" multiple x-ref="input" webkitdirectory directory mozdirectory>
        
        <div
        x-on:drop.prevent="$refs.input.files = $event.dataTransfer.files"
        x-on:dragover.prevent style="border: 2px dashed gray; padding: 20px;">
            Drag and drop files here
        </div>

        <button type="submit">Upload</button>
    </form>

    <div x-show="isUploading">
        Uploading... <progress max="100" x-bind:value="progress"></progress>
    </div>
</div>
</x-filament-panels::page>
