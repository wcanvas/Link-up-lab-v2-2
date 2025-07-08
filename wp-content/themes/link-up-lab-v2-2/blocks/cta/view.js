import ACFBlock from '../../assets/js/utils/blocks';

/**
 * CTA Block - Client-side functionality
 */
class CtaView {
	constructor(block) {
		this.block = block;
		this.init();
	}

	static getName() {
		return 'cta';
	}

	init() {
		// This block has no interactive JavaScript elements.
		// All behaviors are handled by CSS (e.g., hover states on links).
	}
}

new ACFBlock(CtaView);