<?php
/*
Plugin Name: Wp Custom Styling
Plugin URI: http://livertigo.com
Description: WP Custom Styling plugin will add custom designs to posts or pages. You can customize headings, Buttons, blocks.
Author: Aman Yadav
Version: 1.0.2
Author URI: http://amanyadav.in
Copyright: (c) 2017 Aman Yadav(livertigo.com)
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
   header( 'Status: 403 Forbidden' );
   header( 'HTTP/1.1 403 Forbidden' );
exit;
}
// Exit if accessed directly
define( 'LTG_PLUGIN_VERSION', '1.0.2' );
define( 'LTG_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );	
define( 'LTG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
include( LTG_PLUGIN_PATH.'function.php');
 
 
// UPDATE PLUGIN
 
 add_action( 'after_setup_theme', 'mythemeslug_theme_setup' );
 
if ( ! function_exists( 'mythemeslug_theme_setup' ) ) {
	function mythemeslug_theme_setup(){
		/********* Registers an editor stylesheet for the theme ***********/
		add_action( 'admin_init', 'mythemeslug_theme_add_editor_styles' );
		/********* TinyMCE Buttons ***********/
		add_action( 'init', 'mythemeslug_buttons' );
	}
}
 /********* Registers an editor stylesheet for the theme ***********/
if ( ! function_exists( 'mythemeslug_theme_add_editor_styles' ) ) {
	function mythemeslug_theme_add_editor_styles() {
	    add_editor_style( 'ltg-editor-style.css' );
	}
}
 
/********* TinyMCE Buttons ***********/
if ( ! function_exists( 'mythemeslug_buttons' ) ) {
	function mythemeslug_buttons() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
	        return;
	    }
 
	    if ( get_user_option( 'rich_editing' ) !== 'true' ) {
	        return;
	    }
 
	    add_filter( 'mce_external_plugins', 'mythemeslug_add_buttons' );
	    add_filter( 'mce_buttons', 'mythemeslug_register_buttons' );
	}
}
 
if ( ! function_exists( 'mythemeslug_add_buttons' ) ) {
	function mythemeslug_add_buttons( $plugin_array ) {
	    $plugin_array['wpcs_icon'] = LTG_PLUGIN_URL.'assets/js/tinymce_buttons.js';
	    return $plugin_array;
	}
}
 
if ( ! function_exists( 'mythemeslug_register_buttons' ) ) {
	function mythemeslug_register_buttons( $buttons ) {
	    array_push( $buttons, 'wpcs_icon' );
	    return $buttons;
	}
}