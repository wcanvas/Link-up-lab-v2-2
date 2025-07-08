<?php
/**
 * Block: Header
 *
 * @package WCB
 */

defined( 'ABSPATH' ) || die();

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

// Get ACF fields.
$wcb_top_bar_links   = get_field( 'top_bar_links' );
$wcb_top_bar_icons   = get_field( 'top_bar_icons' );
$wcb_logo_image      = get_field( 'logo_image' );
$wcb_logo_url        = get_field( 'logo_url' );
$wcb_main_navigation = get_field( 'main_navigation' );

// Block wrapper attributes.
$block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Helper function to check if a URL is the current page's URL.
if ( ! function_exists( 'wcb_is_current_url' ) ) {
	/**
	 * Checks if the given URL matches the current page's URL.
	 *
	 * @param string $url The URL to check.
	 * @return bool True if it's the current URL, false otherwise.
	 */
	function wcb_is_current_url( $url ) {
		if ( empty( $url ) ) {
			return false;
		}

		$wcb_current_url_host = isset( $_SERVER['HTTP_HOST'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ) : '';
		$wcb_current_url_path = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		$wcb_current_url      = ( ! empty( $_SERVER['HTTPS'] ) ? 'https' : 'http' ) . '://' . $wcb_current_url_host . $wcb_current_url_path;

		return rtrim( $url, '/' ) === rtrim( $wcb_current_url, '/' );
	}
}

?>

<header <?php echo wp_kses_post( $block_data ); ?> class="wcb-font-font-2 wcb-relative">
	<?php // Top Bar (Desktop) ?>
	<?php if ( $wcb_top_bar_links || $wcb_top_bar_icons ) : ?>
		<div class="wcb-hidden lg:wcb-block wcb-bg-color-3">
			<div class="wcb-container wcb-flex wcb-justify-between wcb-items-center">
				<?php if ( $wcb_top_bar_links ) : ?>
					<nav>
						<ul class="wcb-flex wcb-items-stretch wcb-list-none">
							<?php foreach ( $wcb_top_bar_links as $wcb_item ) : ?>
								<?php
								$wcb_link = $wcb_item['link'];
								if ( ! empty( $wcb_link['url'] ) && ! empty( $wcb_link['title'] ) ) :
									?>
									<li>
										<?php
										( new Component(
											'nav-link',
											array(
												'text'      => $wcb_link['title'],
												'href'      => $wcb_link['url'],
												'target'    => $wcb_link['target'],
												'is_active' => wcb_is_current_url( $wcb_link['url'] ),
												'class'     => 'wcb-block wcb-py-space-7 wcb-px-space-6 wcb-text-color-4 wcb-font-bold wcb-text-size-1 wcb-tracking-[0.07em] wcb-uppercase',
											)
										) )->render();
										?>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</nav>
				<?php endif; ?>

				<?php if ( $wcb_top_bar_icons ) : ?>
					<div class="wcb-flex wcb-items-center wcb-gap-x-space-4 wcb-py-space-4">
						<?php foreach ( $wcb_top_bar_icons as $wcb_item ) : ?>
							<?php if ( ! empty( $wcb_item['icon'] ) && ! empty( $wcb_item['url'] ) ) : ?>
								<a href="<?php echo esc_url( $wcb_item['url'] ); ?>" class="wcb-no-underline wcb-text-color-4 wcb-cursor-pointer">
									<?php
									( new Component(
										'icon',
										array(
											'name'  => $wcb_item['icon'],
											'class' => 'wcb-h-space-9 wcb-w-space-9',
										)
									) )->render();
									?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php // Main Bar ?>
	<div class="wcb-bg-color-4">
		<div class="wcb-container wcb-flex wcb-justify-between wcb-items-center wcb-py-space-4 lg:wcb-py-space-7">
			<?php // Logo ?>
			<?php if ( $wcb_logo_image && $wcb_logo_url ) : ?>
				<a href="<?php echo esc_url( $wcb_logo_url ); ?>" class="wcb-no-underline wcb-cursor-pointer wcb-z-30">
					<?php
					( new Component(
						'image',
						array(
							'src'   => $wcb_logo_image['url'],
							'alt'   => $wcb_logo_image['alt'],
							'class' => 'wcb-h-14 lg:wcb-h-[76px] wcb-w-auto',
						)
					) )->render();
					?>
				</a>
			<?php endif; ?>

			<?php // Main Navigation (Desktop) ?>
			<?php if ( $wcb_main_navigation ) : ?>
				<nav class="wcb-hidden lg:wcb-flex">
					<ul class="wcb-flex wcb-items-center wcb-gap-x-space-14 wcb-list-none">
						<?php foreach ( $wcb_main_navigation as $wcb_item ) : ?>
							<?php
							$wcb_link = $wcb_item['link'];
							if ( ! empty( $wcb_link['url'] ) && ! empty( $wcb_link['title'] ) ) :
								?>
								<li>
									<?php
									( new Component(
										'nav-link',
										array(
											'text'   => $wcb_link['title'],
											'href'   => $wcb_link['url'],
											'target' => $wcb_link['target'],
											'class'  => 'wcb-text-color-3 wcb-font-font-1 wcb-font-bold wcb-text-size-3 wcb-tracking-[0.08em]',
										)
									) )->render();
									?>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>

			<?php // Mobile Menu Toggle ?>
			<div class="lg:wcb-hidden wcb-z-30">
				<button class="js-mobile-menu-toggle wcb-text-color-11 wcb-cursor-pointer wcb-bg-transparent wcb-border-none wcb-p-2 -wcb-mr-2" aria-label="Open menu" aria-expanded="false">
					<span class="js-hamburger-icon">
						<?php ( new Component( 'icon', array( 'name' => 'hamburger', 'class' => 'wcb-h-8 wcb-w-8' ) ) )->render(); ?>
					</span>
					<span class="js-close-icon wcb-hidden">
						<?php ( new Component( 'icon', array( 'name' => 'close', 'class' => 'wcb-h-8 wcb-w-8' ) ) )->render(); ?>
					</span>
				</button>
			</div>
		</div>

		<?php // Mobile Menu Panel ?>
		<div class="js-mobile-menu wcb-hidden lg:wcb-hidden wcb-bg-color-4 wcb-absolute wcb-top-0 wcb-left-0 wcb-w-full wcb-h-screen wcb-z-20 wcb-pt-28 wcb-overflow-y-auto">
			<div class="wcb-container wcb-py-6 wcb-flex wcb-flex-col wcb-h-full">
				<nav class="wcb-flex-grow">
					<ul class="wcb-flex wcb-flex-col wcb-items-start wcb-gap-y-4 wcb-list-none">
						<?php // Top Bar Links (Mobile) ?>
						<?php if ( $wcb_top_bar_links ) : ?>
							<?php foreach ( $wcb_top_bar_links as $wcb_item ) : ?>
								<?php
								$wcb_link = $wcb_item['link'];
								if ( ! empty( $wcb_link['url'] ) && ! empty( $wcb_link['title'] ) ) :
									$wcb_is_active      = wcb_is_current_url( $wcb_link['url'] );
									$wcb_mobile_class   = $wcb_is_active ? 'wcb-bg-color-13 wcb-text-color-4' : 'wcb-text-color-11';
									$wcb_combined_class = 'wcb-block wcb-w-full wcb-rounded-md wcb-py-3 wcb-px-4 wcb-font-bold wcb-text-size-1 wcb-tracking-[0.07em] wcb-uppercase ' . $wcb_mobile_class;
									?>
									<li class="wcb-w-full">
										<?php
										( new Component(
											'nav-link',
											array(
												'text'      => $wcb_link['title'],
												'href'      => $wcb_link['url'],
												'target'    => $wcb_link['target'],
												'is_active' => false, // Active state is handled by custom classes above.
												'class'     => $wcb_combined_class,
											)
										) )->render();
										?>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>

						<?php // Main Navigation (Mobile) ?>
						<?php if ( $wcb_main_navigation ) : ?>
							<?php foreach ( $wcb_main_navigation as $wcb_item ) : ?>
								<?php
								$wcb_link = $wcb_item['link'];
								if ( ! empty( $wcb_link['url'] ) && ! empty( $wcb_link['title'] ) ) :
									?>
									<li class="wcb-w-full">
										<?php
										( new Component(
											'nav-link',
											array(
												'text'   => $wcb_link['title'],
												'href'   => $wcb_link['url'],
												'target' => $wcb_link['target'],
												'class'  => 'wcb-block wcb-w-full wcb-py-3 wcb-text-color-11 wcb-font-font-1 wcb-font-bold wcb-text-size-3 wcb-tracking-[0.08em]',
											)
										) )->render();
										?>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</nav>

				<?php // Social Icons (Mobile) ?>
				<?php if ( $wcb_top_bar_icons ) : ?>
					<div class="wcb-flex wcb-items-center wcb-gap-x-6 wcb-mt-8 wcb-pt-6 wcb-border-t wcb-border-color-11 wcb-border-opacity-20">
						<?php foreach ( $wcb_top_bar_icons as $wcb_item ) : ?>
							<?php if ( ! empty( $wcb_item['icon'] ) && ! empty( $wcb_item['url'] ) ) : ?>
								<a href="<?php echo esc_url( $wcb_item['url'] ); ?>" class="wcb-no-underline wcb-text-color-11 wcb-cursor-pointer">
									<?php
									( new Component(
										'icon',
										array(
											'name'  => $wcb_item['icon'],
											'class' => 'wcb-h-6 wcb-w-6',
										)
									) )->render();
									?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>