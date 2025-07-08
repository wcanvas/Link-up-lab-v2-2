<?php
/**
 * Block: Hero Banner
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
$wcb_buttons          = get_field( 'buttons' );
$wcb_background_image = get_field( 'background_image' );
$wcb_main_image       = get_field( 'main_image' );

// Block wrapper attributes.
$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Construct heading text from the group field to match React's structure.
$wcb_heading_text = '';
if ( ! empty( $wcb_heading_group ) ) {
	$wcb_line1 = ! empty( $wcb_heading_group['line1'] ) ? $wcb_heading_group['line1'] : '';
	$wcb_line2 = ! empty( $wcb_heading_group['line2'] ) ? $wcb_heading_group['line2'] : '';
	$wcb_line3 = ! empty( $wcb_heading_group['line3'] ) ? $wcb_heading_group['line3'] : '';

	$wcb_heading_text = '<span class="wcb-text-color-2">' . esc_html( $wcb_line1 ) . '</span><br>' . esc_html( $wcb_line2 ) . '<br><span class="wcb-text-color-2">' . esc_html( $wcb_line3 ) . '</span>';
}
?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
	<div class="wcb-flex wcb-flex-col lg:wcb-flex-row wcb-bg-color-1">
		<div class="wcb-relative lg:wcb-w-1/2 wcb-flex wcb-items-center">
			<?php
			if ( ! empty( $wcb_background_image ) ) {
				$wcb_background_image_comp = new Component(
					'image',
					array(
						'src'   => $wcb_background_image['url'],
						'alt'   => $wcb_background_image['alt'],
						'class' => 'wcb-absolute wcb-inset-0 wcb-w-full wcb-h-full wcb-object-cover wcb-opacity-50',
					)
				);
				$wcb_background_image_comp->render();
			}
			?>
			<div class="wcb-relative wcb-z-10 wcb-w-full wcb-py-space-13 wcb-px-space-9 md:wcb-py-space-17 md:wcb-px-space-11 lg:wcb-px-space-19">
				<div class="wcb-max-w-xl wcb-mx-auto lg:wcb-mx-0 lg:wcb-max-w-none">
					<?php
					if ( ! empty( $wcb_eyebrow ) ) {
						$wcb_preheading_comp = new Component(
							'preheading',
							array(
								'text' => $wcb_eyebrow,
							)
						);
						$wcb_preheading_comp->render();
					}

					if ( ! empty( $wcb_heading_text ) ) {
						$wcb_heading_comp = new Component(
							'heading',
							array(
								'level' => $wcb_heading_group['level'] ?? 1,
								'text'  => $wcb_heading_text,
								'class' => 'wcb-font-font-1 wcb-font-bold wcb-text-size-8 md:wcb-text-size-9 lg:wcb-text-size-10 wcb-text-color-3 wcb-leading-[0.9625em] wcb-mt-space-9 wcb-mb-space-9',
							)
						);
						$wcb_heading_comp->render();
					}
					?>

					<?php if ( ! empty( $wcb_description ) ) : ?>
						<p class="wcb-font-font-2 wcb-text-size-3 md:wcb-text-size-5 wcb-text-color-3 wcb-mb-space-11 wcb-leading-[1.4375em]">
							<?php echo esc_html( $wcb_description ); ?>
						</p>
					<?php endif; ?>

					<?php if ( have_rows( 'buttons' ) ) : ?>
						<div class="wcb-flex wcb-flex-col wcb-gap-4 sm:wcb-flex-row sm:wcb-items-start sm:wcb-gap-space-11">
							<?php
							while ( have_rows( 'buttons' ) ) :
								the_row();
								$wcb_button_link  = get_sub_field( 'button' );
								$wcb_button_style = get_sub_field( 'style' );

								if ( ! empty( $wcb_button_link ) ) {
									$wcb_button_comp = new Component(
										'button',
										array(
											'title'   => $wcb_button_link['title'],
											'href'    => $wcb_button_link['url'],
											'target'  => $wcb_button_link['target'],
											'variant' => $wcb_button_style,
										)
									);
									$wcb_button_comp->render();
								}
							endwhile;
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="wcb-relative lg:wcb-w-1/2">
			<div class="wcb-absolute wcb-top-0 wcb-bottom-0 wcb-left-0 wcb-w-space-4 wcb-bg-color-2 wcb-hidden lg:wcb-block"></div>
			<div class="wcb-absolute wcb-bottom-0 wcb-left-0 wcb-right-0 wcb-h-space-4 wcb-bg-color-2 wcb-hidden lg:wcb-block"></div>
			<?php
			if ( ! empty( $wcb_main_image ) ) {
				$wcb_main_image_comp = new Component(
					'image',
					array(
						'src'   => $wcb_main_image['url'],
						'alt'   => $wcb_main_image['alt'],
						'class' => 'wcb-w-full wcb-h-full wcb-object-cover wcb-min-h-[400px] md:wcb-min-h-[500px] lg:wcb-min-h-0',
					)
				);
				$wcb_main_image_comp->render();
			}
			?>
		</div>
	</div>
</section>