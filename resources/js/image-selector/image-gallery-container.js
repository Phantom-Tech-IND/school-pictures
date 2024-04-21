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
        this.addEventListener("remove-image", (e) => {
            const { detail: { key } } = e;
            let selectedImages = this.getSelectedImages();
            const indexToRemove = selectedImages.findIndex(selectedKey => selectedKey === key);
            if (indexToRemove !== -1) {
                selectedImages.splice(indexToRemove, 1); // Remove the image by key
                this.setSelectedImages(selectedImages);
                this.updateDisplays();

                // Find the corresponding ImageSelector and update its selected state
                const imageSelector = this.querySelector(`image-selector[key="${key}"]`);
                if (imageSelector) {
                    imageSelector.selected = false; // Update internal state
                    imageSelector.removeAttribute("selected"); // Update attribute to reflect the change
                }
            }
        });
    }

    updateDisplays() {
        const displays = this.querySelectorAll(
            'image-display[container-id="' + this.id + '"]'
        );
        displays.forEach((display) => {
            const selectedImages = this.getSelectedImagesSrc();
            display.updateImages(selectedImages);
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
        return selectedKeys.map(key => 
            Array.from(this.querySelectorAll("image-selector"))
                .find(selector => selector.getAttribute("key") === key)
        )
        .filter(selector => selector) // Filter out any null results in case of missing selectors
        .map(selector => ({
            src: selector.getAttribute("src"),
            key: selector.getAttribute("key")
        }));
    }
}
