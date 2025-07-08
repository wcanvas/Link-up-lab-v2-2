<?php
/**
 * Component: Button
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $text      The button text.
 *     @type string $href      The button URL.
 *     @type string $target    The link target attribute.
 *     @type string $variant   The button style variant ('solid-black', 'outline-black').
 *     @type string $class     Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'text'    => '',
	'href'    => '#',
	'target'  => '',
	'variant' => 'solid-black',
	'class'   => '',
);

$wcb_base_classes = 'wcb-inline-block wcb-text-center wcb-no-underline wcb-cursor-pointer wcb-font-font-1 wcb-text-size-2 wcb-font-bold wcb-rounded-radius-3 wcb-px-space-10 wcb-py-space-1 wcb-transition-colors wcb-duration-300';

$wcb_variant_classes = '';
switch ( $args['variant'] ) {
	case 'outline-black':
		$wcb_variant_classes = 'wcb-bg-transparent wcb-text-color-4 wcb-border-2 wcb-border-solid wcb-border-color-4 hover:wcb-bg-color-4 hover:wcb-text-color-11';
		break;
	case 'solid-black':
	default:
		$wcb_variant_classes = 'wcb-bg-color-4 wcb-text-color-3 wcb-border wcb-border-solid wcb-border-color-4 hover:wcb-bg-color-11 hover:wcb-text-color-4';
		break;
}

$wcb_target_attr = $args['target'] ? 'target="' . esc_attr( $args['target'] ) . '"' : '';
?>

<?php if ( ! empty( $args['text'] ) && ! empty( $args['href'] ) ) : ?>
	<a href="<?php echo esc_url( $args['href'] ); ?>" class="<?php echo esc_attr( $wcb_base_classes ); ?> <?php echo esc_attr( $wcb_variant_classes ); ?> <?php echo esc_attr( $args['class'] ); ?>" <?php echo wp_kses_post( $wcb_target_attr ); ?>>
		<?php echo esc_html( $args['text'] ); ?>
	</a>
<?php endif; ?>