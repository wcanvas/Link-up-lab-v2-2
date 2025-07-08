<?php
/**
 * Component: CarouselIndicator
 *
 * @package WCB
 *
 * @param array $args {
 *     @type int    $count         Total number of indicators.
 *     @type int    $active_index  The index of the currently active indicator.
 *     @type string $class         Additional CSS classes for the container.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'count'        => 0,
	'active_index' => 0,
	'class'        => '',
);

$wcb_count        = absint( $args['count'] );
$wcb_active_index = absint( $args['active_index'] );
?>

<?php if ( $wcb_count > 0 ) : ?>
	<div class="wcb-flex wcb-items-center wcb-gap-space-3 <?php echo esc_attr( $args['class'] ); ?>">
		<?php for ( $i = 0; $i < $wcb_count; $i++ ) : ?>
			<?php
			$wcb_indicator_class = $i === $wcb_active_index ? 'wcb-bg-color-1' : 'wcb-bg-color-15';
			?>
			<button
				class="js-carousel-indicator-item wcb-w-space-3 wcb-h-space-3 wcb-rounded-full wcb-transition-colors wcb-duration-300 <?php echo esc_attr( $wcb_indicator_class ); ?>"
				data-slide-index="<?php echo esc_attr( $i ); ?>"
				aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'wcanvas-boilerplate' ), $i + 1 ) ); ?>"
			></button>
		<?php endfor; ?>
	</div>
<?php endif; ?>