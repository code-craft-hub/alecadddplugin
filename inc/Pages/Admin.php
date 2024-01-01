<?php
/** 
 * 
 * @package CodeCraftHub
*/

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();
    public $subpages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Work Hard',
                'capability' => 'manage_options' ,
                'menu_slug' =>  'alecaddd_plugin',
                'callback' => function() { echo '<h1>Code Craft Hub Plugin</h1>';},
                'icon_url' => 'dashicons-superhero',
                'position' => 110 
            )
        );

        $this->subpages = array(
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Books',
                'menu_title' => 'Books',
                'capability' => 'manage_options' ,
                'menu_slug' =>  'Books',
                'callback' => function() { echo '<h1>Mercedes Benz</h1>';},
            ),
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Houses',
                'menu_title' => 'Houses',
                'capability' => 'manage_options' ,
                'menu_slug' =>  'Houses',
                'callback' => function() { echo '<h1>Houses Benz</h1>';},
            ),
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Wealth',
                'menu_title' => 'Wealth',
                'capability' => 'manage_options' ,
                'menu_slug' =>  'Wealth',
                'callback' => function() { echo '<h1>Wealth Benz</h1>';},
            ),
        );

    }
    
    public function register()
    {
        
        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages)->register();
    }

}