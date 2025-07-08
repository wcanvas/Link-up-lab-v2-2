<?php
/**
 * Block: Images
 *
 * @package WCB
 */

defined( 'ABSPATH' ) || die();

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

// Get ACF fields.
$wcb_heading        = get_field( 'heading' );
$wcb_description    = get_field( 'description' );
$wcb_secondary_link = get_field( 'secondary_link' );
$wcb_gallery        = get_field( 'gallery' );

// Block wrapper attributes.
$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Prepare captions for view.js.
$wcb_captions = array();
if ( ! empty( $wcb_gallery ) ) {
	foreach ( $wcb_gallery as $wcb_item ) {
		$wcb_captions[] = ! empty( $wcb_item['caption'] ) ? $wcb_item['caption'] : '';
	}
}
?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
	<div class="wcb-relative wcb-bg-color-11">
		<img
			src="https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81de-893b-f9d2aff6ce61/822:21930.png"
			alt=""
			class="wcb-absolute wcb-inset-0 wcb-w-full wcb-h-full wcb-object-cover wcb-opacity-50"
			aria-hidden="true"
		/>
		<div class="wcb-relative wcb-z-10 wcb-py-space-13 wcb-px-space-9 lg:wcb-py-space-19 lg:wcb-px-space-19">
			<div class="wcb-flex wcb-flex-col lg:wcb-flex-row wcb-justify-between lg:wcb-items-start wcb-gap-space-12 lg:wcb-gap-space-17">
				<div class="wcb-flex-1 wcb-max-w-[874px]">
					<?php
					if ( ! empty( $wcb_heading['text'] ) ) {
						$wcb_heading_comp = new Component(
							'heading',
							array(
								'level' => $wcb_heading['level'] ?? 1,
								'text'  => $wcb_heading['text'],
								'class' => 'wcb-font-font-1 wcb-text-color-4 wcb-text-size-7 lg:wcb-text-size-9 wcb-font-bold wcb-leading-[1.18] wcb-mb-space-9',
							)
						);
						$wcb_heading_comp->render();
					}
					?>
					<?php if ( ! empty( $wcb_description ) ) : ?>
						<p class="wcb-font-font-2 wcb-text-color-4 wcb-text-size-3 lg:wcb-text-size-4 wcb-leading-[1.35]">
							<?php echo esc_html( $wcb_description ); ?>
						</p>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $wcb_secondary_link['url'] ) && ! empty( $wcb_secondary_link['title'] ) ) : ?>
					<div class="wcb-flex wcb-items-center wcb-gap-space-3">
						<?php
						$wcb_icon_link_comp = new Component(
							'icon-link',
							array(
								'text'    => $wcb_secondary_link['title'],
								'href'    => $wcb_secondary_link['url'],
								'variant' => 'black-all-caps',
							)
						);
						$wcb_icon_link_comp->render();
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php if ( ! empty( $wcb_gallery ) ) : ?>
		<div class="wcb-bg-color-11 wcb-py-space-13 lg:wcb-py-space-17">
			<div class="wcb-container">
				<div class="wcb-flex wcb-flex-col wcb-items-center wcb-gap-space-12 lg:wcb-gap-space-17">
					<div class="wcb-w-full wcb-border-space-4 wcb-border-solid wcb-border-color-13 js-images-slider-wrapper" data-captions='<?php echo esc_attr( wp_json_encode( $wcb_captions ) ); ?>'>
						<div class="swiper js-images-slider">
							<div class="swiper-wrapper">
								<?php foreach ( $wcb_gallery as $wcb_item ) : ?>
									<div class="swiper-slide">
										<?php
										if ( ! empty( $wcb_item['image'] ) ) {
											$wcb_image_comp = new Component(
												'image',
												array(
													'src'   => $wcb_item['image']['url'],
													'alt'   => $wcb_item['image']['alt'],
													'class' => 'wcb-w-full wcb-h-auto wcb-object-cover',
												)
											);
											$wcb_image_comp->render();
										}
										?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>

					<div class="wcb-flex wcb-flex-col wcb-items-center wcb-text-center wcb-gap-space-6">
						<p class="js-images-caption wcb-font-font-2 wcb-text-color-4 wcb-text-size-2 wcb-leading-[1.375] wcb-max-w-3xl">
							<?php echo esc_html( $wcb_captions[0] ?? '' ); ?>
						</p>

						<div class="wcb-flex wcb-items-center wcb-justify-center wcb-gap-space-9 lg:wcb-gap-space-12">
							<button class="js-images-prev wcb-cursor-pointer" aria-label="<?php esc_attr_e( 'Previous slide', 'wcanvas-boilerplate' ); ?>">
								<?php
								$wcb_icon_prev_comp = new Component(
									'icon',
									array(
										'name'  => 'arrow-left',
										'class' => 'wcb-text-color-1 wcb-w-3 wcb-h-3',
									)
								);
								$wcb_icon_prev_comp->render();
								?>
							</button>
							<?php
							$wcb_indicator_comp = new Component(
								'carousel-indicator',
								array(
									'count'        => count( $wcb_gallery ),
									'active_index' => 0,
									'class'        => 'js-images-indicator',
								)
							);
							$wcb_indicator_comp->render();
							?>
							<button class="js-images-next wcb-cursor-pointer" aria-label="<?php esc_attr_e( 'Next slide', 'wcanvas-boilerplate' ); ?>">
								<?php
								$wcb_icon_next_comp = new Component(
									'icon',
									array(
										'name'  => 'arrow-right',
										'class' => 'wcb-text-color-1 wcb-w-3 wcb-h-3',
									)
								);
								$wcb_icon_next_comp->render();
								?>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>