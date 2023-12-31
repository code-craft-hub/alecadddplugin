<?php
/*
 * Plugin Name:       My Basics Plugin
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


 use Inc\Activate;
 use Inc\Deactivate;


 if ( !class_exists( 'AlecadddPlugin' ) ) 
 {
    class AlecadddPlugin
    {
        public $plugin; 

        function __construct() 
        {
            $this->plugin = plugin_basename( __FILE__ );
        }

        function register()
        {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

            add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

            add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
        }

        public function settings_link( $links )
        {
            $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
            array_push( $links, $settings_link );
            return $links;
        }

        public function add_admin_pages()
        {
            add_menu_page( 'Alecaddd Plugin', 'Work Hard', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );
        }

        public function admin_index()
        {
            require_once plugin_dir_path( __FILE__ ) . '/templates/admin.php';
        }

        function create_post_type()
        {
            add_action( 'init', array($this, 'custom_post_type' ) );
        }

        function custom_post_type() 
        {
            register_post_type( 'book', [ 'label' => 'Books', 'public' => true ] );
        }

        function enqueue()
        {
            wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );

            wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
        }

        function activate() 
        {
            Activate::activate();
        }
        function deactivate() 
        {
            Deactivate::deactivate();
        }
    }
 }

 $alecadddPlugin = new AlecadddPlugin();
 $alecadddPlugin->register();
 $alecadddPlugin->create_post_type();

 register_activation_hook( __FILE__, array( $alecadddPlugin, 'activate' ) );
 register_deactivation_hook( __FILE__, array( $alecadddPlugin, 'deactivate' ) );