<?php
/** 
 * 
 * @package CodeCraftHub
*/

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();
    
    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();
        
        $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages)->register();
    }

    public function setPages() 
    {

        $this->pages = array(
            array(
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Work Hard',
                'capability' => 'manage_options' ,
                'menu_slug' =>  'alecaddd_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-superhero',
                'position' => 110 
            )
        );
    }
    public function setSubPages() 
    {

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
                'callback' => function() { 
                    return require_once("$this->plugin_path/templates/admin.php");
                },
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

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'alecaddd_options_group',
                'option_name'  => 'text_example',
                'callback'     => array( $this->callbacks, 'alecadddOptionsGroup')
            ),
            array(
                'option_group' => 'alecaddd_options_group',
                'option_name'  => 'firstName',
            ),
            array(
                'option_group' => 'alecaddd_options_group',
                'option_name'  => 'secondName',
            ),
        );

        $this->settings->setSettings( $args );
    }


    public function setSections()
    {
        $args = array(
            array(
                'id'         => 'alecaddd_admin_index',
                'title'      => 'Settings',
                'callback'   => array( $this->callbacks, 'alecadddAdminSection'),
                'page'       => 'alecaddd_plugin'
            )
        );
        
        $this->settings->setSections( $args );
    }


    public function setFields()
    {
        $args = array(
            array(
                'id'         => 'text_example',
                'title'      => 'Username : ',
                'callback'   => array( $this->callbacks, 'alecadddTextExample'),
                'page'       => 'alecaddd_plugin',
                'section'    => 'alecaddd_admin_index',
                'args'       => array( 'label_for' => 'text_example', 'class' => 'example-class' )
            ),
            array(
                'id'         => 'firstName',
                'title'      => 'FullName : ',
                'callback'   => array( $this->callbacks, 'alecadddFirstName'),
                'page'       => 'alecaddd_plugin',
                'section'    => 'alecaddd_admin_index',
                'args'       => array( 'label_for' => 'firstName', 'class' => 'example-class' )
            ),
            array(
                'id'         => 'secondName',
                'title'      => 'Password : ',
                'callback'   => array( $this->callbacks, 'alecadddSecondName'),
                'page'       => 'alecaddd_plugin',
                'section'    => 'alecaddd_admin_index',
                'args'       => array( 'label_for' => 'secondName', 'class' => 'example-class' )
            ),
        );

        $this->settings->setFields( $args );
    }

}