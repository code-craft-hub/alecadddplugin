<?php
/** 
 * 
 * @package CodeCraftHub
*/

namespace Inc\Base;

 class Enqueue extends BaseController
{  
    function enqueue()
    {
        wp_enqueue_style( 'mypluginstyle', $this->plugin_url . '/assets/mystyle.css');
    
        wp_enqueue_script( 'mypluginscript', $this->plugin_url . '/assets/myscript.js');
    }

    function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }
    
  
}