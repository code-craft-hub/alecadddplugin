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

    public function alecadddOptionGroup( $input )
    {
        var_dump($input); die;
        return $input;
    }

    public function alecadddAdminSection()
    {
        echo ' Check this beautiful sections';
    }

    public function alecadddTextExample()
    {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text-example" value="'.$value.'" placeholder="Write something here" />';
    }

    public function alecadddFirstName()
    {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text-example" value="'.$value.'" placeholder="Your name" />';
    }
    public function alecadddSecondName()
    {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text-example" value="'.$value.'" placeholder="Your last name" />';
    }
}