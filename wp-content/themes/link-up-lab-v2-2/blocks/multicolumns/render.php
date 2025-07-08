<?php
/**
 * Block: Multicolumns
 *
 * @package WCB
 */

defined( 'ABSPATH' ) || die();

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

// Get ACF fields.
$wcb_title          = get_field( 'title' );
$wcb_description    = get_field( 'description' );
$wcb_secondary_link = get_field( 'secondary_link' );
$wcb_columns        = get_field( 'columns' );

// Block wrapper attributes.
$block_data = BlockWrapper::get_global_block_wrapper_data( $block );
?>

<section <?php echo wp_kses_post( $block_data ); ?>>
	<div class="wcb-relative wcb-bg-color-4 wcb-text-color-11 wcb-py-space-13 lg:wcb-py-space-19">
		<img
			src="https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-818a-80d3-fdeefe6daf05/671:3640.png"
			alt="Background texture"
			class="wcb-absolute wcb-inset-0 wcb-w-full wcb-h-full wcb-object-cover wcb-opacity-50"
			aria-hidden="true"
		/>
		<div class="wcb-relative wcb-z-10 wcb-container">
			<div class="wcb-flex wcb-flex-col lg:wcb-flex-row wcb-justify-between wcb-items-start wcb-gap-space-9 lg:wcb-gap-space-17">
				<div class="lg:wcb-max-w-[874px]">
					<?php
					if ( $wcb_title ) {
						$heading_comp = new Component(
							'heading',
							array(
								'level' => 2,
								'text'  => $wcb_title,
								'class' => 'wcb-font-font-1 wcb-font-bold wcb-text-size-7 lg:wcb-text-size-9 wcb-leading-[1.18] wcb-text-color-11 wcb-mb-space-9',
							)
						);
						$heading_comp->render();
					}
					?>

					<?php if ( $wcb_description ) : ?>
						<p class="wcb-font-font-2 wcb-text-size-3 md:wcb-text-size-4 wcb-leading-[1.35] wcb-text-color-3">
							<?php echo esc_html( $wcb_description ); ?>
						</p>
					<?php endif; ?>
				</div>

				<?php if ( ! empty( $wcb_secondary_link['url'] ) && ! empty( $wcb_secondary_link['title'] ) ) : ?>
					<div class="wcb-flex-shrink-0">
						<?php
						$icon_link_comp = new Component(
							'icon-link',
							array(
								'text'    => $wcb_secondary_link['title'],
								'href'    => $wcb_secondary_link['url'],
								'variant' => 'highlighted',
							)
						);
						$icon_link_comp->render();
						?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( have_rows( 'columns' ) ) : ?>
				<div class="wcb-grid wcb-grid-cols-1 sm:wcb-grid-cols-2 lg:wcb-grid-cols-4 wcb-gap-y-space-12 wcb-gap-x-space-6 lg:wcb-gap-space-4 wcb-mt-space-13 lg:wcb-mt-space-17">
					<?php
					while ( have_rows( 'columns' ) ) :
						the_row();
						$icon_card_comp = new Component(
							'icon-card',
							array(
								'icon'             => get_sub_field( 'icon' ),
								'title'            => get_sub_field( 'title' ),
								'description'      => get_sub_field( 'description' ),
								'primary_button'   => get_sub_field( 'primary_button' ),
								'secondary_button' => get_sub_field( 'secondary_button' ),
							)
						);
						$icon_card_comp->render();
					endwhile;
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>