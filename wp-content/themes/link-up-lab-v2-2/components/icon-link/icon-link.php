<?php
/**
 * Component: IconLink
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $text      The link text.
 *     @type string $href      The link URL.
 *     @type string $variant   The link style variant ('primary', 'secondary', 'black-all-caps', 'highlighted').
 *     @type string $class     Additional CSS classes.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

$args += array(
	'text'    => '',
	'href'    => '#',
	'variant' => 'primary',
	'class'   => '',
);

$base_classes = 'wcb-inline-flex wcb-items-center wcb-gap-space-3 wcb-cursor-pointer wcb-no-underline';
$text_classes = '';
$arrow_url    = '';
$arrow_class  = '';

switch ( $args['variant'] ) {
	case 'black-all-caps':
		$text_classes = 'wcb-font-font-1 wcb-text-color-4 wcb-text-size-2 lg:wcb-text-size-3 wcb-font-bold wcb-tracking-[8%] wcb-uppercase';
		$arrow_url    = 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81de-893b-f9d2aff6ce61/822:21939.svg';
		$arrow_class  = 'wcb-w-[14px] wcb-h-[12px]';
		break;
	case 'highlighted':
		$text_classes = 'wcb-font-font-1 wcb-text-color-2 wcb-text-size-2 lg:wcb-text-size-3 wcb-font-bold wcb-uppercase wcb-tracking-[8%]';
		$arrow_url    = 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-818a-80d3-fdeefe6daf05/671:3647.svg';
		$arrow_class  = 'wcb-w-[14px] wcb-h-[12px]';
		break;
	case 'secondary':
		$text_classes = 'wcb-font-font-5 wcb-text-color-8 wcb-text-size-1 wcb-font-normal wcb-uppercase wcb-tracking-[0.03em] wcb-border-b wcb-border-solid wcb-border-color-8';
		$arrow_url    = 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-816b-a603-e2212cb88042/I477:2448;390:27089;4003:14638.svg';
		$arrow_class  = 'wcb-w-space-9 wcb-h-space-9';
		break;
	case 'primary':
	default:
		$text_classes = 'wcb-font-font-5 wcb-text-color-6 wcb-text-size-1 wcb-font-normal wcb-uppercase wcb-tracking-[0.03em] wcb-border-b wcb-border-solid wcb-border-color-6';
		$arrow_url    = 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-816b-a603-e2212cb88042/I477:2441;4663:6985;222:7753;222:8371.svg';
		$arrow_class  = 'wcb-w-space-9 wcb-h-space-9';
		break;
}
?>

<?php if ( ! empty( $args['text'] ) && ! empty( $args['href'] ) ) : ?>
	<a href="<?php echo esc_url( $args['href'] ); ?>" class="<?php echo esc_attr( $base_classes ); ?> <?php echo esc_attr( $text_classes ); ?> <?php echo esc_attr( $args['class'] ); ?>">
		<span><?php echo esc_html( $args['text'] ); ?></span>
		<?php if ( $arrow_url ) : ?>
			<img src="<?php echo esc_url( $arrow_url ); ?>" alt="arrow icon" class="<?php echo esc_attr( $arrow_class ); ?>" />
		<?php endif; ?>
	</a>
<?php endif; ?>