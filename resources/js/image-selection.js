class ImageGalleryContainer extends HTMLElement {
	constructor() {
		super();
		this.selectedImages = [];
	}

	connectedCallback() {
		this.innerHTML = `<slot></slot>`;
		this.addEventListener('image-selected', (e) => {
			const { detail: { src, selected } } = e;
			if (selected) {
				if (!this.selectedImages.includes(src)) {
					this.selectedImages.push(src);
				}
			} else {
				this.selectedImages = this.selectedImages.filter(image => image !== src);
			}
			this.updateDisplays();
		});
	}

	updateDisplays() {
		const displays = this.querySelectorAll('image-display[container-id="' + this.id + '"]');
		displays.forEach(display => {
			display.updateImages(this.selectedImages);
		});
	}
}

// Define ImageSelector: Represents an individual selectable image
class ImageSelector extends HTMLElement {
	static get observedAttributes() {
		return ['src', 'alt', 'class', 'container-id'];
	}

	constructor() {
		super();
		this.selected = false;
	}

	connectedCallback() {
		this.render();
		this.addEventListener('click', () => {
			this.toggleSelection();
		});
		this.checkContainerId();
	}

	attributeChangedCallback(name, oldValue, newValue) {
		this.render();
	}

	render() {
		const src = this.getAttribute('src') || '';
		const alt = this.getAttribute('alt') || '';
		const defaultClassAttr = 'object-cover w-full h-48 transition duration-300 ease-in-out transform rounded-lg hover:scale-105';
		const providedClassAttr = this.getAttribute('class') || '';
		const combinedClassAttr = `${providedClassAttr} ${defaultClassAttr}`.trim();
		this.innerHTML = `
					<div class="border cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none" style="outline-offset: 2px;">
							<img id="image" src="${src}" alt="${alt}" class="${combinedClassAttr}">
					</div>
			`;
	}

	toggleSelection() {
		this.selected = !this.selected;
		this.dispatchEvent(new CustomEvent('image-selected', {
			bubbles: true,
			detail: { src: this.getAttribute('src'), selected: this.selected }
		}));
	}

	checkContainerId() {
		const containerId = this.getAttribute('container-id');
		if (containerId) {
			const container = document.querySelector(`image-gallery-container#${containerId}`);
			if (!container) {
				console.error('ImageSelector must be inside an ImageGalleryContainer with a matching "container-id".');
				this.remove(); // Remove or disable functionality as needed
			}
		} else {
			console.warn('ImageSelector needs a valid "container-id" to function.');
		}
	}
}

// Define ImageDisplay: Displays selected images
class ImageDisplay extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback() {
		this.render();
		this.checkContainerId();
	}

	attributeChangedCallback(name, oldValue, newValue) {
		if (name === 'class' || name === 'container-id') {
			this.render();
		}
	}

	static get observedAttributes() {
		return ['class', 'container-id'];
	}

	render() {
		const defaultClassAttr = 'flex flex-row flex-wrap justify-start gap-4 mt-8';
		const providedClassAttr = this.getAttribute('class') || '';
		const combinedClassAttr = `${providedClassAttr} ${defaultClassAttr}`.trim();
		this.innerHTML = `<div id="selectedImagesList" class="${combinedClassAttr}"></div>`;
	}

	updateImages(images) {
		const container = this.querySelector('#selectedImagesList');
		container.innerHTML = '';
		images.forEach(src => {
			const img = document.createElement('img');
			img.src = src;
			img.classList.add('w-20', 'h-20', 'object-cover');
			container.appendChild(img);
		});
	}

	checkContainerId() {
		const containerId = this.getAttribute('container-id');
		if (containerId) {
			const container = document.querySelector(`image-gallery-container#${containerId}`);
			if (!container) {
				console.error('ImageDisplay must be inside an ImageGalleryContainer with a matching "container-id".');
				this.innerHTML = ''; // Clear content or adjust as necessary
			}
		} else {
			console.warn('ImageDisplay needs a valid "container-id" to function.');
		}
	}
}

// Register custom elements
document.dispatchEvent(new CustomEvent('custom-elements-loaded'));

customElements.define('image-gallery-container', ImageGalleryContainer);
customElements.define('image-selector', ImageSelector);
customElements.define('image-display', ImageDisplay);

console.log('Image selection JS loaded');

