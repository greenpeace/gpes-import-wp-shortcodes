<?php
/**
 * Plugin Name: Import text URL UI
 * Plugin URI: https://github.com/greenpeace/gpes-import-wp-shortcodes/
 * Version: 1.1
 * Description: Adds an GUI to use the [import_text_url] shortcode. This plugin requires the plugin Shortcake (Shortcode UI)
 * Author: Osvaldo Gago
 * Author URI: https://osvaldo.pt
 * Text Domain: import-text-url-ui
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) or die( 'You can\'t do that !' );

/**
 * Initiate plugin's translations
 */
function import_text_url_load_plugin_textdomain() {
    load_plugin_textdomain( 'import-text-url-ui', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'import_text_url_load_plugin_textdomain' );

/**
 * Shortcake UI detection
 */
function shortcode_ui_import_text_url_detection() {
	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		add_action( 'admin_notices', 'shortcode_ui_import_text_url_notices' );
	}
}

function shortcode_ui_import_text_url_notices() {
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="error message">
			<p><?php __('Shortcode UI plugin must be active for Shortcode UI Import Text URL plugin to function.', 'import-text-url-ui') ?></p>		
        </div>
		<?php
	}
}

add_action( 'init', 'shortcode_ui_import_text_url_detection' );

/**
 * UI for the shortcode import_text_url
 */
function shortcode_ui_import_text_url() {
    
    $import_text_url_fields = array(
        array(
			'label'  => __('URL to import', 'import-text-url-ui'),
			'description'  => __('Add the URL to a text file (html, css, js, svg) For example: <strong>https://apps.greenpeace.es/data-vis/import/chart.html</strong>', 'import-text-url-ui'),
			'attr'   => 'url',
			'type'   => 'text',
			'encode' => false,
			'meta'   => array(
				'placeholder' => 'https://',
				'data-test'   => 1,
			),
		),
    );
    
    $import_text_url_args = array(
		'label' => __('Import text URL', 'import-text-url-ui'),
		'listItemImage' => 'dashicons-media-code',
		'attrs' => $import_text_url_fields,
	);
        
    shortcode_ui_register_for_shortcode( 'import_text_url', $import_text_url_args );
}

add_action( 'register_shortcode_ui', 'shortcode_ui_import_text_url' );

?>
