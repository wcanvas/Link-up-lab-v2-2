<?php
/**
 * Component: StatCard
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $statistic       The large number or text in the card's header.
 *     @type string $description     The text content within the card body.
 *     @type string $color           The background color for the statistic header ('green', 'yellow').
 *     @type array  $primary_button  ACF link array for the primary button.
 *     @type array  $secondary_button ACF link array for the secondary button.
 *     @type string $class           Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

$args += array(
	'statistic'        => '',
	'description'      => '',
	'color'            => 'green',
	'primary_button'   => array(),
	'secondary_button' => array(),
	'class'            => '',
);

$wcb_bg_class     = '';
$wcb_border_class = '';

switch ( $args['color'] ) {
	case 'yellow':
		$wcb_bg_class     = 'wcb-bg-color-13';
		$wcb_border_class = 'wcb-border-color-13';
		break;
	case 'green':
	default:
		$wcb_bg_class     = 'wcb-bg-color-2';
		$wcb_border_class = 'wcb-border-color-2';
		break;
}

$wcb_primary_button   = $args['primary_button'];
$wcb_secondary_button = $args['secondary_button'];
?>

<div class="wcb-flex wcb-flex-col wcb-gap-space-12 wcb-w-full <?php echo esc_attr( $args['class'] ); ?>">
	<div class="wcb-flex wcb-flex-col">
		<div class="<?php echo esc_attr( $wcb_bg_class ); ?> wcb-py-space-6 wcb-px-space-12 wcb-flex wcb-items-center">
			<p class="wcb-font-font-1 wcb-text-color-4 wcb-text-size-7 lg:wcb-text-size-9 wcb-font-bold">
				<?php echo esc_html( $args['statistic'] ); ?>
			</p>
		</div>
		<div class="wcb-border-l-space-4 wcb-border-solid <?php echo esc_attr( $wcb_border_class ); ?> wcb-pt-space-4 wcb-px-space-12">
			<p class="wcb-font-font-2 wcb-text-color-11 wcb-text-size-3 md:wcb-text-size-4 wcb-leading-relaxed">
				<?php echo wp_kses_post( $args['description'] ); ?>
			</p>
		</div>
	</div>
	<div class="wcb-flex wcb-flex-wrap wcb-items-center wcb-gap-x-space-11 wcb-gap-y-space-4">
		<?php if ( ! empty( $wcb_primary_button['url'] ) && ! empty( $wcb_primary_button['title'] ) ) : ?>
			<?php
			$wcb_primary_button_comp = new Component(
				'button',
				array(
					'text'    => $wcb_primary_button['title'],
					'href'    => $wcb_primary_button['url'],
					'target'  => $wcb_primary_button['target'] ?? '',
					'variant' => 'solid-light',
				)
			);
			$wcb_primary_button_comp->render();
			?>
		<?php endif; ?>
		<?php if ( ! empty( $wcb_secondary_button['url'] ) && ! empty( $wcb_secondary_button['title'] ) ) : ?>
			<?php
			$wcb_secondary_button_comp = new Component(
				'button',
				array(
					'text'    => $wcb_secondary_button['title'],
					'href'    => $wcb_secondary_button['url'],
					'target'  => $wcb_secondary_button['target'] ?? '',
					'variant' => 'outline-light',
				)
			);
			$wcb_secondary_button_comp->render();
			?>
		<?php endif; ?>
	</div>
</div>