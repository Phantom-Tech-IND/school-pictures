export class ImageGalleryContainer extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        if (!this.id) {
            console.error(
                'ImageGalleryContainer error: "id" attribute is missing. Each ImageGalleryContainer requires an "id" to function properly.'
            );
            return; // Exit the function if there's no id
        }
        this.classList.add("block"); // the default is inline
        this.addEventListener("image-selected", (e) => {
            const {
                detail: { src, selected, key },
            } = e;
            let selectedImages = this.getSelectedImages();
            if (selected) {
                if (!selectedImages.includes(key)) {
                    selectedImages.push(key);
                }
            } else {
                selectedImages = selectedImages.filter(
                    (imageKey) => imageKey !== key
                );
            }
            this.setSelectedImages(selectedImages);
            this.updateDisplays();
        });
    }

    updateDisplays() {
        const displays = this.querySelectorAll(
            'image-display[container-id="' + this.id + '"]'
        );
        displays.forEach((display) => {
            const selectedImagesSrc = this.getSelectedImagesSrc();
            display.updateImages(selectedImagesSrc);
        });
    }

    getSelectedImages() {
        const selectedImages = this.getAttribute("data-selected-images");
        return selectedImages ? JSON.parse(selectedImages) : [];
    }

    setSelectedImages(selectedImages) {
        this.setAttribute(
            "data-selected-images",
            JSON.stringify(selectedImages)
        );
    }

    getSelectedImagesSrc() {
        const selectedKeys = this.getSelectedImages();
        return Array.from(this.querySelectorAll("image-selector"))
            .filter((selector) =>
                selectedKeys.includes(selector.getAttribute("key"))
            )
            .map((selector) => selector.getAttribute("src"));
    }
}
