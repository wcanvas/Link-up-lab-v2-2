<?php
/**
 * Block: Columns
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
$wcb_cards          = get_field( 'cards' );

// Block wrapper attributes.
$block_data = BlockWrapper::get_global_block_wrapper_data( $block );
?>

<section <?php echo wp_kses_post( $block_data ); ?>>
	<div class="wcb-relative wcb-bg-color-4 wcb-text-color-11 wcb-py-space-13 lg:wcb-py-space-19">
		<img
			src="https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81ca-80a7-e0058207f706/646:3340.png"
			alt="Noise texture background"
			class="wcb-absolute wcb-inset-0 wcb-w-full wcb-h-full wcb-object-cover wcb-opacity-50"
			aria-hidden="true"
		/>
		<div class="wcb-container wcb-relative">
			<div class="wcb-flex wcb-flex-col lg:wcb-flex-row lg:wcb-justify-between lg:wcb-items-start wcb-gap-space-9 lg:wcb-gap-space-17">
				<div class="wcb-flex wcb-flex-col wcb-gap-space-4 lg:wcb-gap-space-9">
					<?php
					if ( $wcb_title ) {
						$wcb_heading_comp = new Component(
							'heading',
							array(
								'level' => 1,
								'text'  => $wcb_title,
								'class' => 'wcb-font-font-1 wcb-text-color-11 wcb-text-size-7 md:wcb-text-size-8 lg:wcb-text-size-9 wcb-font-bold wcb-leading-tight',
							)
						);
						$wcb_heading_comp->render();
					}
					?>
					<?php if ( $wcb_description ) : ?>
						<p class="wcb-font-font-2 wcb-text-color-11 wcb-text-size-3 md:wcb-text-size-4 wcb-leading-relaxed wcb-max-w-[874px]">
							<?php echo wp_kses_post( $wcb_description ); ?>
						</p>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $wcb_secondary_link['url'] ) && ! empty( $wcb_secondary_link['title'] ) ) : ?>
					<div class="wcb-flex-shrink-0">
						<?php
						$wcb_icon_link_comp = new Component(
							'icon-link',
							array(
								'text'    => $wcb_secondary_link['title'],
								'href'    => $wcb_secondary_link['url'],
								'target'  => $wcb_secondary_link['target'] ?? '',
								'variant' => 'highlighted',
							)
						);
						$wcb_icon_link_comp->render();
						?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( $wcb_cards ) : ?>
				<div class="wcb-grid wcb-grid-cols-1 md:wcb-grid-cols-2 lg:wcb-grid-cols-4 wcb-gap-space-4 lg:wcb-gap-8 wcb-mt-space-13 lg:wcb-mt-space-17">
					<?php foreach ( $wcb_cards as $wcb_card ) : ?>
						<?php
						$wcb_stat_card_comp = new Component(
							'stat-card',
							array(
								'statistic'        => $wcb_card['statistic'],
								'description'      => $wcb_card['description'],
								'color'            => $wcb_card['header_color'],
								'primary_button'   => $wcb_card['primary_button'],
								'secondary_button' => $wcb_card['secondary_button'],
							)
						);
						$wcb_stat_card_comp->render();
						?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>