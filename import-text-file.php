<?php
/**
 * @package Import_Text_File
 * @version 0.1
 */
/*
Plugin Name: Import Text File
Plugin URI: https://github.com/greenpeace/gpes-import-file/
Description: Imports an html file uploaded in the media library. For example: [import_text_file file='/wp-content/uploads/2018/09/mapa-pagos-por-capacidad.html']
Author: Osvaldo Gago
Version: 0.1
Author URI: https://osvaldo.pt
*/

/**
 * Imports a file into a page with a shortcode like:
 * [import_text_file file='/wp-content/uploads/2018/09/mapa-pagos-por-capacidad.html']
 * @param  array $params  Shortcode attributes
 * @return string Templated data
 */
function import_text_file_shorttag($params) {
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
add_shortcode('import_text_file', 'import_text_file_shorttag');
add_shortcode('import_file_text', 'import_text_file_shorttag');

?>
