<?php
/**
 * Block: CTA
 *
 * @package WCB
 */

defined( 'ABSPATH' ) || die();

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

// Get ACF fields.
$wcb_intro_title       = get_field( 'intro_title' );
$wcb_intro_description = get_field( 'intro_description' );
$wcb_intro_link        = get_field( 'intro_link' );
$wcb_cta_cards         = get_field( 'cta_cards' );
$wcb_background_image  = get_field( 'background_image' );

// Block wrapper attributes.
$block_data = BlockWrapper::get_global_block_wrapper_data( $block );
?>

<section <?php echo wp_kses_post( $block_data ); ?> class="wcb-relative wcb-bg-color-1 wcb-border-b-space-4 wcb-border-solid wcb-border-color-12">
	<?php if ( $wcb_background_image ) : ?>
		<img
			src="<?php echo esc_url( $wcb_background_image['url'] ); ?>"
			alt="<?php echo esc_attr( $wcb_background_image['alt'] ); ?>"
			class="wcb-absolute wcb-inset-0 wcb-w-full wcb-h-full wcb-object-cover wcb-z-0 wcb-opacity-50"
		/>
	<?php endif; ?>

	<div class="wcb-relative wcb-z-10 wcb-container wcb-py-space-17 lg:wcb-py-space-20">
		<div class="wcb-flex wcb-flex-col lg:wcb-flex-row lg:wcb-justify-between wcb-gap-space-12 lg:wcb-gap-space-4">
			<div class="lg:wcb-w-[400px]">
				<div class="wcb-mb-space-9">
					<?php
					if ( $wcb_intro_title ) {
						$heading_comp = new Component(
							'heading',
							array(
								'level' => 2,
								'text'  => $wcb_intro_title,
								'class' => 'wcb-font-font-1 wcb-text-color-11 wcb-text-size-7 lg:wcb-text-size-8 wcb-font-bold wcb-mb-space-4',
							)
						);
						$heading_comp->render();
					}
					?>
					<?php if ( $wcb_intro_description ) : ?>
						<p class="wcb-font-font-2 wcb-text-color-11 wcb-text-size-4 wcb-leading-[1.35]">
							<?php echo esc_html( $wcb_intro_description ); ?>
						</p>
					<?php endif; ?>
				</div>
				<?php
				if ( $wcb_intro_link ) {
					$icon_link_comp = new Component(
						'icon-link',
						array(
							'text'    => $wcb_intro_link['title'],
							'href'    => $wcb_intro_link['url'],
							'variant' => 'highlighted',
						)
					);
					$icon_link_comp->render();
				}
				?>
			</div>

			<?php if ( $wcb_cta_cards ) : ?>
				<div class="wcb-flex wcb-flex-col lg:wcb-flex-row wcb-gap-space-9">
					<?php foreach ( $wcb_cta_cards as $wcb_card ) : ?>
						<?php
						$action_card_comp = new Component(
							'action-card',
							array(
								'title'            => $wcb_card['title'],
								'description'      => $wcb_card['description'],
								'primary_button'   => $wcb_card['primary_button'],
								'secondary_button' => $wcb_card['secondary_button'],
							)
						);
						$action_card_comp->render();
						?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>