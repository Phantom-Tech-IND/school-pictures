export class ImageDisplay extends HTMLElement {
    constructor() {
        super();
        this.draggedItem = null; // To keep track of the item being dragged
    }

    connectedCallback() {
        this.classList.add("block"); // the default is inline
        this.render();
        this.checkContainerId();
        this.addEventListener('dragover', (e) => this.handleDragOver(e));
        this.addEventListener('drop', (e) => this.handleDrop(e));

        // Fetch the associated ImageGalleryContainer
        const containerId = this.getAttribute("container-id");
        const container = document.querySelector(`image-gallery-container#${containerId}`);
        if (container) {
            // Calculate placeholders needed based on the 'data-max' attribute and current selected images
            const maxAllowed = parseInt(container.getAttribute('data-max'), 10) || Infinity;
            const selectedImages = container.getSelectedImagesSrc ? container.getSelectedImagesSrc() : [];
            const placeholdersNeeded = Math.max(0, maxAllowed - selectedImages.length);
            // Initialize display with the required number of placeholders
            this.updateImages([], placeholdersNeeded);
        }
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if (name === "container-id") {
            this.render();
        }
    }

    static get observedAttributes() {
        return ["container-id"];
    }

    render() {
        const template = document.getElementById("image-display-template");
        const instance = template.content.cloneNode(true); // Deep clone the template
        this.innerHTML = ""; // Clear current content
        this.appendChild(instance);
    }

    updateImages(images, placeholdersNeeded = 0) {
        const container = this.querySelector("#selectedImagesList");
        container.innerHTML = ""; // Clear existing images and placeholders
        const imageTemplate = document.getElementById("image-template");

        images.forEach(({ src, key }, index) => {
            const instance = imageTemplate.content.cloneNode(true);
            const img = instance.querySelector("img");
            const button = instance.querySelector("button");
            img.src = src;
            img.setAttribute("draggable", true);
            img.setAttribute("data-key", key);
            img.setAttribute("data-index", index); // Track the index for reordering
            img.style.cursor = "grab"; // Change cursor to indicate draggable
            img.addEventListener("dragstart", (e) => {
                this.handleDragStart(e, key);
                e.target.style.cursor = "grabbing"; // Change cursor on drag start
                e.target.style.opacity = '0.5'; // Make the image more transparent when dragged
            });
            img.addEventListener("dragend", (e) => {
                e.target.style.cursor = "grab"; // Revert cursor on drag end
                e.target.style.opacity = '1'; // Revert opacity on drag end
            });
            button.addEventListener("click", (e) => {
                e.stopPropagation();
                this.removeImage(key); // Use key to identify the image to remove
            });
            container.appendChild(instance);
        });

        // Render placeholders if needed
        const placeholderTemplate = document.getElementById("image-placeholder-template");
        for (let i = 0; i < placeholdersNeeded; i++) {
            const instance = placeholderTemplate.content.cloneNode(true);
            const placeholderText = instance.querySelector(".placeholder-text");
            placeholderText.textContent = `${images.length + i + 1}`; // Display index number
            container.appendChild(instance);
        }
    }

    handleDragStart(e, key) {
        this.draggedItem = e.target;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/plain', key); // Use the key as the drag data
        e.target.style.opacity = '0.5'; // Make the image more transparent when dragged
    }

    handleDragOver(e) {
        e.preventDefault(); // Necessary to allow dropping
        e.dataTransfer.dropEffect = 'move';
    }

    handleDrop(e) {
        e.preventDefault();
        if (e.target.tagName === 'IMG' && this.draggedItem !== e.target) {
            const draggedIndex = parseInt(this.draggedItem.getAttribute('data-index'), 10);
            const targetIndex = parseInt(e.target.getAttribute('data-index'), 10);
            this.reorderImages(draggedIndex, targetIndex);
        }
    }

    reorderImages(draggedIndex, targetIndex) {
        const container = this.querySelector("#selectedImagesList");
        let images = Array.from(container.querySelectorAll("img"));
        // Reorder the array based on the drag and drop
        const draggedItem = images.splice(draggedIndex, 1)[0];
        images.splice(targetIndex, 0, draggedItem);

        // Update the DOM to reflect the new order
        container.innerHTML = "";
        images.forEach((img, index) => {
            img.setAttribute('data-index', index); // Update the index after reordering
            container.appendChild(img.parentNode); // Assuming img is wrapped in a div or similar
        });

        // Notify the container to update the order
        this.dispatchEvent(new CustomEvent("update-order", {
            bubbles: true,
            detail: { newOrder: images.map(img => img.getAttribute('data-key')) }
        }));
    }

    removeImage(key) {
        this.dispatchEvent(new CustomEvent("remove-image", {
            bubbles: true,
            detail: { key }
        }));
    }

    checkContainerId() {
        const containerId = this.getAttribute("container-id");
        if (!containerId) {
            console.error(
                'ImageDisplay needs a valid "container-id" to function.'
            );
            return;
        }

        const container = document.querySelector(
            `image-gallery-container#${containerId}`
        );
        if (!container) {
            console.warn(
                `ImageDisplay warning: No ImageGalleryContainer found with ID "${containerId}". Ensure that an ImageGalleryContainer with this ID exists and that the "container-id" attribute of this ImageDisplay correctly references it.`
            );
        }
    }
}
