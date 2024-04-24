export class ImageGalleryContainer extends HTMLElement {
    constructor() {
        super();
        // Check if 'data-min' and 'data-max' attributes are provided, otherwise log a warning
        const minAttribute = this.getAttribute('data-min');
        const maxAttribute = this.getAttribute('data-max');

        if (minAttribute === null) {
            console.warn('ImageGalleryContainer warning: "data-min" attribute is missing. It is required for proper functionality.');
        }
        if (maxAttribute === null) {
            console.warn('ImageGalleryContainer warning: "data-max" attribute is missing. It is required for proper functionality.');
        }

        // Initialize min and max attributes with default values if not provided
        this.min = minAttribute || 1; // Default minimum
        this.max = maxAttribute || Infinity; // Default maximum
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
                // Only attempt to add the image if it's not already selected
                if (!selectedImages.includes(key)) {
                    // Check if the maximum number of images has been reached
                    if (selectedImages.length >= this.max) {
                        console.warn(`ImageGalleryContainer warning: Cannot select more than ${this.max} images.`);
                        // Prevent the image from being selected if the maximum has been reached
                        // This might require ensuring the image selector component reflects this state appropriately
                        return; // Do not add the image if the maximum has been reached
                    }
                    selectedImages.push(key);
                }
            } else {
                // Always allow deselection without a warning
                selectedImages = selectedImages.filter((imageKey) => imageKey !== key);
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
                    imageSelector.updateSelectionVisuals(); // Ensure visual update is called
                }
            }
        });
        this.addEventListener("update-order", (e) => {
            const { detail: { newOrder } } = e;
            this.updateSelectedImagesOrder(newOrder);
            this.updateDisplays();
        });
    }

    static get observedAttributes() {
        return ["data-min", "data-max"];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if (name === "data-min") {
            this.min = parseInt(newValue, 10);
            this.updateDisplays(); // Refresh display if needed
        } else if (name === "data-max") {
            this.max = parseInt(newValue, 10);
            this.updateDisplays(); // Refresh display if needed
        }
    }

    updateSelectedImagesOrder(newOrder) {
        // Assuming newOrder is an array of keys representing the new order of images
        this.setSelectedImages(newOrder);
    }

    updateDisplays() {
        const displays = this.querySelectorAll('image-display[container-id="' + this.id + '"]');
        const selectedImages = this.getSelectedImagesSrc();
        const maxAllowed = parseInt(this.getAttribute('data-max'), 10) || Infinity; // Use max attribute
        const placeholdersNeeded = Math.max(0, maxAllowed - selectedImages.length); // Calculate placeholders based on max

        displays.forEach((display) => {
            if (typeof display.updateImages === "function") {
                display.updateImages(selectedImages, placeholdersNeeded);
            } else {
                // console.error('TypeError: display.updateImages is not a function. Check the implementation of the components being iterated.');
            }
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

    updateProductSelection() {
        const selectElement = document.getElementById('productSelect');
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const min = selectedOption.getAttribute('data-min');
        const max = selectedOption.getAttribute('data-max');
    
        updateImageGalleryConstraints(min, max);
    }
    
    updateImageGalleryConstraints(min, max) {
        const galleryContainer = document.querySelector('image-gallery-container');
        if (galleryContainer) {
            galleryContainer.setAttribute('data-min', min);
            galleryContainer.setAttribute('data-max', max);
            // Optionally, refresh the gallery to apply the new constraints
            galleryContainer.updateDisplays(); // Assuming you have such a method
        }
    }
}
