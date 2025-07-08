<?php
/**
 * Component: SearchInput
 *
 * @package WCB
 *
 * @param array $args {
 *     @type string $placeholder Placeholder text for the input.
 *     @type string $class       Additional CSS classes for the wrapper.
 * }
 */

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\Component;

$args += array(
	'placeholder' => '',
	'class'       => '',
);
?>

<div class="wcb-relative wcb-w-full wcb-max-w-[353px] <?php echo esc_attr( $args['class'] ); ?>">
	<input
		type="text"
		placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
		class="js-search-input wcb-w-full wcb-bg-transparent wcb-border-b-space-2 wcb-border-solid wcb-border-color-1 wcb-pb-space-4 wcb-pr-space-12 wcb-text-color-4 placeholder:wcb-text-color-4 wcb-font-font-2 wcb-text-size-2 md:wcb-text-size-4 focus:wcb-outline-none"
	/>
	<button class="js-search-button wcb-absolute wcb-right-0 wcb-top-0 wcb-h-full wcb-flex wcb-items-center wcb-cursor-pointer wcb-bg-transparent wcb-border-none wcb-p-0">
		<?php
		$icon_comp = new Component(
			'image',
			array(
				'src'   => 'https://ai-bot-v2.s3.us-east-2.amazonaws.com/generated/68348df8a2283e7a16d47b9b/686c5fbefe13ca185568512f/figma/2294d94e-8f62-81f6-a977-c73cbe5372e2/I821:20349;1370:7251.svg',
				'alt'   => __( 'Search Icon', 'wcanvas-boilerplate' ),
				'class' => 'wcb-w-6 wcb-h-6',
			)
		);
		$icon_comp->render();
		?>
	</button>
</div>