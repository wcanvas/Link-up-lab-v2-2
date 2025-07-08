<?php
/**
 * Component: SocialIconLink
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $icon_name The name of the social icon (e.g., 'youtube', 'instagram').
 *     @type string $href      The URL for the social media profile.
 *     @type string $class     Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

if ( ! function_exists( 'wcb_get_social_icon_src' ) ) {
	/**
	 * Get the source URL for a given social icon name.
	 *
	 * @param string $name The name of the icon.
	 * @return string|null The URL of the icon SVG, or null if not found.
	 */
	function wcb_get_social_icon_src( $name ) {
		$icon_map = array(
			'youtube'   => 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81f6-a977-c73cbe5372e2/821:20338.svg',
			'instagram' => 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81f6-a977-c73cbe5372e2/821:20339.svg',
			'facebook'  => 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81f6-a977-c73cbe5372e2/821:20344.svg',
		);
		return isset( $icon_map[ $name ] ) ? $icon_map[ $name ] : null;
	}
}

$args += array(
	'icon_name' => '',
	'href'      => '#',
	'class'     => '',
);

$wcb_icon_src = wcb_get_social_icon_src( $args['icon_name'] );

if ( ! $wcb_icon_src ) {
	return;
}
?>

<a href="<?php echo esc_url( $args['href'] ); ?>" target="_blank" rel="noopener noreferrer" class="wcb-no-underline wcb-cursor-pointer <?php echo esc_attr( $args['class'] ); ?>">
	<?php
	$icon_comp = new Component(
		'image',
		array(
			'src'   => $wcb_icon_src,
			'alt'   => sprintf( /* translators: %s: Social media platform name */ esc_attr__( '%s icon', 'wcanvas-boilerplate' ), esc_attr( $args['icon_name'] ) ),
			'class' => 'wcb-w-10 wcb-h-10',
		)
	);
	$icon_comp->render();
	?>
</a>