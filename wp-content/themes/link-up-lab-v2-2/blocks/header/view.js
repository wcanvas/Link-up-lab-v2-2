import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Header - Client-side functionality for mobile menu.
 */
class HeaderView {
	constructor(block) {
		this.block = block;

		// Selectors
		this.toggleButton = this.block.querySelector('.js-mobile-menu-toggle');
		this.menuPanel = this.block.querySelector('.js-mobile-menu');
		this.hamburgerIcon = this.block.querySelector('.js-hamburger-icon');
		this.closeIcon = this.block.querySelector('.js-close-icon');
		this.isMenuOpen = false;

		this.init();
	}

	static getName() {
		return 'header';
	}

	init() {
		if (!this.toggleButton || !this.menuPanel) {
			return;
		}

		this.toggleButton.addEventListener('click', this.toggleMenu.bind(this));
	}

	toggleMenu() {
		this.isMenuOpen = !this.isMenuOpen;

		if (this.isMenuOpen) {
			// Open menu
			this.menuPanel.classList.remove('wcb-hidden');
			document.body.classList.add('wcb-overflow-hidden');
			this.toggleButton.setAttribute('aria-expanded', 'true');

			if (this.hamburgerIcon) {
				this.hamburgerIcon.classList.add('wcb-hidden');
			}
			if (this.closeIcon) {
				this.closeIcon.classList.remove('wcb-hidden');
			}
		} else {
			// Close menu
			this.menuPanel.classList.add('wcb-hidden');
			document.body.classList.remove('wcb-overflow-hidden');
			this.toggleButton.setAttribute('aria-expanded', 'false');

			if (this.hamburgerIcon) {
				this.hamburgerIcon.classList.remove('wcb-hidden');
			}
			if (this.closeIcon) {
				this.closeIcon.classList.add('wcb-hidden');
			}
		}
	}
}

new ACFBlock(HeaderView);