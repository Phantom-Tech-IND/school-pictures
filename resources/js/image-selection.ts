import { v4 as uuid } from 'uuid';

export function createImageSelection(galleryId: string = uuid(), selectedImages: Record<string, URL[]> = {}) {
    let currentGalleryId = galleryId;
    let imagesSelection = selectedImages;

    const getGalleryId = (): string => currentGalleryId;

    const toggleImageSelection = (imageUrl: URL): void => {
        imagesSelection[currentGalleryId] = imagesSelection[currentGalleryId] || [];
        const imageIndex = imagesSelection[currentGalleryId].indexOf(imageUrl);

        if (imageIndex > -1) {
            imagesSelection[currentGalleryId].splice(imageIndex, 1);
        } else {
            imagesSelection[currentGalleryId].push(imageUrl);
        }

        refreshSelectedImagesDisplay();
    };

    const refreshSelectedImagesDisplay = (): void => {
        const listElementId = `selectedImagesList_${getGalleryId()}`;
        const listElement = document.getElementById(listElementId);

        if (!listElement) {
            console.error('List element not found:', listElementId);
            return;
        }

        clearElementChildren(listElement);
        appendSelectedImagesToListElement(listElement, imagesSelection[currentGalleryId]);
    };

    const clearElementChildren = (element: HTMLElement): void => {
        element.innerHTML = '';
    };

    const appendSelectedImagesToListElement = (listElement: HTMLElement, images: URL[]): void => {
        images.forEach(imageUrl => {
            const imgElement = createImageElement(imageUrl);
            listElement.appendChild(imgElement);
        });
    };

    const createImageElement = (imageUrl: URL): HTMLImageElement => {
        const imgElement = document.createElement('img');
        imgElement.src = imageUrl.toString();
        imgElement.alt = 'Selected Image';
        imgElement.classList.add('w-20', 'h-20', 'object-cover');
        return imgElement;
    };

    return { toggleImageSelection };
}

const exampleGallery = document.getElementById('gallery1');
const jsonData = JSON.parse(exampleGallery?.dataset?.productImages!)

const imageSelection = createImageSelection();
console.log(imageSelection);