<?php
/**
 * Block: 50-50
 *
 * @package WCB
 */

defined( 'ABSPATH' ) || die();

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

// Get ACF fields.
$wcb_eyebrow          = get_field( 'eyebrow' );
$wcb_heading_group    = get_field( 'heading' );
$wcb_description      = get_field( 'description' );
$wcb_image            = get_field( 'image' );
$wcb_buttons          = get_field( 'buttons' );
$wcb_background_image = get_field( 'background_image' ); // Assuming a field 'background_image' exists for the left column's background.

// Block wrapper attributes.
$block_data = BlockWrapper::get_global_block_wrapper_data( $block );
?>

<section <?php echo wp_kses_post( $block_data ); ?>>
	<div class="wcb-grid wcb-grid-cols-1 lg:wcb-grid-cols-2 wcb-border-[10px] wcb-border-solid wcb-border-color-13">
		<div class="wcb-bg-color-11 wcb-relative wcb-flex wcb-flex-col wcb-justify-center wcb-p-space-9 md:wcb-p-space-12 lg:wcb-py-space-17 lg:wcb-px-space-19 wcb-order-2 lg:wcb-order-1">
			<?php if ( ! empty( $wcb_background_image['url'] ) ) : ?>
				<img
					src="<?php echo esc_url( $wcb_background_image['url'] ); ?>"
					alt=""
					class="wcb-absolute wcb-inset-0 wcb-w-full wcb-h-full wcb-object-cover wcb-opacity-50"
					aria-hidden="true"
				/>
			<?php endif; ?>

			<div class="wcb-relative wcb-z-10">
				<?php if ( $wcb_eyebrow ) : ?>
					<div class="wcb-mb-space-9">
						<?php
						$preheading_comp = new Component(
							'preheading',
							array(
								'text'  => $wcb_eyebrow,
								'class' => 'wcb-text-size-2 lg:wcb-text-size-5 wcb-text-color-4 wcb-font-bold wcb-tracking-[8.33%] wcb-uppercase',
							)
						);
						$preheading_comp->render();
						?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $wcb_heading_group['text'] ) ) : ?>
					<div class="wcb-mb-space-9">
						<?php
						$heading_comp = new Component(
							'heading',
							array(
								'level' => $wcb_heading_group['level'] ?? 2,
								'text'  => $wcb_heading_group['text'],
								'class' => 'wcb-font-font-1 wcb-text-size-7 lg:wcb-text-size-9 wcb-text-color-4 wcb-font-bold wcb-leading-[1.18em]',
							)
						);
						$heading_comp->render();
						?>
					</div>
				<?php endif; ?>

				<?php if ( $wcb_description ) : ?>
					<p class="wcb-font-font-2 wcb-text-size-3 lg:wcb-text-size-5 wcb-text-color-4 wcb-mb-space-12 wcb-leading-[1.44em]">
						<?php echo esc_html( $wcb_description ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $wcb_buttons ) : ?>
					<div class="wcb-flex wcb-flex-wrap wcb-gap-space-11">
						<?php
						foreach ( $wcb_buttons as $wcb_button_row ) {
							$wcb_button_link  = $wcb_button_row['button'];
							$wcb_button_style = $wcb_button_row['style'];

							if ( ! empty( $wcb_button_link['url'] ) && ! empty( $wcb_button_link['title'] ) ) {
								$wcb_variant = 'solid-black';
								if ( 'outline' === $wcb_button_style ) {
									$wcb_variant = 'outline-black';
								}

								$button_comp = new Component(
									'button',
									array(
										'text'    => $wcb_button_link['title'],
										'href'    => $wcb_button_link['url'],
										'target'  => $wcb_button_link['target'],
										'variant' => $wcb_variant,
									)
								);
								$button_comp->render();
							}
						}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( ! empty( $wcb_image['url'] ) ) : ?>
			<div class="wcb-h-[300px] md:wcb-h-[450px] lg:wcb-h-full wcb-order-1 lg:wcb-order-2 wcb-border-b-[10px] lg:wcb-border-b-0 lg:wcb-border-l-[10px] wcb-border-solid wcb-border-color-13">
				<?php
				$image_comp = new Component(
					'image',
					array(
						'src'   => $wcb_image['url'],
						'alt'   => $wcb_image['alt'],
						'class' => 'wcb-w-full wcb-h-full wcb-object-cover',
					)
				);
				$image_comp->render();
				?>
			</div>
		<?php endif; ?>
	</div>
</section>