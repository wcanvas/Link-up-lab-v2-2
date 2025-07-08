<?php
/**
 * Component: Heading
 *
 * @package WCB
 *
 * @param array $args {
 *     @type int    $level     Heading level (1-6).
 *     @type string $text      The text/HTML content.
 *     @type string $class     Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'level' => 1,
	'text'  => '',
	'class' => '',
);

$tag = 'h' . absint( $args['level'] );

// Ensure level is within 1-6 range.
if ( absint( $args['level'] ) < 1 || absint( $args['level'] ) > 6 ) {
	$tag = 'h1';
}
?>

<?php if ( ! empty( $args['text'] ) ) : ?>
	<<?php echo esc_attr( $tag ); ?> class="<?php echo esc_attr( $args['class'] ); ?>">
		<?php echo wp_kses_post( $args['text'] ); ?>
	</<?php echo esc_attr( $tag ); ?>>
<?php endif; ?>