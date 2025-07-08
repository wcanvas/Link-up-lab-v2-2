import ACFBlock from '../../assets/js/utils/blocks';
import Swiper from 'swiper';

/**
 * Images Block - Client-side functionality
 */
class ImagesView {
	constructor(block) {
		this.block = block;
		this.slider = this.block.querySelector('.js-images-slider');
		this.swiper = null;
		this.captions = [];

		this.init();
	}

	static getName() {
		return 'images';
	}

	init() {
		if (this.slider) {
			this.initializeSlider();
		}
	}

	initializeSlider() {
		const sliderWrapper = this.block.querySelector('.js-images-slider-wrapper');
		if (!sliderWrapper) return;

		try {
			this.captions = JSON.parse(sliderWrapper.dataset.captions || '[]');
		} catch (e) {
			console.error('Failed to parse captions JSON:', e);
			this.captions = [];
		}

		this.swiper = new Swiper(this.slider, {
			loop: true,
			spaceBetween: 0,
			slidesPerView: 1,
			navigation: {
				nextEl: this.block.querySelector('.js-images-next'),
				prevEl: this.block.querySelector('.js-images-prev'),
			},
		});

		this.swiper.on('slideChange', this.handleSlideChange.bind(this));
		this.initializeIndicators();
	}

	handleSlideChange() {
		const activeIndex = this.swiper.realIndex;
		this.updateCaption(activeIndex);
		this.updateIndicators(activeIndex);
	}

	updateCaption(index) {
		const captionElement = this.block.querySelector('.js-images-caption');
		if (captionElement && this.captions[index] !== undefined) {
			captionElement.textContent = this.captions[index];
		}
	}

	updateIndicators(activeIndex) {
		const indicators = this.block.querySelectorAll('.js-carousel-indicator-item');
		indicators.forEach((indicator, index) => {
			if (index === activeIndex) {
				indicator.classList.remove('wcb-bg-color-15');
				indicator.classList.add('wcb-bg-color-1');
			} else {
				indicator.classList.remove('wcb-bg-color-1');
				indicator.classList.add('wcb-bg-color-15');
			}
		});
	}

	initializeIndicators() {
		const indicators = this.block.querySelectorAll('.js-carousel-indicator-item');
		indicators.forEach(indicator => {
			indicator.addEventListener('click', e => {
				const index = parseInt(e.currentTarget.dataset.slideIndex, 10);
				if (!isNaN(index) && this.swiper) {
					this.swiper.slideToLoop(index);
				}
			});
		});
	}
}

new ACFBlock(ImagesView);