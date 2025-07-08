<?php
/**
 * Component: IconCard
 *
 * @package WCB
 *
 * @param array $args {
 *     @type array  $icon              The icon image data (ACF image array).
 *     @type string $title             The card title.
 *     @type string $description       The card description.
 *     @type array  $primary_button    The primary button data (ACF link array).
 *     @type array  $secondary_button  The secondary button data (ACF link array).
 *     @type string $class             Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

$args += array(
	'icon'             => null,
	'title'            => '',
	'description'      => '',
	'primary_button'   => null,
	'secondary_button' => null,
	'class'            => '',
);

?>

<div class="wcb-flex wcb-flex-col wcb-gap-space-12 <?php echo esc_attr( $args['class'] ); ?>">
	<div class="wcb-flex wcb-flex-col wcb-gap-space-6">
		<?php if ( ! empty( $args['icon']['url'] ) ) : ?>
			<img src="<?php echo esc_url( $args['icon']['url'] ); ?>" alt="<?php echo esc_attr( $args['icon']['alt'] ); ?>" class="wcb-w-[60px] wcb-h-[60px] wcb-object-contain" />
		<?php endif; ?>

		<?php if ( ! empty( $args['title'] ) ) : ?>
			<h3 class="wcb-font-font-1 wcb-font-bold wcb-text-size-5 lg:wcb-text-size-6 wcb-leading-[1.47] wcb-text-color-11">
				<?php echo esc_html( $args['title'] ); ?>
			</h3>
		<?php endif; ?>

		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="wcb-font-font-2 wcb-text-size-2 lg:wcb-text-size-4 wcb-leading-[1.35] wcb-text-color-11">
				<?php echo esc_html( $args['description'] ); ?>
			</p>
		<?php endif; ?>
	</div>

	<?php if ( ! empty( $args['primary_button'] ) || ! empty( $args['secondary_button'] ) ) : ?>
		<div class="wcb-flex wcb-flex-wrap wcb-items-center wcb-gap-y-space-4 wcb-gap-x-space-6">
			<?php
			if ( ! empty( $args['primary_button']['url'] ) && ! empty( $args['primary_button']['title'] ) ) {
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

			if ( ! empty( $args['secondary_button']['url'] ) && ! empty( $args['secondary_button']['title'] ) ) {
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
	<?php endif; ?>
</div>