<?php
/** 
 * 
 * @package CodeCraftHub
*/

namespace Inc\Base;

 class Enqueue extends BaseController
{
    function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }
    
    function enqueue()
    {
        wp_enqueue_style( 'mypluginstyle', $this->plugin_path . '/assets/mystyle.css');
    
        wp_enqueue_script( 'mypluginscript', $this->plugin_path . '/assets/myscript.js');
    }
}