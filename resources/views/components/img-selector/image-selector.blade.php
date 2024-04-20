@once
<script>
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
</script>
@endonce

