let selectedImages = [];

function selectImage(imageUrl) {
	if (selectedImages.includes(imageUrl)) {
		selectedImages = selectedImages.filter(img => img !== imageUrl);
	} else {
		selectedImages.push(imageUrl);
	}
	updateSelectedImagesList();
}

function updateSelectedImagesList() {
	const listElement = document.getElementById('selectedImagesList');
	listElement.innerHTML = ''; // Clear current list
	selectedImages.forEach(image => {
		const imgElement = document.createElement('img');
		imgElement.src = image;
		imgElement.alt = '{{ \App\Constants\Constants::KINDERGARDEN_ALT_TEXT }}';
		imgElement.classList.add('w-20', 'h-20', 'object-cover');
		listElement.appendChild(imgElement);
	});
}

window.selectImage = selectImage;