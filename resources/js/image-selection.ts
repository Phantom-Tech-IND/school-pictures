import { v4 as uuid } from 'uuid';

class ImageSelection {
    private _galleryId: string = uuid();

    selectedImages: Record<string, URL[]>;

    constructor(
        galleryId = uuid(),
        selectedImages: Record<string, URL[]> = {}
    ) {
        this._galleryId = galleryId;
        this.selectedImages = selectedImages;
    }

    get bucketId(): string {
        return this._galleryId;
    }

    selectImage(imageUrl: URL) {
        this.selectedImages[this.bucketId] = this.selectedImages[this.bucketId] || [];
        if (this.selectedImages[this.bucketId].includes(imageUrl)) {
            this.selectedImages[this.bucketId] = this.selectedImages[this.bucketId].filter((img: URL) => img !== imageUrl);
        } else {
            this.selectedImages[this.bucketId].push(imageUrl);
        }
        this.updateSelectedImagesList();
    }

    private updateSelectedImagesList() {
        const listElement = document.getElementById('selectedImagesList_' + this.bucketId);
        if (!listElement) {
            throw new Error('Invalid bucket id');
        }
        this.selectedImages[this.bucketId].forEach(image => {
            const imgElement = document.createElement('img');
            imgElement.src = image.toString();
            imgElement.alt = 'Selected Image';
            imgElement.classList.add('w-20', 'h-20', 'object-cover');
            listElement.appendChild(imgElement);
        });
    }
}

export default ImageSelection;
