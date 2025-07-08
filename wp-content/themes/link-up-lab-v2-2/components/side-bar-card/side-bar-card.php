<?php
/**
 * Component: SideBarCard
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $title            The title for the card.
 *     @type string $description      The descriptive text within the card.
 *     @type array  $primary_button   The primary button link array from ACF.
 *     @type array  $secondary_button The secondary button link array from ACF.
 *     @type string $class            Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

$args += array(
	'title'            => '',
	'description'      => '',
	'primary_button'   => array(),
	'secondary_button' => array(),
	'class'            => '',
);

$wcb_primary_button   = $args['primary_button'];
$wcb_secondary_button = $args['secondary_button'];
?>

<div class="wcb-flex wcb-gap-space-4 wcb-w-full wcb-max-w-[550px] lg:wcb-max-w-none <?php echo esc_attr( $args['class'] ); ?>">
	<div class="wcb-w-space-4 wcb-bg-color-1 wcb-flex-shrink-0"></div>
	<div class="wcb-pl-space-6 lg:wcb-pl-space-15">
		<?php if ( ! empty( $args['title'] ) ) : ?>
			<h3 class="wcb-font-font-1 wcb-text-color-4 wcb-text-size-4 lg:wcb-text-size-6 wcb-font-bold wcb-mb-space-4">
				<?php echo esc_html( $args['title'] ); ?>
			</h3>
		<?php endif; ?>

		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="wcb-font-font-2 wcb-text-color-4 wcb-text-size-3 lg:wcb-text-size-5 wcb-font-normal wcb-leading-[1.44] wcb-mb-space-9">
				<?php echo esc_html( $args['description'] ); ?>
			</p>
		<?php endif; ?>

		<div class="wcb-flex wcb-flex-wrap wcb-gap-space-6 sm:wcb-gap-space-11">
			<?php if ( ! empty( $wcb_primary_button['url'] ) && ! empty( $wcb_primary_button['title'] ) ) : ?>
				<?php
				$wcb_button_primary_comp = new Component(
					'button',
					array(
						'text'    => $wcb_primary_button['title'],
						'href'    => $wcb_primary_button['url'],
						'target'  => $wcb_primary_button['target'],
						'variant' => 'solid-black',
					)
				);
				$wcb_button_primary_comp->render();
				?>
			<?php endif; ?>

			<?php if ( ! empty( $wcb_secondary_button['url'] ) && ! empty( $wcb_secondary_button['title'] ) ) : ?>
				<?php
				$wcb_button_secondary_comp = new Component(
					'button',
					array(
						'text'    => $wcb_secondary_button['title'],
						'href'    => $wcb_secondary_button['url'],
						'target'  => $wcb_secondary_button['target'],
						'variant' => 'outline-black',
					)
				);
				$wcb_button_secondary_comp->render();
				?>
			<?php endif; ?>
		</div>
	</div>
</div>