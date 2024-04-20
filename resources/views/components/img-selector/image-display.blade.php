@once
<script>
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
</script>
@endonce

