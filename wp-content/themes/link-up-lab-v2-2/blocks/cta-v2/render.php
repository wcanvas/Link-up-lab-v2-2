<?php
/**
 * Block: CTA v2
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
$wcb_action_cards   = get_field( 'action_cards' );

// Block wrapper attributes.
$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );
?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
	<div class="wcb-bg-color-2 wcb-py-space-17 lg:wcb-py-space-20 wcb-relative wcb-overflow-hidden">
		<img
			src="https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-8196-b4fe-f2d1c1fd853a/822:21629.png"
			alt="Abstract background static"
			class="wcb-absolute wcb-inset-0 wcb-w-full wcb-h-full wcb-object-cover wcb-mix-blend-multiply wcb-opacity-50"
		/>
		<div class="wcb-container wcb-relative">
			<div class="wcb-flex wcb-flex-col lg:wcb-flex-row lg:wcb-justify-between lg:wcb-items-start wcb-mb-space-12 lg:wcb-mb-space-15">
				<div class="wcb-mb-space-6 lg:wcb-mb-0 lg:wcb-max-w-[814px]">
					<?php
					if ( ! empty( $wcb_heading['text'] ) ) {
						$wcb_heading_comp = new Component(
							'heading',
							array(
								'level' => $wcb_heading['level'] ?? 2,
								'text'  => $wcb_heading['text'],
								'class' => 'wcb-font-font-1 wcb-text-color-4 wcb-text-size-7 lg:wcb-text-size-8 wcb-font-bold wcb-mb-space-6',
							)
						);
						$wcb_heading_comp->render();
					}
					?>

					<?php if ( ! empty( $wcb_description ) ) : ?>
						<p class="wcb-font-font-2 wcb-text-color-4 wcb-text-size-4 lg:wcb-text-size-5 wcb-font-normal wcb-leading-[1.44]">
							<?php echo esc_html( $wcb_description ); ?>
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
								'variant' => 'black-all-caps',
							)
						);
						$wcb_icon_link_comp->render();
						?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $wcb_action_cards ) ) : ?>
				<div class="wcb-flex wcb-flex-col lg:wcb-flex-row lg:wcb-justify-between lg:wcb-items-stretch wcb-gap-space-9 lg:wcb-gap-space-4">
					<?php foreach ( $wcb_action_cards as $wcb_card ) : ?>
						<?php
						$wcb_card_comp = new Component(
							'side-bar-card',
							array(
								'title'            => $wcb_card['title'],
								'description'      => $wcb_card['description'],
								'primary_button'   => $wcb_card['primary_button'],
								'secondary_button' => $wcb_card['secondary_button'],
							)
						);
						$wcb_card_comp->render();
						?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>