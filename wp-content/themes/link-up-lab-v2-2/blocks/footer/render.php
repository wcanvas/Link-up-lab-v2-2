<?php
/**
 * Block: Footer
 *
 * @package WCB
 */

defined( 'ABSPATH' ) || die();

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

// Get ACF fields
$wcb_main_logo        = get_field( 'main_logo' );
$wcb_partner_logos    = get_field( 'partner_logos' );
$wcb_search_placeholder = get_field( 'search_placeholder' );
$wcb_navigation_links = get_field( 'navigation_links' );
$wcb_social_links     = get_field( 'social_links' );
$wcb_copyright_text   = get_field( 'copyright_text' );

// Block wrapper attributes
$block_data = BlockWrapper::get_global_block_wrapper_data( $block );
?>

<section <?php echo wp_kses_post( $block_data ); ?>>
	<footer class="wcb-bg-color-3 wcb-font-font-2 wcb-text-color-4 wcb-py-space-13 lg:wcb-py-space-16">
		<div class="wcb-container">
			<div class="wcb-flex wcb-flex-col lg:wcb-flex-row wcb-justify-between wcb-gap-y-space-13 lg:wcb-gap-y-space-18 lg:wcb-gap-x-8">
				<div class="wcb-flex wcb-flex-col wcb-gap-y-space-13 lg:wcb-gap-y-space-18 wcb-w-full lg:wcb-w-auto">
					<div>
						<?php if ( ! empty( $wcb_main_logo ) ) : ?>
							<?php
							$main_logo_comp = new Component(
								'image',
								array(
									'src'   => $wcb_main_logo['url'],
									'alt'   => $wcb_main_logo['alt'],
									'class' => 'wcb-w-[188px] wcb-h-auto wcb-mb-space-4',
								)
							);
							$main_logo_comp->render();
							?>
						<?php endif; ?>

						<?php if ( ! empty( $wcb_partner_logos ) ) : ?>
							<div class="wcb-flex wcb-items-center wcb-flex-wrap wcb-gap-x-space-2 wcb-gap-y-2">
								<span class="wcb-text-size-1"><?php esc_html_e( 'by', 'wcanvas-boilerplate' ); ?></span>
								<?php foreach ( $wcb_partner_logos as $index => $wcb_partner ) : ?>
									<?php
									$wcb_partner_logo = $wcb_partner['partner_logo'];
									if ( ! empty( $wcb_partner_logo ) ) {
										$partner_logo_comp = new Component(
											'image',
											array(
												'src'   => $wcb_partner_logo['url'],
												'alt'   => $wcb_partner_logo['alt'],
												'class' => 'wcb-h-auto', // Heights are different, let's let the image decide.
											)
										);
										$partner_logo_comp->render();
									}
									?>
									<?php if ( $index < count( $wcb_partner_logos ) - 1 ) : ?>
										<span class="wcb-text-size-1"><?php esc_html_e( 'and', 'wcanvas-boilerplate' ); ?></span>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="js-search-form">
						<?php
						$search_input_comp = new Component(
							'search-input',
							array(
								'placeholder' => $wcb_search_placeholder,
							)
						);
						$search_input_comp->render();
						?>
					</div>
				</div>

				<div class="wcb-flex wcb-flex-col wcb-items-start lg:wcb-items-end wcb-gap-y-space-13 lg:wcb-gap-y-space-18">
					<?php if ( ! empty( $wcb_navigation_links ) ) : ?>
						<nav>
							<ul class="wcb-flex wcb-flex-col wcb-items-start wcb-gap-y-space-4 wcb-list-none wcb-p-0 lg:wcb-grid lg:wcb-grid-flow-col lg:wcb-grid-rows-2 lg:wcb-auto-cols-max lg:wcb-gap-x-space-15 lg:wcb-gap-y-space-4">
								<?php foreach ( $wcb_navigation_links as $wcb_nav_item ) : ?>
									<?php
									$wcb_link = $wcb_nav_item['link'];
									if ( ! empty( $wcb_link ) ) :
										?>
										<li>
											<?php
											$footer_link_comp = new Component(
												'footer-link',
												array(
													'href'   => $wcb_link['url'],
													'text'   => $wcb_link['title'],
													'target' => $wcb_link['target'],
												)
											);
											$footer_link_comp->render();
											?>
										</li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</nav>
					<?php endif; ?>

					<?php if ( ! empty( $wcb_social_links ) ) : ?>
						<div class="wcb-flex wcb-gap-x-space-7">
							<?php foreach ( $wcb_social_links as $wcb_social ) : ?>
								<?php
								if ( ! empty( $wcb_social['icon'] ) && ! empty( $wcb_social['url'] ) ) {
									$social_icon_comp = new Component(
										'social-icon-link',
										array(
											'href'      => $wcb_social['url'],
											'icon_name' => $wcb_social['icon'],
										)
									);
									$social_icon_comp->render();
								}
								?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $wcb_copyright_text ) : ?>
						<p class="wcb-text-size-1 wcb-text-left lg:wcb-text-right"><?php echo esc_html( $wcb_copyright_text ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
</section>