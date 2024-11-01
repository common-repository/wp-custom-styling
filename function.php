<?php
 //TODO check if edit post / edit page & only include if on one of those pages
			add_action('admin_footer', 'render_wpcs_model' );
	
	function render_wpcs_model(){
		echo file_get_contents(LTG_PLUGIN_PATH.'/templates/wpcs-model.html');
	}	
	
	add_action( 'admin_enqueue_scripts', 'wpcs_enqueue_color_picker' );
function wpcs_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wpcs_Style', LTG_PLUGIN_URL.'assets/css/ltg-editor-style.css');
	wp_enqueue_style( 'wpcs_fa_icons', LTG_PLUGIN_URL.'assets/app/font-awesome/css/font-awesome.min.css');
	wp_enqueue_script('wpcs-iconpicker', LTG_PLUGIN_URL . 'assets/app/fonticonpicker/jquery.fonticonpicker.min.js', array() , LTG_PLUGIN_VERSION, true);
	wp_enqueue_style('wpcs-iconpicker', LTG_PLUGIN_URL . 'assets/app/fonticonpicker/css/jquery.fonticonpicker.min.css', false, LTG_PLUGIN_VERSION, 'all');
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wpcs-color_picker', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );	
}
function wpcs_add_editor_styles() {
add_editor_style(LTG_PLUGIN_URL.'assets/css/ltg-editor-style.css' );
add_editor_style(LTG_PLUGIN_URL.'assets/app/font-awesome/css/font-awesome.min.css');
	
}
add_action( 'admin_init', 'wpcs_add_editor_styles' );
function wpcs_scripts() {
    wp_enqueue_style( 'wpcs_Style', LTG_PLUGIN_URL.'assets/css/ltg-editor-style.css');
	wp_enqueue_style( 'wpcs_fa_icons', LTG_PLUGIN_URL.'assets/app/font-awesome/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', 'wpcs_scripts' );
 