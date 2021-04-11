<?php namespace Inc\Controllers;

use Inc\Core\Controller;
use Inc\Publicity;
use Inc\Settings;

class HomeController extends Controller
{
    public static function index()
    {
        $settings = Settings::values();
        $model = new Publicity;
        $publicities = $model->all();
        return popub_render('home/index', compact('settings', 'publicities'));
    }

    /**
     * Show publicities on Frontside
     * @function
     */
    public static function showtime()
    {
        $settings = Settings::values();

        if( $settings->modo === 'desactivado' )
            return;

        $contract = new \Inc\Contracts\Showtime( $settings );
        echo $contract->render();
        return;
    }
}