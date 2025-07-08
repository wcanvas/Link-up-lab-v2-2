import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Footer Block - Client-side functionality
 */
class FooterView {
	constructor(block) {
		this.block = block;
		this.init();
	}

	static getName() {
		return 'footer';
	}

	init() {
		this.initializeSearch();
	}

	initializeSearch() {
		const searchForm = this.block.querySelector('.js-search-form');
		if (!searchForm) {
			return;
		}

		const input = searchForm.querySelector('.js-search-input');
		const button = searchForm.querySelector('.js-search-button');

		if (!input || !button) {
			return;
		}

		button.addEventListener('click', () => this.handleSearch(input));
		input.addEventListener('keydown', (event) => {
			if (event.key === 'Enter') {
				event.preventDefault();
				this.handleSearch(input);
			}
		});
	}

	handleSearch(input) {
		const query = input.value.trim();
		if (query) {
			// Assuming the site URL is the current origin and search path is /?s=
			// This is a robust way to handle search redirection in WordPress.
			window.location.href = `${window.location.origin}/?s=${encodeURIComponent(query)}`;
		}
	}
}

new ACFBlock(FooterView);