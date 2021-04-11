<?php
/*
Plugin name: Exmoney
Plugin URI: https://orangesites.mx/
Description: Manejador de intercambio(<em>compra/venta</em>) de moneda.
Author: Orangesites
Author URI: https://orangesites.mx/
Version: 0.1
License: GPL2
*/

defined( 'ABSPATH' ) or die('Stop by Exmoney!');

if( !class_exists('Exmoney') )
{
    class Exmoney
    {
        private $settings = [];

        function __construct()
        {
            $this->settings = [
                'url'     => plugin_dir_url( __FILE__ ),
                'path'    => plugin_dir_path( __FILE__ ),
                'base'    => plugin_basename( __FILE__ ),
                'dirname' => dirname( __FILE__ ),
            ];
    
            $this->define('EXM_PATH', $this->get_setting('path'));
        }

        function register()
        {
            add_action('admin_menu', [$this, 'add_admin_pages']);
        }

        function add_admin_pages()
        {
            add_menu_page(
                'Intercambio de moneda', // Page title
                'Divisas', // Menu title
                'manage_options', // Capability,
                'exmoney_plugin', // Menu slug
                [$this, 'admin_index'], // Call function string|array
                'dashicons-store', // Menu icon
                3 // Menu position
            );
        }

        function admin_index()
        {
            if( $this->hasToken() ) $this->setContent();
            
            $data['token'] = $this->getToken();
            $data['content'] = $this->getContent();
            return exm_view('admin/index', $data);
        }

        private function hasToken()
        {
            return isset($_POST['exm_token']);
        }

        private function getToken()
        {
            $passcode = '3xm0n3y'.date('dmY');
            return sha1( strrev($passcode) );
        }

        private function setContent()
        {
            if( $_POST['exm_token'] === $this->getToken() )
            {
                if( is_numeric($_POST['buy']) && is_numeric($_POST['sell']) )
                {
                    $timezone_format = _x('Y-m-d H:i:s', 'timezone date format');
                    $_POST['updated'] = date_i18n( $timezone_format ) ; //date('d-m-Y h:i:s')
                    $class = exm_put_contents('db.txt', json_encode($_POST)) ? 'success' : 'error';
                    $message = $class === 'success' ? 'Actualización correcta!' : 'Error al actualizar, contactar administrador.';
                    $this->notices($message, $class);
                }
                else
                {
                    $this->notices('Solo valores numericos.', 'warning');
                }
            }
            else
            {
                $this->notices('Favor de refrescar esta página y vuelve a intentar actualizar.', 'info');
            }
            return;
        }

        private function notices($message, $class)
        {
            $styles = [
                'success' => 'notice notice-success is-dismissible',
                'warning' => 'notice notice-warning',
                'info'    => 'notice notice-info',
                'error'   => 'notice notice-error',
            ];
            $style = $styles[ $class ];
            add_action( 'admin_notices', function () use ($message, $style) {
                printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $style ), esc_html( $message ) ); 
            });
        }

        function getContent()
        {
            if( exm_exists('db.txt') )
            {
                $content = exm_get_contents('db.txt');
            }
            else
            {
                $content = [
                    'updated' => null,
                    'buy'     => null,
                    'sell'    => null
                ];
            }

            return json_decode($content, true);
        }

        private function has_setting($keyname)
        {
            return isset($this->settings[$keyname]);
        }

        private function get_setting($keyname)
        {
            return $this->has_setting($keyname) ? $this->settings[$keyname] : null;
        }

        private function update_setting($keyname, $value)
        {
            if( $this->has_setting($keyname) ) 
            {
                $this->setting[$keyname] = $value;
                return $this->get_setting($keyname);
            }
        }

        private function define($name, $value)
        {
            if( !defined($name) )
                define($name, $value);
        }

        function import(array $files)
        {
            foreach($files as $file)
            {
                $filepath = EXM_PATH.$file;
                if( file_exists($filepath) )
                {
                    include_once($filepath);
                }
            }
        }
    }
}

$exm = new Exmoney;
$exm->register();
$exm->import([
    'core/Finder.php',
    'core/View.php',
    'core/helpers.php',
]);

function exmoney_content()
{
    global $exm;
    return $exm->getContent();
}

// Activation
register_activation_hook(__FILE__, 'exm_activation');
function exm_activation()
{
    // code
}

// Desactivation
register_deactivation_hook(__FILE__, 'exm_desactivation');
function exm_deactivation()
{
    // code
}

// Unistall
register_uninstall_hook(__FILE__, 'exm_uninstall');
function exm_unistall()
{
    // code
}


/*
add_action('admin_menu', 'exmoney_display_admin_menu');
function exmoney_display_admin_menu()
{
    add_menu_page( 
        'Intercambio de moneda', 
        'Exmoney', 
        'manage_options', 
        'exmoney_plugin', 
        'exmoney_index', 
        'dashicons-store', 
        8
    );
}
function exmoney_index()
{
    echo 'Hello, im exmoney!';
}
*/

// spl_autoload_register( function ($namespace_class) {
//     $exploded  = explode('\\', $namespace_class);
//     $classname = end($exploded);
//     $filepath  = EXM_PATH."core/{$classname}.php";
//     require_once($filepath);
// });