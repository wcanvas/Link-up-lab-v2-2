import ACFBlock from '../../assets/js/utils/blocks';

/**
 * 50-50 Block - Client-side functionality
 */
class FiftyFiftyView {
	constructor(block) {
		this.block = block;

		// The source component has no interactive elements,
		// so the init method is intentionally left empty.
		this.init();
	}

	static getName() {
		return '50-50';
	}

	init() {
		// No client-side interactions needed for this block.
	}
}

new ACFBlock(FiftyFiftyView);