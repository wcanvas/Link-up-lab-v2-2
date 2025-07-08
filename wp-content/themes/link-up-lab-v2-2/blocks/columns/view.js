import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Columns Block - Client-side functionality
 */
class ColumnsView {
	constructor(block) {
		this.block = block;
		// The init method is called automatically by the ACFBlock utility
	}

	static getName() {
		return 'columns';
	}

	/**
	 * Fired when the block is initialized.
	 * This function is called when the block is loaded on the page.
	 */
	init() {
		// This block has no client-side interactions to initialize.
		// All content is rendered via PHP.
	}
}

new ACFBlock(ColumnsView);