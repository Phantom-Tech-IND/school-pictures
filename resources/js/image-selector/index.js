import { ImageSelector } from "./image-selector.js";
import { ImageGalleryContainer } from "./image-callery-container.js";
import { ImageDisplay } from "./image-display.js";

customElements.define("image-gallery-container", ImageGalleryContainer);
customElements.define("image-selector", ImageSelector);
customElements.define("image-display", ImageDisplay);

export { ImageSelector, ImageGalleryContainer, ImageDisplay };
