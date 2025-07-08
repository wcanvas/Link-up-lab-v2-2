<?php
/**
 * Component: Icon
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $name      The name of the icon to display.
 *     @type string $class     Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

$args += array(
	'name'  => '',
	'class' => '',
);

$wcb_icon_html = '';

switch ( $args['name'] ) {
	case 'facebook':
		$wcb_icon_html = '<img src="https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81b9-a584-c61477533fb2/821:20202.svg" alt="Facebook" class="' . esc_attr( $args['class'] ) . '" />';
		break;
	case 'youtube':
		$wcb_icon_html = '<img src="https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81b9-a584-c61477533fb2/821:20204.svg" alt="YouTube" class="' . esc_attr( $args['class'] ) . '" />';
		break;
	case 'x':
		$wcb_icon_html = '<img src="https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81b9-a584-c61477533fb2/821:20205.svg" alt="X" class="' . esc_attr( $args['class'] ) . '" />';
		break;
	case 'search':
		$wcb_icon_html = '<svg class="' . esc_attr( $args['class'] ) . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.6" fill="none" /><line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="1.6" /></svg>';
		break;
	case 'hamburger':
		$wcb_icon_html = '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr( $args['class'] ) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>';
		break;
	case 'close':
		$wcb_icon_html = '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr( $args['class'] ) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>';
		break;
	case 'arrow-left':
		$wcb_icon_html = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="' . esc_attr( $args['class'] ) . '"><path d="M11.75 5.25H2.56L5.03 2.78L4.25 2L0.25 6L4.25 10L5.03 9.22L2.56 6.75H11.75V5.25Z" fill="currentColor"/></svg>';
		break;
	case 'arrow-right':
		$wcb_icon_html = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="' . esc_attr( $args['class'] ) . '"><path d="M0.25 6.75H9.44L6.97 9.22L7.75 10L11.75 6L7.75 2L6.97 2.78L9.44 5.25H0.25V6.75Z" fill="currentColor"/></svg>';
		break;
}

if ( ! empty( $wcb_icon_html ) ) {
	// Using wp_kses_post to allow SVG and img tags and attributes.
	echo wp_kses_post( $wcb_icon_html );
}