<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 */

$el_class = $css = $css_animation = $max_width = $el_id = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );



$class_to_filter = 'wpb_text_column wpb_content_element ' . $this->getCSSAnimation( $css_animation );

// nectar text direction.
if( isset($atts['text_direction']) && in_array($atts['text_direction'], array('ltr','rtl')) ) {
	$class_to_filter .= ' text_direction_'. esc_attr($atts['text_direction']) . ' ';
}

$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id_attr = (!empty($el_id)) ? ' id="'.esc_attr($el_id).'"': '';
?>

<div class="<?php echo esc_attr( $css_class ); ?>" <?php if( !empty($max_width) ) { echo 'style=" max-width: '.intval($max_width).'px; display: inline-block;"'; }; echo $block_id_attr; ?>>
	<div class="wpb_wrapper">
		<?php echo wpb_js_remove_wpautop( $content, true ); ?>
	</div>
</div>



