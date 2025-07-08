<?php
/**
 * Component: Nav Link
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $text        The link text.
 *     @type string $href        The link URL.
 *     @type string $target      The link target attribute.
 *     @type bool   $is_active   Whether the link is for the current page.
 *     @type string $class       Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'text'      => '',
	'href'      => '#',
	'target'    => '',
	'is_active' => false,
	'class'     => '',
);

$wcb_base_classes   = 'wcb-no-underline wcb-cursor-pointer wcb-transition-colors wcb-duration-300';
$wcb_active_classes = $args['is_active'] ? 'wcb-bg-color-13' : '';

?>

<a href="<?php echo esc_url( $args['href'] ); ?>"
   target="<?php echo esc_attr( $args['target'] ); ?>"
   class="<?php echo esc_attr( $wcb_base_classes ); ?> <?php echo esc_attr( $wcb_active_classes ); ?> <?php echo esc_attr( $args['class'] ); ?>">
	<?php echo esc_html( $args['text'] ); ?>
</a>