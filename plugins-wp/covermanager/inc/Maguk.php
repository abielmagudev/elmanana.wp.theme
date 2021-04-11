<?php namespace Inc;

use Inc\Core\Menu;
use \Inc\Core\Web;
use Inc\Core\Session;
use Inc\Core\Notice;
use Inc\Core\Response;
use Inc\Core\Filemanager;
use Inc\Core\Uninstaller;

class Maguk
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
            $admin_posts = maguk_config('admin_post');
            if( array_key_exists($action, $admin_posts) )
            {
                $controller = $admin_posts[ $action ];
                add_action( "admin_post_{$action}", $controller );
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
        # wp_enqueue_style('bootrstrap_css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css', [], '4.3.1', 'all');
        wp_enqueue_style('bs_custom_css', maguk_plugins_url('/assets/bootstrap.custom.min.css'), [], '4.3.1', 'all');
        wp_enqueue_style('plugin_css', maguk_plugins_url('/assets/plugin.css?v='.time()), [], false, 'all');
        
        // JS
        wp_enqueue_script('jquery_js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', [], '3.4.1', true);
        wp_enqueue_script('bootstrap_bundle_js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js', [], '4.3.1', true);
        wp_enqueue_script('maguk_js', maguk_plugins_url('/assets/app.js?v='.time()), [], '0.1', true);

        return;
    }

    public function enqueueFrontAssets()
    {
        # wp_enqueue_style('fancyapps_css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', [], '3.5.7', 'all');
        # wp_enqueue_script('fancyapps_js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', ['elm_jquery_js'], '3.5.7', true);
    }

    public function loadMenus()
    {
        Menu::add( maguk_config('menus') );
        return;
    }

    public function activate()
    {
        $plugin_model = new Plugin;
        if(! $plugin_model->verifyTables() )
        {
            $plugin_model->createTables();
            $plugin_model->setDefaults();
        }
        
        $settings_model = new Settings;
        $settings_model->makeBackgroundsStore();

        if(! Uninstaller::exists() )
        {
            Uninstaller::create( $plugin_model->getContentUninstall() );
        }

        return flush_rewrite_rules();
    }

    public function deactivate()
    {
        return flush_rewrite_rules();
    }
}
