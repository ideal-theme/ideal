<?php
/**
 * Ideal Dynamic Js Generator for admin .
 *
 * @package Ideal
 * @since 1.0
 */
// Exit if accessed this directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$ideal_options = get_ideal_theme_options();
/**
 * 
 * loading Dynamic js via WP ajax
 *  
 * */

  $random_number = rand( 0, 99999 );
  $ideal_theme = wp_get_theme();
  $cc_v = wp_get_theme()->get( 'Version' );


  function ideal_ad_dynamic_js_enqueue() {
      wp_enqueue_script( 'ideal-ad-dynamic-js', admin_url( 'admin-ajax.php' ).'?action=ad_dynamic_js&_wpnonce=' . wp_create_nonce( 'dynamic-ad-js-nonce' ), array(), time() , true );
  }
  function ideal_ad_dynamic_js() { 

      $nonce = $_REQUEST['_wpnonce'];
      if ( ! wp_verify_nonce( $nonce, 'dynamic-ad-js-nonce' ) ) {
        die( 'invalid nonce' );
      } else { 
      
        include IDEAL_THEME_DIRECTORY . '/includes/admin/assets/js/ad-dynamic.php'; 

      }
      exit;
  }
  add_action( 'wp_ajax_ad_dynamic_js', 'ideal_ad_dynamic_js' );
  add_action( 'wp_ajax_nopriv_ad_dynamic_js', 'ideal_ad_dynamic_js' );
  add_action( 'admin_enqueue_scripts', 'ideal_ad_dynamic_js_enqueue' ); 

