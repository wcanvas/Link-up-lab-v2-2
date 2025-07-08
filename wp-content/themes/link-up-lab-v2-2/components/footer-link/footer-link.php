<?php
/**
 * Component: FooterLink
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $text    The link text.
 *     @type string $href    The link URL.
 *     @type string $target  The link target attribute.
 *     @type string $class   Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'text'   => '',
	'href'   => '#',
	'target' => '',
	'class'  => '',
);
?>

<a
	href="<?php echo esc_url( $args['href'] ); ?>"
	target="<?php echo esc_attr( $args['target'] ); ?>"
	class="wcb-font-font-1 wcb-text-color-14 wcb-text-size-3 wcb-font-bold wcb-no-underline hover:wcb-underline wcb-cursor-pointer <?php echo esc_attr( $args['class'] ); ?>"
>
	<?php echo esc_html( $args['text'] ); ?>
</a>