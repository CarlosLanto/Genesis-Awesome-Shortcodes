<?php
/*
Plugin Name: Genesis Awesome Shortcodes Plugin
Description: Just Other Genesis plugin than add super-awesome funcionalities and Shortcodes to your Genesis Theme.
Version: 0.1
License: GPL
Author: Carlos Lanto
Author URI: http://serblogger.org/design/genesis-awesome-plugin
*/

/*		Load Boostrap and Style
----------------------------------------------------*/
function gas_shortcodes() {
        wp_enqueue_style( 'gas shortcodes', plugin_dir_url( __FILE__ ) . '/css/shortcodes.css', array(), '0.1', 'screen' );
        wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . '/css/bootstrap.css' );
		wp_enqueue_script( 'bootstrap-js', plugin_dir_url( __FILE__ ) . '/js/bootstrap.min.js', array('jquery'), true );
}
add_action( 'wp_enqueue_scripts', 'gas_shortcodes' );

/**  Fix Shortcodes  */	
if( !function_exists('gas_shortcodes') ) {
	function gas_shortcodes($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'gas_shortcodes');
}

/*		Shortcodes
----------------------------------------------------*/
/** Add content box shortcodes */

	function gas_alert_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'color' => 'success'
	    ), $atts));
		
	   return '<div class="alert alert-'.$color.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('gas-box', 'gas_alert_box');

/** Add column shortcodes */
	function gas_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'color' => 'success',
			'size' => ''
	    ), $atts));
		
	   return '<a target="'.$target.'" class="btn btn-'.$color.' btn-'.$size.'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('gas-btn', 'gas_button');

/** Add column shortcodes */

	function one_half_first() {
	return '<div class="one-half first">';
	}
	add_shortcode("one-half first","one_half_first");

	function one_half() {
	return '<div class="one-half">';
	}
	add_shortcode('one-half','one_half');

	function one_third_first() {
	return '<div class="one-third first">';
	}
	add_shortcode("one-third first","one_third_first");

	function one_third() {
	return '<div class="one-third">';
		}
	add_shortcode('one-third','one_third');

	function one_fourth_first() {
	return '<div class="one-fourth first">';
	}
	add_shortcode("one-fourth first","one_fourth_first");

	function one_fourth() {
	return '<div class="one-fourth">';
	}
	add_shortcode('one-fourth','one_fourth');

	function one_fifth_first() {
	return '<div class="one-fifth first">';
	}
	add_shortcode("one-fifth first","one_fifth_first");

	function one_fifth() {
	return '<div class="one-fifth">';
	}
	add_shortcode('one-fifth','one_fifth');

	function one_sixth_first() {
	return '<div class="one-sixth first">';
	}
	add_shortcode("one-sixth first","one_sixth_first");

	function one_sixth() {
	return '<div class="one-sixth">';
	}
	add_shortcode('one-sixth','one_sixth');

	function end_column() {
	return '</div>';
	}
	add_shortcode('end','end_column');

/*		Plugin Ends Just here 
----------------------------------------------------*/
?>