<?php
/**
 * @package Import_Text_File
 * @version 0.1
 */
/*
Plugin Name: Import Text File
Plugin URI: https://github.com/greenpeace/gpes-import-wp-shortcodes/
Description: Shortcode to import an html file uploaded in the media library. For example: <code>[import_text_file file='/wp-content/uploads/2018/09/mapa-pagos-por-capacidad.html']</code>
Author: Osvaldo Gago
Text Domain: import-text-file
Domain Path: /languages
Version: 1.1
Author URI: https://osvaldo.pt
*/

defined( 'ABSPATH' ) or die( 'You can\'t do that !' );

/**
 * Imports a file into a page with a shortcode like:
 * [import_text_file file='/wp-content/uploads/2018/09/mapa-pagos-por-capacidad.html']
 * @param  array $params  Shortcode attributes
 * @return string Templated data
 */
function shortcode_import_text_file($params) {
    if(isset($params['file'])) {
        $file_path = ABSPATH . sanitize_text_field($params['file']);
        $file = fopen($file_path, 'r');
        $imported = fread( $file, filesize($file_path));
        fclose($file);
    } else {
        $imported = false;
    }

    return $imported;
    
}

add_shortcode('import_text_file', 'shortcode_import_text_file'); // New syntax
add_shortcode('import_file_text', 'shortcode_import_text_file'); // Legacy syntax in es.greenpeace.org
add_shortcode('magaz_import_file_text', 'shortcode_import_text_file'); // Legacy syntax in revista.greenpeace.es

?>
