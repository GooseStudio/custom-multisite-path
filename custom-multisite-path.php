<?php
/**
 * Custom MultiSite Pat
 *
 * @package     CustomMultisitePath
 * @author      Andreas Nurbo
 * @copyright   2016 Andreas Nurbo
 * @license     GPL-2.0
 *
 * @wordpress-plugin
 * Plugin Name: Custom MultiSite path
 * Plugin URI:  https://goose.studio/portfolio/projects/custom-multisite-path/
 * Description: This is a (MU-)plugin that fixes the paths for when you have WordPress in a subfolder and want MultiSite.
 * Version:     1.0.0
 * Author:      Andreas Nurbo, Goose Studio
 * Author URI:  https://goose.studio
 * Text Domain: custommsp
 * License:     GPL-2.0
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (!defined('CMSP_WP_PATH')) {
    define('CMSP_WP_PATH', 'wp');
}

/**
 * Add path to network urls if missing.
 */
add_filter( 'network_site_url', function ( $url, $path, $scheme ) {
    $parsed_url = parse_url( $url );
    if ( 0 !== strpos( $parsed_url['path'], '/' . CMSP_WP_PATH . '/' )) {
        $new_url = sprintf('http://%s/%s/%s', $parsed_url['host'], CMSP_WP_PATH, $path);
        $url = set_url_scheme( $new_url, $scheme );
    }
    return $url;
}, 0, 3 );
/**
 * Add path to site urls if missing.
 */

add_filter( 'site_url', function ( $url, $path, $scheme ) {
    $parsed_url = parse_url( $url );
    if (!isset($parsed_url['host'])) {
        return $url;
    }
    if ( !isset($parsed_url['path']) || 0 !== strpos( $parsed_url['path'], '/' . CMSP_WP_PATH . '/' )) {
        $new_url = sprintf('http://%s/%s/%s', $parsed_url['host'], CMSP_WP_PATH, $path);
        $url = set_url_scheme( $new_url, $scheme );
    }
    return $url;
}, 0, 3 );

/**
 * Add path to admin urls if missing. This usually involves admin-ajax.php usage since those
 * calls use relative paths and thereby are not handled by the other filters.
 */
add_filter( 'admin_url', function ( $url ) {
    $parsed_url = parse_url( $url );
    if (isset($parsed_url['host'])) {
        return $url;
    }
    return '/' . CMSP_WP_PATH . "/$url";
}, 0, 1 );