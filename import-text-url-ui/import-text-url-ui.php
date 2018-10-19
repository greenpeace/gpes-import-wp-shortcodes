<?php
/**
 * Plugin Name: Import text URL UI
 * Plugin URI: https://github.com/greenpeace/gpes-import-wp-shortcodes/
 * Version: 0.1
 * Description: Adds an GUI to use the [import_text_url] shortcode. This plugin requires the plugin Shortcake (Shortcode UI)
 * Author: Osvaldo Gago
 * Author URI: https://osvaldo.pt
 * Text Domain: import-text-url
 * Domain Path: /languages
 */

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
			<p>Shortcode UI plugin must be active for Shortcode UI Example plugin to function.</p>
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
			'label'  => 'URL to import',
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
		'label' => 'Import text URL',
		'listItemImage' => 'dashicons-media-code',
		'attrs' => $import_text_url_fields,
	);
        
    shortcode_ui_register_for_shortcode( 'import_text_url', $import_text_url_args );
}

add_action( 'register_shortcode_ui', 'shortcode_ui_import_text_url' );

?>
