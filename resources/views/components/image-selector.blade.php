@once
    <script>
        class ImageGalleryContainer extends HTMLElement {
            constructor() {
                super();
            }

            connectedCallback() {
                if (!this.id) {
                    console.error('ImageGalleryContainer error: "id" attribute is missing. Each ImageGalleryContainer requires an "id" to function properly.');
                    return; // Exit the function if there's no id
                }
                this.classList.add('block'); // the default is inline
                this.addEventListener('image-selected', (e) => {
                    const {
                        detail: {
                            src,
                            selected,
                            key
                        }
                    } = e;
                    let selectedImages = this.getSelectedImages();
                    if (selected) {
                        if (!selectedImages.includes(key)) {
                            selectedImages.push(key);
                        }
                    } else {
                        selectedImages = selectedImages.filter(imageKey => imageKey !== key);
                    }
                    this.setSelectedImages(selectedImages);
                    this.updateDisplays();
                });
            }

            updateDisplays() {
                const displays = this.querySelectorAll('image-display[container-id="' + this.id + '"]');
                displays.forEach(display => {
                    const selectedImagesSrc = this.getSelectedImagesSrc();
                    display.updateImages(selectedImagesSrc);
                });
            }

            getSelectedImages() {
                const selectedImages = this.getAttribute('data-selected-images');
                return selectedImages ? JSON.parse(selectedImages) : [];
            }

            setSelectedImages(selectedImages) {
                this.setAttribute('data-selected-images', JSON.stringify(selectedImages));
            }

            getSelectedImagesSrc() {
                const selectedKeys = this.getSelectedImages();
                return Array.from(this.querySelectorAll('image-selector'))
                    .filter(selector => selectedKeys.includes(selector.getAttribute('key')))
                    .map(selector => selector.getAttribute('src'));
            }
        }

        class ImageSelector extends HTMLElement {
            static get observedAttributes() {
                return ['src', 'alt', 'container-id', 'key', 'selected'];
            }

            constructor() {
                super();
                this.selected = false;
            }

            connectedCallback() {
                this.classList.add('block'); // the default is inline
                this.render();
                this.addEventListener('click', () => {
                    this.toggleSelection();
                });
                this.checkContainerId();
            }

            attributeChangedCallback(name, oldValue, newValue) {
                // Check if the new value is different to prevent unnecessary updates
                if (newValue !== oldValue) {
                    if (['src', 'alt', 'key'].includes(name)) {
                        this.render();
                    }
                    if (name === 'selected') {
                        // Update the selected state based on the attribute, but avoid re-rendering if it's already correct
                        const isSelected = this.hasAttribute('selected');
                        if (this.selected !== isSelected) {
                            this.selected = isSelected;
                            this.render(); // Only re-render if the selected state actually changed
                        }
                    }
                }
            }

            render() {
                const template = document.getElementById('image-selector-template');
                const instance = template.content.cloneNode(true);
                const img = instance.querySelector('img');
                img.src = this.getAttribute('src') || '';
                img.alt = this.getAttribute('alt') || '';
                img.setAttribute('key', this.getAttribute('key'));
                this.innerHTML = '';
                this.appendChild(instance);
                // Directly reflect the selected state on the element
                if (this.selected) {
                    this.setAttribute('selected', '');
                } else {
                    this.removeAttribute('selected');
                }
            }

            toggleSelection() {
                this.selected = !this.selected;
                // Use setAttribute/removeAttribute directly to avoid re-triggering attributeChangedCallback unnecessarily
                if (this.selected) {
                    this.setAttribute('selected', '');
                } else {
                    this.removeAttribute('selected');
                }
                this.dispatchEvent(new CustomEvent('image-selected', {
                    bubbles: true,
                    detail: {
                        src: this.getAttribute('src'),
                        selected: this.selected,
                        key: this.getAttribute('key')
                    }
                }));
            }

            checkContainerId() {
                const containerId = this.getAttribute('container-id');
                if (!containerId) {
                    console.error(
                        'ImageSelector error: "container-id" attribute is missing. Each ImageSelector requires a "container-id" attribute that matches the ID of its parent ImageGalleryContainer.'
                    );
                    return; // Exit the function if there's no container ID to check against
                }

                const container = document.querySelector(`image-gallery-container#${containerId}`);
                if (!container) {
                    console.warn(
                        `ImageSelector warning: No ImageGalleryContainer found with ID "${containerId}". Ensure that an ImageGalleryContainer with this ID exists and that the "container-id" attribute of this ImageSelector correctly references it.`
                    );
                }
            }
        }

        class ImageDisplay extends HTMLElement {
            constructor() {
                super();
            }

            connectedCallback() {
                this.classList.add('block'); // the default is inline
                this.render();
                this.checkContainerId();
            }

            attributeChangedCallback(name, oldValue, newValue) {
                if (name === 'container-id') {
                    this.render();
                }
            }

            static get observedAttributes() {
                return ['container-id'];
            }

            render() {
                const template = document.getElementById('image-display-template');
                const instance = template.content.cloneNode(true); // Deep clone the template
                this.innerHTML = ''; // Clear current content
                this.appendChild(instance);
            }

            updateImages(imagesSrc) {
                const container = this.querySelector('#selectedImagesList');
                container.innerHTML = ''; // Clear existing images
                imagesSrc.forEach(src => {
                    const img = document.createElement('img');
                    img.src = src;
                    img.classList.add('w-20', 'h-20', 'object-cover');
                    container.appendChild(img);
                });
            }

            checkContainerId() {
                const containerId = this.getAttribute('container-id');
                if (!containerId) {
                    console.error('ImageDisplay needs a valid "container-id" to function.');
                    return;
                }

                const container = document.querySelector(`image-gallery-container#${containerId}`);
                if (!container) {
                    console.warn(
                        `ImageDisplay warning: No ImageGalleryContainer found with ID "${containerId}". Ensure that an ImageGalleryContainer with this ID exists and that the "container-id" attribute of this ImageDisplay correctly references it.`
                    );
                }
            }
        }

        customElements.define('image-gallery-container', ImageGalleryContainer);
        customElements.define('image-selector', ImageSelector);
        customElements.define('image-display', ImageDisplay);
    </script>
@endonce

<template id="image-selector-template">
    <div class="border cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none">
        <img id="image"
            class="object-cover w-full h-48 transition duration-300 ease-in-out transform rounded-lg hover:scale-105">
    </div>
</template>

<template id="image-display-template">
    <div id="selectedImagesList" class="flex flex-row flex-wrap justify-start gap-4 mt-8"></div>
</template>
