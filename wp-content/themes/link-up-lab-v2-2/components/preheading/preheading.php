<?php
/**
 * Component: Preheading
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $text      The text content.
 *     @type string $class     Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'text'  => '',
	'class' => '',
);

$base_classes = 'wcb-font-font-1 wcb-font-bold wcb-uppercase wcb-tracking-widest wcb-leading-[1.25em]';
?>

<?php if ( ! empty( $args['text'] ) ) : ?>
	<p class="<?php echo esc_attr( $base_classes ); ?> <?php echo esc_attr( $args['class'] ); ?>">
		<?php echo esc_html( $args['text'] ); ?>
	</p>
<?php endif; ?>