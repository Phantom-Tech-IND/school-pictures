export class ImageSelector extends HTMLElement {
    static get observedAttributes() {
        return ["src", "alt", "container-id", "key", "selected"];
    }

    constructor() {
        super();
        this.selected = false;
    }

    connectedCallback() {
        this.classList.add("block"); // the default is inline
        this.style.cursor = "pointer";
        this.render();
        const checkbox = this.querySelector('input[type="checkbox"]');
        checkbox.addEventListener("change", () => {
            this.toggleSelection();
        });
        this.checkContainerId();
    }

    attributeChangedCallback(name, oldValue, newValue) {
        // Check if the new value is different to prevent unnecessary updates
        if (newValue !== oldValue) {
            if (["src", "alt", "key"].includes(name)) {
                this.render();
            }
            if (name === "selected") {
                // Update the selected state based on the attribute, but avoid re-rendering if it's already correct
                const isSelected = this.hasAttribute("selected");
                if (this.selected !== isSelected) {
                    this.selected = isSelected;
                    this.render(); // Only re-render if the selected state actually changed
                }
            }
        }
    }

    render() {
        const template = document.getElementById("image-selector-template");
        const instance = template.content.cloneNode(true);
        const img = instance.querySelector("img");
        img.src = this.getAttribute("src") || "";
        img.alt = this.getAttribute("alt") || "";
        img.setAttribute("key", this.getAttribute("key"));
        const checkbox = instance.querySelector('input[type="checkbox"]');
        checkbox.checked = this.selected;
        this.innerHTML = "";
        this.appendChild(instance);
        this.updateSelectionVisuals(); // Update visual indicators for selection
    }

    toggleSelection() {
        const containerId = this.getAttribute("container-id");
        const container = document.querySelector(`image-gallery-container#${containerId}`);
        if (!container) {
            console.error(`ImageSelector error: No ImageGalleryContainer found with ID "${containerId}".`);
            return;
        }

        // Check if the maximum number of selections has been reached
        const maxAllowed = parseInt(container.getAttribute('data-max'), 10) || Infinity;
        const currentSelectedCount = container.getSelectedImages().length;

        if (!this.selected && currentSelectedCount >= maxAllowed) {
            console.warn(`ImageGalleryContainer warning: Cannot select more than ${maxAllowed} images.`);
            return; // Prevent selection if the maximum has been reached
        }

        this.selected = !this.selected;
        const checkbox = this.querySelector('input[type="checkbox"]');
        checkbox.checked = this.selected;
        this.updateSelectionVisuals();

        this.dispatchEvent(new CustomEvent(this.selected ? "image-selected" : "remove-image", {
            bubbles: true,
            detail: {
                src: this.getAttribute("src"),
                selected: this.selected,
                key: this.getAttribute("key"),
            },
        }));
    }

    updateSelectionVisuals() {
        const label = this.querySelector('label');
        if (this.selected) {
            label.classList.add("border-accent-500");
            label.classList.remove("hover:border-accent-300");
            this.setAttribute("selected", "");
        } else {
            label.classList.remove("border-accent-500");
            label.classList.add("hover:border-accent-300");
            this.removeAttribute("selected");
        }
    }

    checkContainerId() {
        const containerId = this.getAttribute("container-id");
        if (!containerId) {
            console.error(
                'ImageSelector error: "container-id" attribute is missing. Each ImageSelector requires a "container-id" attribute that matches the ID of its parent ImageGalleryContainer.'
            );
            return;
        }

        const container = document.querySelector(
            `image-gallery-container#${containerId}`
        );
        if (!container) {
            console.warn(
                `ImageSelector warning: No ImageGalleryContainer found with ID "${containerId}". Ensure that an ImageGalleryContainer with this ID exists and that the "container-id" attribute of this ImageSelector correctly references it.`
            );
        }
    }
}
