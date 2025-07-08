import ACFBlock from '../../assets/js/utils/blocks';

/**
 * CTA v2 Block - Client-side functionality
 */
class CtaV2View {
	constructor(block) {
		this.block = block;
		this.init();
	}

	static getName() {
		return 'cta-v2';
	}

	init() {
		// No interactive behaviors are required for this block based on the provided React components.
		// The hover effects are handled by CSS.
	}
}

new ACFBlock(CtaV2View);