import ACFBlock from '../../assets/js/utils/blocks';

/**
 * HeroBanner - Client-side functionality
 */
class HeroBannerView {
	constructor(block) {
		this.block = block;

		this.init();
	}

	static getName() {
		return 'hero-banner';
	}

	init() {
		// This block is purely presentational and does not require any JavaScript for interactivity.
		// All behaviors are handled by CSS and default browser actions (e.g., link navigation).
	}
}

new ACFBlock(HeroBannerView);