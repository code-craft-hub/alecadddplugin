<?php
/*
 * Plugin Name:       A Plugin By CodeCraftHub
 * Plugin URI:        https://codecrafthub.tech
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            codecrafthub
 * Author URI:        https://codecrafthub.tech
 * License:           GPL v2 or later
 * License URI:       https://codecrafthub.tech
 * Update URI:        https://codecrafthub.tech
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

 defined('ABSPATH') or die();


 if ( file_exists(dirname( __FILE__ ) . '/vendor/autoload.php' ) )
 {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
 }

 define('PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
//  define('PLUGIN_URL', plugin_dir_url( __FILE__ ) );
 define('PLUGIN', plugin_basename( __FILE__ ) );



 function activate_alecaddd_plugin() 
 {
    Inc\Base\Activate::activate();
 }
 register_activation_hook( __FILE__, 'activate_alecaddd_plugin');

 function deactivate_alecaddd_plugin()
 {
    Inc\Base\Deactivate::deactivate();
 }
 register_deactivation_hook( __FILE__, 'deactivate_alecaddd_plugin');


if (class_exists( 'Inc\\Init' ) ) 
{
    Inc\Init::register_services();
}