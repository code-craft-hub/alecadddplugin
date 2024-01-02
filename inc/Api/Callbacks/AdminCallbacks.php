<?php
/** 
 * 
 * @package CodeCraftHub
*/

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function alecadddOptionsGroup( $input )
    {
        // var_dump($input); die;
        return $input;
    }

    public function alecadddAdminSection()
    {
        echo ' Check this beautiful sections';
    }

    public function alecadddTextExample()
    {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text_example" value="'.$value.'" placeholder="Write something here" />';
    }

    public function alecadddFirstName()
    {
        $value = esc_attr( get_option( 'firstName' ) );
        echo '<input type="text" class="regular-text" name="firstName" value="'.$value.'" placeholder="Your name" />';
    }
    public function alecadddSecondName()
    {
        $value = esc_attr( get_option( 'secondName' ) );
        echo '<input type="text" class="regular-text" name="secondName" value="'.$value.'" placeholder="Your last name" />';
    }
}