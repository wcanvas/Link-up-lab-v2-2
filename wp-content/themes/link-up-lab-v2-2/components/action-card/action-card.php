<?php
/**
 * Component: ActionCard
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $title              The card title.
 *     @type string $description        The card description.
 *     @type array  $primary_button     The primary button link array from ACF.
 *     @type array  $secondary_button   The secondary button link array from ACF.
 *     @type string $class              Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

$args += array(
	'title'            => '',
	'description'      => '',
	'primary_button'   => null,
	'secondary_button' => null,
	'class'            => '',
);

?>

<div class="wcb-flex wcb-flex-col wcb-justify-center wcb-items-center wcb-text-center lg:wcb-w-[400px] wcb-py-space-9 <?php echo esc_attr( $args['class'] ); ?>">
	<div class="wcb-mb-space-9">
		<?php
		if ( ! empty( $args['title'] ) ) {
			$heading_comp = new Component(
				'heading',
				array(
					'level' => 3,
					'text'  => $args['title'],
					'class' => 'wcb-font-font-1 wcb-text-color-11 wcb-text-size-5 lg:wcb-text-size-6 wcb-font-bold wcb-mb-space-4',
				)
			);
			$heading_comp->render();
		}
		?>
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="wcb-font-font-2 wcb-text-color-11 wcb-text-size-3 lg:wcb-text-size-4 wcb-leading-[1.35]">
				<?php echo esc_html( $args['description'] ); ?>
			</p>
		<?php endif; ?>
	</div>

	<div class="wcb-flex wcb-items-center wcb-gap-space-11">
		<?php
		if ( ! empty( $args['primary_button'] ) && ! empty( $args['primary_button']['url'] ) ) {
			$primary_button_comp = new Component(
				'button',
				array(
					'text'    => $args['primary_button']['title'],
					'href'    => $args['primary_button']['url'],
					'variant' => 'solid-light-green',
				)
			);
			$primary_button_comp->render();
		}

		if ( ! empty( $args['secondary_button'] ) && ! empty( $args['secondary_button']['url'] ) ) {
			$secondary_button_comp = new Component(
				'button',
				array(
					'text'    => $args['secondary_button']['title'],
					'href'    => $args['secondary_button']['url'],
					'variant' => 'outline-white',
				)
			);
			$secondary_button_comp->render();
		}
		?>
	</div>
</div>