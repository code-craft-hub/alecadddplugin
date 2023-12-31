<?php
/** 
 * 
 * @package CodeCraftHub
*/

namespace Inc;

class Activate
{
    public static function activate() {
        // echo "Test";
        flush_rewrite_rules();
    }
}
