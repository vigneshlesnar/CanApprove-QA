<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = $el_class = $value = $label_value= $units = '';

extract(shortcode_atts(array(
'title' => '',
'el_class' => '',
'value' => '50',
'units' => '',
'color' => '#27CFC3',
'label_value' => ''
), $atts));

wp_enqueue_script('vc_pie');

$el_class = $this->getExtraClass( $el_class );
$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_pie_chart wpb_content_element'.esc_attr($el_class), $this->settings['base'], $atts);

$pie_value = strip_tags(htmlspecialchars_decode($value));
$pie_label_value = strip_tags(htmlspecialchars_decode($label_value));
$pie_units = strip_tags(htmlspecialchars_decode($units));

$output = "\n\t".'<div class= "'.esc_attr($css_class).'" data-pie-value="'.esc_attr($pie_value).'" data-pie-label-value="'.esc_attr($pie_label_value).'" data-pie-units="'.esc_attr($pie_units).'" data-pie-color="'.htmlspecialchars(hex2rgba($color, 1)).'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
    $output .= "\n\t\t\t".'<div class="vc_pie_wrapper '.esc_attr(strtolower($color)).'">';
        $output .= "\n\t\t\t".'<span style="border-color: '.htmlspecialchars(hex2rgba($color, 1)).';" class="vc_pie_chart_back"></span>';
        $output .= "\n\t\t\t".'<span style="color: '.esc_attr($color).';" class="vc_pie_chart_value"></span>';
        $output .= "\n\t\t\t".'<canvas width="101" height="101"></canvas>';
        $output .= "\n\t\t\t".'</div>';
    if ($title != '') {
      $output .= '<h4 class="wpb_heading wpb_pie_chart_heading">'.wp_kses_post($title).'</h4>';
    }

$output .= "\n\t\t".'</div>';
$output .= "\n\t".'</div>'."\n";

echo $output; // WPCS: XSS ok.