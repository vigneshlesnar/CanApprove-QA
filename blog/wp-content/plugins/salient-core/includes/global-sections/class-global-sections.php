<?php
/**
 * Nectar Global Sections
 *
 * @package Salient Core
 */

 // Exit if accessed directly
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

 
 require_once SALIENT_CORE_ROOT_DIR_PATH.'includes/global-sections/display-options.php';
 require_once SALIENT_CORE_ROOT_DIR_PATH.'includes/global-sections/class-global-sections-render.php';
 
 if( !class_exists('Nectar_Global_Sections') ) {

   class Nectar_Global_Sections {

     private static $instance;

     private function __construct() {

       // Admin.
       $this->register_post_type();
       add_action( 'vc_before_init', array($this, 'register_wpbakery_el') );
       add_action( 'admin_init', array($this, 'admin_notification_manager') );
       add_action( 'wp_ajax_nectar_dismiss_global_sections_notice', array($this,'nectar_dismiss_global_sections_notice') );

  
       // Frontend.
       add_action( 'wp_enqueue_scripts', array($this, 'enqueue_assets') );
       add_action( 'wp', array($this, 'salient_frontend_display') );

       // Shortcode.
       add_action( 'init', array($this, 'salient_global_section_shortcode') );
     }


     /**
      * Determines whether to show an admin notification.
      */
     public function admin_notification_manager() {

      /* bail if WPbakery is not in use */
      if ( !function_exists('vc_editor_post_types') ) {
     		return;
     	}

      $current_post_type   = $this->get_post_type();
     	$wpbakery_post_types = vc_editor_post_types();

     	if ( 'salient_g_sections' !== $current_post_type ||
           in_array('salient_g_sections', $wpbakery_post_types) ||
           get_option( 'nectar_dismiss_global_sections_notice' ) == 'true' ) {
     		return;
     	}


      add_action( 'admin_notices', array($this, 'admin_notification_content') );

      global $Salient_Core;
      wp_register_script( 'nectar-global-sections-notice-update', SALIENT_CORE_PLUGIN_PATH .'/includes/global-sections/js/admin-notices.js', array( 'jquery' ), $Salient_Core->plugin_version);
  	  wp_localize_script( 'nectar-global-sections-notice-update', 'notice_params', array(
  	      'ajaxurl' => esc_url(get_admin_url()) . 'admin-ajax.php',
  	  ));

  	  wp_enqueue_script(  'nectar-global-sections-notice-update' );

    }

  /**
   * Admin notification dismiss.
   */
   public function nectar_dismiss_global_sections_notice() {
       update_option( 'nectar_dismiss_global_sections_notice', 'true' );
       wp_die();
   }

   /**
    * Admin notification content.
    */
    public function admin_notification_content() {
      echo '<div class="notice notice-error nectar-dismiss-notice nectar-bold-notice is-dismissible global-sections">
          <h3>'.esc_html__('The WPbakery page builder is not configured to display in this post type yet. You can change that in the ', 'salient-core') . '<a href="'.esc_url( admin_url('admin.php?page=vc-roles') ).'">'.esc_html__('WPbakery Setting > Role Manager tab','salient-core').'</a></h3><a target="_blank" rel="noreferrer" href="https://themenectar.com/docs/salient/page-builder-global-sections/">'.esc_html__('View documentation','salient') .'</a>
      </div>';
    }

    /**
     * Registers the global section wpbakery element.
     */
    public function register_wpbakery_el() {

      $current_post_type = $this->get_post_type();

      if( 'salient_g_sections' !== $current_post_type ) {
        vc_lean_map('nectar_global_section', null, SALIENT_CORE_ROOT_DIR_PATH . 'includes/global-sections/wpbakery-map.php');
      }

    }


     /**
      * Registers the global section post type/tax.
      */
     public function register_post_type() {

       $post_type_labels = array(
  			 'name'          => esc_html__( 'Global Sections', 'salient-core' ),
  			 'singular_name' => esc_html__( 'Global Section', 'salient-core' ),
  			 'search_items'  => esc_html__( 'Search Global Sections', 'salient-core' ),
  			 'all_items'     => esc_html__( 'Global Sections', 'salient-core' ),
  			 'parent_item'   => esc_html__( 'Parent Global Section', 'salient-core' ),
  			 'edit_item'     => esc_html__( 'Edit Global Section', 'salient-core' ),
  			 'update_item'   => esc_html__( 'Update Global Section', 'salient-core' ),
  			 'add_new_item'  => esc_html__( 'Add New Global Section', 'salient-core' ),
         'add_new'  => esc_html__( 'Add New Global Section', 'salient-core' ),
  		 );

       $public_bool = (is_user_logged_in()) ? true : false;

  		 $args = array(
  			 'labels'              => $post_type_labels,
  			 'singular_label'      => esc_html__( 'Section', 'salient-core' ),
         'public'              => $public_bool,
   			 'publicly_queryable'  => $public_bool,
         'rewrite'             => false,
         'show_in_rest'       => true,
         'exclude_from_search' => true,
  			 'show_ui'             => true,
  			 'hierarchical'        => true,
  			 'menu_position'       => 55,
  			 'menu_icon'           => 'dashicons-layout',
  			 'supports'            => array( 'title', 'editor', 'revisions' ),
  		 );

  		register_post_type( 'salient_g_sections', $args );


      $tax_labels = array(
  			'name'          => esc_html__( 'Global Section Categories', 'salient-core' ),
  			'singular_name' => esc_html__( 'Global Section Category', 'salient-core' ),
  			'search_items'  => esc_html__( 'Search Global Section Categories', 'salient-core' ),
  			'all_items'     => esc_html__( 'Global Section Categories', 'salient-core' ),
  			'parent_item'   => esc_html__( 'Parent Global Section Category', 'salient-core' ),
  			'edit_item'     => esc_html__( 'Edit Global Section Category', 'salient-core' ),
  			'update_item'   => esc_html__( 'Update Global Section Category', 'salient-core' ),
  			'add_new_item'  => esc_html__( 'Add New Global Section Category', 'salient-core' ),
  			'menu_name'     => esc_html__( 'Global Section Categories', 'salient-core' ),
  		);

  		register_taxonomy(
  			'salient_g_sections_category',
  			array( 'salient_g_sections' ),
  			array(
  				'hierarchical' => true,
  				'labels'       => $tax_labels,
  				'show_ui'      => true,
  				'query_var'    => true,
          'public'       => false,
  				'rewrite'      => false,
  			)
  		);

     }

     public function enqueue_assets() {

       if( !defined( 'NECTAR_THEME_NAME' ) || !class_exists('NectarThemeManager')) {
         return;
       }

       $nectar_options = NectarThemeManager::$options;

       if( isset($nectar_options['global-section-after-header-navigation']) &&
           !empty($nectar_options['global-section-after-header-navigation']) ) {
             wp_enqueue_style( 'js_composer_front' );
       }

     }

     /**
      * Attach a global section to a specific theme location.
      */
     public function salient_frontend_display() {

        if( !defined( 'NECTAR_THEME_NAME' ) ||
            !function_exists('get_nectar_theme_options') ||
            !function_exists('nectar_get_full_page_options') ||
            !class_exists('NectarThemeManager') ||
            is_admin() ) {

              return;
        }

        // Disabled on page full screen rows.
        $nectar_fp_options = nectar_get_full_page_options();
        if( 'on' === $nectar_fp_options['page_full_screen_rows'] ) {
          return;
        }

        // Disabled on cpt single edit.
        if( 'salient_g_sections' === get_post_type() ) {
          return;
        }

        $nectar_options = NectarThemeManager::$options;

        $theme_hooks = array(
          'global-section-after-header-navigation' => 'nectar_hook_global_section_after_header_navigation',
          'global-section-above-footer'            => 'nectar_hook_before_container_wrap_close'
        );

        foreach( $theme_hooks as $option => $hook ) {

          if( isset($nectar_options[sanitize_key($option)]) && !empty($nectar_options[sanitize_key($option)]) ) {

            $section_id = intval($nectar_options[sanitize_key($option)]);

            add_action( $hook, array($this, $hook .'_hook' ) );

            // After header section modifcations.
            if( in_array($hook, array('nectar_hook_global_section_after_header_navigation') ) ) {

              $section_status = get_post_status($section_id);

              if( 'publish' === $section_status ) {

                // Deactivate the transparent header effect.
                if( function_exists('nectar_is_contained_header') && nectar_is_contained_header() ) {
                  //// check for contained header and skip if active.
                } else {
                  add_filter('nectar_activate_transparent_header', array($this,'after_header_navigation_remove_transparency'));
                }
                

                // Add body class.
                add_filter( 'body_class', array($this, 'after_header_navigation_body_class') );

              }

            }

          }

        } // end loop.


     }

     /**
      * Modifications based on after header nav global section being used.
      */
     public function after_header_navigation_remove_transparency() {
       return false;
     }
     public function after_header_navigation_body_class($classes) {
       $classes[] = 'global-section-after-header-nav-active';
       return $classes;
     }


     /**
      * Theme location hooks.
      */
     public function nectar_hook_before_container_wrap_close_hook() {

        $nectar_options = NectarThemeManager::$options;
        $id = $nectar_options['global-section-above-footer'];

        echo '<div class="nectar-global-section before-footer"><div class="container normal-container row">' . do_shortcode('[nectar_global_section id="'.intval($id).'"]') . '</div></div>';

     }

     public function nectar_hook_global_section_after_header_navigation_hook() {

        $nectar_options = NectarThemeManager::$options;
        $id = $nectar_options['global-section-after-header-navigation'];

        echo '<div class="nectar-global-section after-nav"><div class="container normal-container row">' .do_shortcode('[nectar_global_section id="'.intval($id).'"]') . '</div></div>';

     }




     /**
      * Determines the current post type.
      */
      public function get_post_type() {

        global $post, $typenow;

        $current_post_type = '';

        if ( $post && $post->post_type ) {
          $current_post_type = $post->post_type;
        }
        elseif( $typenow ) {
          $current_post_type = $typenow;
        }
        else if (!empty($_GET['post'])) {
          $fetched_post = get_post( intval($_GET['post']) );
          if($fetched_post) {
            $current_post_type = (property_exists( $fetched_post, 'post_type') ) ? $fetched_post->post_type : '';
          }
        }
        elseif ( isset( $_REQUEST['post_type'] ) ) {
          return sanitize_text_field($_REQUEST['post_type']);
        }

        return $current_post_type;
      }

      public function salient_global_section_shortcode() {
        // When WPBakery is not being used.
        if ( !defined( 'SALIENT_VC_ACTIVE' ) ) {
          add_shortcode('nectar_global_section', array($this, 'salient_global_section_shortcode_callback') );
        }
      }

      public function salient_global_section_shortcode_callback($atts) {

        extract(shortcode_atts(array(
          "id" => "",
          'enable_display_conditions' => ''
        ), $atts));

        if (!empty($id)) {

          $section_id = intval($id);
          $section_id = apply_filters('wpml_object_id', $section_id, 'post', true);

          if( $section_id === 0 ) {
            return;
          }
          
          $section_status = get_post_status($section_id);
          
          
          $allow_output = true;
          
          if ( $enable_display_conditions === 'yes' ) {
            $allow_output = Nectar_Global_Sections_Render::get_instance()->verify_conditional_display( $section_id );
          }

          if ( 'publish' === $section_status && $allow_output ) {

            $section_content = get_post_field('post_content', $section_id);

            if ($section_content) {

              $unneeded_tags = array(
                '<p>['    => '[',
                ']</p>'   => ']',
                ']<br />' => ']',
                ']<br>'   => ']',
              );

              
              if( function_exists('do_blocks')) {
                $section_content = do_blocks($section_content);
              }
              $section_content = wptexturize( $section_content);
              $section_content = convert_smilies( $section_content );
              $section_content = wpautop( $section_content );
              $section_content = shortcode_unautop( $section_content );
              $section_content = wp_filter_content_tags( $section_content );
              $section_content = strtr($section_content, $unneeded_tags);

              $section_content = apply_filters('nectar_global_section_content_output', $section_content);

              ob_start();
              // Look for dynamic CSS from blocks.
              $dynamic_css = get_post_meta( $section_id, '_nectar_blocks_css', true );
              if ( ! empty( $dynamic_css ) ) {
                echo '<style type="text/css" data-type="nectar-global-section-dynamic-css">'. $dynamic_css .'</style>';
              }
              // TODO: loop through blocks and enqueue core style for each block found.
                // Output section.
              echo do_shortcode($section_content);
              
              $global_section_markup .=  ob_get_contents();
              ob_end_clean();
              
              return $global_section_markup;


            }
          }
        }
      }

     /**
      * Initiator.
      */
     public static function get_instance() {
       if ( !self::$instance ) {
         self::$instance = new self;
       }
       return self::$instance;
     }

   }

    // Init class.
    Nectar_Global_Sections::get_instance();

 }
