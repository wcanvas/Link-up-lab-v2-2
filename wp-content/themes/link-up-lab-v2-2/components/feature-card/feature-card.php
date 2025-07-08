<?php
/**
 * Component: FeatureCard
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $title          The card title.
 *     @type string $description    The card description.
 *     @type array  $button         The primary button details.
 *     @type array  $secondary_link The secondary link details.
 *     @type string $class          Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

$args += array(
	'title'          => '',
	'description'    => '',
	'button'         => array(),
	'secondary_link' => array(),
	'class'          => '',
);

?>

<div class="wcb-bg-color-11 wcb-rounded-radius-2 wcb-p-space-9 wcb-flex wcb-flex-col <?php echo esc_attr( $args['class'] ); ?>">
	<div class="wcb-mb-space-9">
		<?php
		if ( ! empty( $args['title'] ) ) {
			$wcb_heading_comp = new Component(
				'heading',
				array(
					'level' => 3,
					'text'  => $args['title'],
					'class' => 'wcb-font-font-3 wcb-text-color-7 wcb-text-size-6 lg:wcb-text-size-7 wcb-mb-space-9',
				)
			);
			$wcb_heading_comp->render();
		}
		?>
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="wcb-font-font-4 wcb-text-color-7 wcb-text-size-3 wcb-leading-[1.35]">
				<?php echo esc_html( $args['description'] ); ?>
			</p>
		<?php endif; ?>
	</div>

	<div class="wcb-flex wcb-flex-col wcb-gap-space-9 wcb-mt-auto">
		<?php
		if ( ! empty( $args['button'] ) && ! empty( $args['button']['title'] ) ) {
			$wcb_button_comp = new Component(
				'button',
				array(
					'text'    => $args['button']['title'],
					'href'    => $args['button']['url'] ?? '#',
					'variant' => 'solid-light-green',
				)
			);
			$wcb_button_comp->render();
		}

		if ( ! empty( $args['secondary_link'] ) && ! empty( $args['secondary_link']['title'] ) ) {
			$wcb_icon_link_comp = new Component(
				'icon-link',
				array(
					'text'    => $args['secondary_link']['title'],
					'href'    => $args['secondary_link']['url'] ?? '#',
					'variant' => 'secondary',
				)
			);
			$wcb_icon_link_comp->render();
		}
		?>
	</div>
</div>