<?php namespace Inc;

use Inc\Core\Menu;
use \Inc\Core\Web;
use Inc\Core\Session;
use Inc\Core\Notice;
use Inc\Core\Response;
use Inc\Core\Filemanager;
use Inc\Core\Uninstaller;

class Popub
{
    public function register()
    {
        add_action('init', [Session::class, 'start']);
        add_action('wp_login', [Session::class, 'close']);
        add_action('wp_logout', [Session::class, 'close']);

        add_action('admin_menu', [$this, 'loadMenus']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueFrontAssets']);

        return;
    }

    public function action()
    {
        if( Web::method() === 'POST' && Web::isSetRequest('action') )
        {
            $action = Web::request('action');
            $admin_posts = popub_config('admin_post');
            if( array_key_exists($action, $admin_posts) )
            {
                $controlller = $admin_posts[ $action ];
                add_action( "admin_post_{$action}", $controlller );
            }
        }
        
        return;
    }

    public function notify()
    {
        if( Web::isSetRequest('notice') )
        {
            $notice = Notice::get( Web::request('notice') );
            add_action('admin_notices', function () use ($notice) {
                echo $notice;
            });
        }

        return;
    }

    public function enqueueAdminAssets()
    {
        // CSS
        wp_enqueue_style('bootrstrap_grid_css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.min.css', [], '4.3.1', 'all');
        wp_enqueue_style('popub_css', popub_plugins_url('/assets/style.css?v='.time()), [], false, 'all');
        
        // JS
        if ( is_admin() && !wp_script_is('jquery', 'enqueued') )
            wp_enqueue_script('jquery_js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', [], '3.4.1', true);
        
        wp_enqueue_script('bootstrap_bundle_js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js', [], '4.3.1', true);
        wp_enqueue_script('popub_js', popub_plugins_url('/assets/scripts.js?v='.time()), [], '0.1', true);

        return;
    }

    public function enqueueFrontAssets()
    {
        wp_enqueue_style('fancyapps_css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', [], '3.5.7', 'all');
        wp_enqueue_script('fancyapps_js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', ['elm_jquery_js'], '3.5.7', true);
    }

    public function loadMenus()
    {
        Menu::add( popub_config('menus') );
        return;
    }

    public function activate()
    {
        $model = new Settings;
        if(! $model->verifyTables() )
        {
            $model->createTables();
            $model->setDefaults();
        }
        
        if(! Uninstaller::exists() )
        {
            $settings = Settings::values();
            Uninstaller::generate( $settings );
        }

        return flush_rewrite_rules();
    }

    public function deactivate()
    {
        return flush_rewrite_rules();
    }

    public static function uninstall()
    {
        $settings = Settings::values();
        Filemanager::deleteFolder( $settings->ruta_imagenes );

        $model = new Settings;
        if( $model->verifyTables() )
            $model->deleteTables();
        
        return;
    }
}

/*
    // https://gomakethings.com/how-to-simulate-a-click-event-with-javascript/
    // https://dotlayer.com/what-is-migrate-js-why-and-how-to-remove-jquery-migrate-from-wordpress/
*/
