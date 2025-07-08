<?php
/**
 * Component: Image
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $src       Image URL.
 *     @type string $alt       Image alt text.
 *     @type string $class     Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'src'   => '',
	'alt'   => '',
	'class' => '',
);
?>

<?php if ( ! empty( $args['src'] ) ) : ?>
	<img
		src="<?php echo esc_url( $args['src'] ); ?>"
		alt="<?php echo esc_attr( $args['alt'] ); ?>"
		class="<?php echo esc_attr( $args['class'] ); ?>"
	/>
<?php endif; ?>