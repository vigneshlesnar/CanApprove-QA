<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

extract(shortcode_atts(array(
	'text_color' => '',
    'type' => 'default',
    'navigation' => '',
), $atts));

$featured_media = '';
global $post;
$page_full_screen_rows = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows', true) : '';
if ( 'on' === $page_full_screen_rows ) {
    $atts['navigation'] = '';
    $navigation = '';
}

preg_match_all( '/\[nectar_sticky_media_section(\s.*?)?\]/s', $content, $matches, PREG_SET_ORDER  );

$count = 0;

if (!empty($matches)) {
    foreach ($matches as $shortcode) {
        
        if( !isset($shortcode[0]) ) {
            return;
        }

        if( strpos($shortcode[0],'[') !== false && strpos($shortcode[0],']') !== false ) {
            $shortcode_inner = substr($shortcode[0], 1, -1);
        } else {
            $shortcode_inner = $shortcode[0];
        }

         // Shortcode vars
        $inner_atts = shortcode_parse_atts($shortcode_inner);
        $section_type = ( isset($inner_atts['section_type']) ) ? $inner_atts['section_type'] : '';
        $section_image = ( isset($inner_atts['image']) ) ? $inner_atts['image'] : '';
        $section_color = ( isset($inner_atts['section_color']) ) ? $inner_atts['section_color'] : '';
        $section_mp4 = ( isset($inner_atts['video_mp4']) ) ? $inner_atts['video_mp4'] : '';
        $section_webm = ( isset($inner_atts['video_webm']) ) ? $inner_atts['video_webm'] : '';
        $section_video_fit = ( isset($inner_atts['video_fit']) ) ? $inner_atts['video_fit'] : 'cover'; 
        $section_video_align = ( isset($inner_atts['video_alignment']) ) ? $inner_atts['video_alignment'] : 'default'; 
        $section_video_func = ( isset($inner_atts['video_functionality']) ) ? $inner_atts['video_functionality'] : 'loop';  
        $media_asset = '';
        $video = '';

        // Section Type
        //// Image.
        if( 'image' === $section_type ) {

            $image_src = '';
            if( preg_match('/^\d+$/', $section_image) ) {
                $image_arr = wp_get_attachment_image_src($section_image, 'full');

                if (isset($image_arr[0])) {
                    $image_src = $image_arr[0];
                }
            } 
            else {
                $image_src = $section_image;
            }

            // Lazy load.
            if( $count != 0 ) {
                $media_asset = 'data-nectar-img-src="'.esc_attr($image_src).'"';
            } else {
                $media_asset = ' style="background-image:url('.esc_attr($image_src).')"';
            }
            
        } 

        //// Video.
        else if( 'video' === $section_type  ) {
            
            $video_classes = array('fit-'.esc_attr($section_video_fit));

            $loop_attr = 'loop';

            if('no-loop' === $section_video_func) {
                $loop_attr = '';
                $video_classes[] = 'no-loop';
            }

            if( 'cover' === $section_video_fit ) {
                $video_classes[] = 'align-'.esc_attr($section_video_align);
            }

        
            $video_classes[] = 'nectar-lazy-video';

            $video = '<video width="1800" height="700" preload="auto" '.$loop_attr.' muted playsinline class="'.nectar_clean_classnames(implode(' ',$video_classes)).'">';
            if(!empty($section_webm)) { $video .= '<source data-nectar-video-src="'. esc_url( $section_webm ) .'" type="video/webm">'; }
            if(!empty($section_mp4)) { $video .= '<source data-nectar-video-src="'. esc_url( $section_mp4 ) .'"  type="video/mp4">'; }
                $video .= '</video>';
    
        } 
        //// Color.
        else if ( 'color' === $section_type  ) {
            $media_asset = ' style="background-color:'.esc_attr($section_color).'"';
        }

    

        $active_class = ($count === 0) ? ' active' : '';
        $featured_media .= '<div class="nectar-sticky-media-section__media-wrap'.$active_class.'"><div class="nectar-sticky-media-section__media"'.$media_asset.' data-type="'.esc_attr($section_type).'">'.$video.'</div></div>';
        
       $count++;

    }
}


// style classes.
$el_classes = array('nectar-sticky-media-sections');

if( function_exists('nectar_el_dynamic_classnames') ) {
	$el_classes[] = nectar_el_dynamic_classnames('nectar_sticky_media_sections', $atts);
} 


$GLOBALS['nectar-sticky-media-section-count'] = 0;
$GLOBALS['nectar-sticky-media-type'] = $type;
echo '<div class="'.nectar_clean_classnames(implode(' ',$el_classes)).'">';
if ( $type === 'scroll-pinned-sections') {
    $navigation_markup = '';
    if ( 'yes' === $navigation ) {
        $navigation_markup .= '<div class="nectar-sticky-media-section__navigation"><div class="nectar-sticky-media-section__navigation__inner">';
        // create button for each section
        for ($i = 1; $i <= $count; $i++) {
            $navigation_markup .= '<button class="nectar-sticky-media-section__navigation-button">'.esc_attr($i).'</button>';
        }
        $navigation_markup .= '</div></div>';
    }
    echo $navigation_markup . '<div class="nectar-sticky-media-section__content__wrap">' . do_shortcode(wp_kses_post($content)) . '</div>';
} else {
    echo '<div class="nectar-sticky-media-section__featured-media">'.$featured_media.'</div>';
    echo '<div class="nectar-sticky-media-section__content">' . do_shortcode(wp_kses_post($content)) . '</div>';
}

echo '</div>';