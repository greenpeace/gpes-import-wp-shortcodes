<?php
/**
 * Plugin Name: Import text file UI
 * Plugin URI: https://github.com/greenpeace/gpes-import-wp-shortcodes/
 * Version: 0.2
 * Description: Adds an GUI to use the [import_text_file] shortcode. This plugin requires the plugin Shortcake (Shortcode UI)
 * Author: Osvaldo Gago
 * Author URI: https://osvaldo.pt
 * Text Domain: import-text-file-ui
 * Domain Path: /languages
 */

/**
 * Shortcake UI detection
 */
function shortcode_ui_import_text_file_detection() {
	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		add_action( 'admin_notices', 'shortcode_ui_import_text_file_notices' );
	}
}

function shortcode_ui_import_text_file_notices() {
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="error message">
			<p>Shortcode UI plugin must be active for Shortcode UI Import Text File plugin to function.</p>
		</div>
		<?php
	}
}

add_action( 'init', 'shortcode_ui_import_text_file_detection' );

/**
 * UI for the shortcode import_text_file
 */
function shortcode_ui_import_text_file() {
    
    $import_text_file_fields = array(
        array(
			'label'  => 'File path to import',
			'description'  => 'Add the filepath of the file, from the Wordpress root. For example: <strong>/wp-content/uploads/sites/3/2018/09/modal-mapa-exportacion-armas-1.html</strong>',
			'attr'   => 'file',
			'type'   => 'text',
			'encode' => false,
			'meta'   => array(
				'placeholder' => '/wp-content/',
				'data-test'   => 1,
			),
		),
    );
    
    $import_text_file_args = array(
		'label' => 'Import text file',
		'listItemImage' => 'dashicons-media-code',
		'attrs' => $import_text_file_fields,
	);
        
    shortcode_ui_register_for_shortcode( 'import_text_file', $import_text_file_args );
}

add_action( 'register_shortcode_ui', 'shortcode_ui_import_text_file' );

?>
