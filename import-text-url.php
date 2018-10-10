<?php
/**
 * @package Import_Text_URL
 * @version 0.1
 */
/*
Plugin Name: Import Text URL
Plugin URI: https://github.com/greenpeace/gpes-import-wp-shortcodes/
Description: Shortcode to import an html url. For example: [import_text_url url='https://apps.greenpeace.es/data-vis/import/chart.html'] FOR DEVELOPMENT ONLY. DO NOT USE IN PRODUCTION PAGES!
Author: Osvaldo Gago
Version: 0.1
Author URI: https://osvaldo.pt
*/

/**
 * Imports an external URL with a shortcode like:
 * [import_url_text url='https://apps.greenpeace.es/data-vis/import/chart.html']
 * IT CAN'T BE USED IN PRODUCTION, FOR SECURITY AND PERFORMANCE REASONS
 * Requires php configured with allow_url_fopen
 * @param  array $params  Shortcode attributes
 * @return string Templated data
 */
function shortcode_import_url_text($params) {
        
    if( isset($params['url']) ) {
        $url = esc_url($params['url']);
        $imported = file_get_contents($url);
    } else {
        $imported = false;
    }

    return $imported;
    
}

add_shortcode('import_url_text', 'shortcode_import_url_text');
add_shortcode('import_text_url', 'shortcode_import_url_text');

?>
