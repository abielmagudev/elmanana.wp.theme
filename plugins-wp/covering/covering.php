<?php
/*
Plugin name: Covering
Plugin URI: https://orangesites.mx/
Description: Administrador de portadas de inicio del sitio web.
Author: Orangesites
Author URI: https://orangesites.mx/
Version: 0.1
License: GPL2
*/

defined( 'ABSPATH' ) or die('Stop!!');

if( !class_exists('Covering') )
{
    class Covering 
    {
        static private $instance = null;
        private $settings;

        private function __clone(){}

        private function __construct(array $settings)
        {
            $this->settings = $settings;
        }

        function initialize()
        {
            require_once( $this->settings['path'].'includes/helpers.php' );
            cvr_import('includes/register.php');
            cvr_import('includes/core.php');
            cvr_import('includes/security.php');
            cvr_import('includes/api.php');
            cvr_import('includes/notices.php');
            cvr_import('includes/theme.php');
            cvr_import('includes/pages.php');
            
            if( is_admin() )
            {
                add_action('admin_post_covering', 'cvr_save_covers');
                add_action('admin_menu', 'cvr_add_admin_pages');
            }
        }

        function hasSetting($key)
        {
            return isset($this->settings[$key]);
        }

        function getSetting($key)
        {
            return $this->settings[$key];
        }

        static function getInstance()
        {
            if( is_null(self::$instance) )
            {
                self::$instance = new self([
                    'url'     => plugin_dir_url( __FILE__ ),
                    'path'    => plugin_dir_path( __FILE__ ),
                    'base'    => plugin_basename( __FILE__ ),
                    'dirname' => dirname( __FILE__ ),    
                ]);
            }

            return self::$instance;
        }
    }
}

function cvr()
{
    global $cvr;
    if( !isset($cvr) ) $cvr = Covering::getInstance();
    return $cvr;
}

cvr()->initialize();

register_activation_hook(__FILE__   , 'cvr_activation');
register_deactivation_hook(__FILE__ , 'cvr_desactivation');
register_uninstall_hook(__FILE__    , 'cvr_uninstall');
