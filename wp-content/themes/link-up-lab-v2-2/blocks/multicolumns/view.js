import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Multicolumns Block - Client-side functionality
 */
class MulticolumnsView {
	constructor(block) {
		this.block = block;
		this.init();
	}

	static getName() {
		return 'multicolumns';
	}

	init() {
		// No interactive behaviors are specified in the React components.
		// This block is purely for rendering content.
	}
}

new ACFBlock(MulticolumnsView);