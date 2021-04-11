<?php namespace Inc\Controllers;

use Inc\Settings;
use Inc\Factories\CoverFactory;

class HomeController extends \Inc\Core\Controller
{
    public static function index()
    {
        $layouts_cover = maguk_config('layouts_cover');

        $settings_model = new Settings;
        $settings = $settings_model->find(1);
        $content = array();

        foreach($layouts_cover as $layout)
        {
            $cover_model = CoverFactory::make( $layout['id'] );
            $content[ $layout['id'] ] = $cover_model->content();
        }

        return maguk_render('home/index', compact('layouts_cover', 'settings', 'content'));
    }
}