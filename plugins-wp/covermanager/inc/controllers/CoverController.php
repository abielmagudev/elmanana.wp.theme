<?php namespace Inc\Controllers;

use Inc\Settings;
use Inc\Factories\CoverFactory;

class CoverController extends \Inc\Core\Controller
{
    public static function show()
    {
        $settings = self::getSettings();
        $cover = "{$settings->cover_type}.php";
        $background_style = self::getBackgroundStyle( $settings );
        $content = self::getContent( $settings->cover_type );

        maguk_require('templates/covers/_main.php', true, compact('cover', 'background_style', 'content'));
        return;
    }

    private static function getSettings()
    {
        $settings_model = new Settings;
        return $settings_model->find(1);
    }

    private static function getBackgroundStyle( $settings )
    {
        if( $settings->background_type === 'none' )
            return;

        if( $settings->background_type === 'color' )
            return "padding:2rem 0 2rem 0;background-color:{$settings->background_color}";
        
        if( $settings->background_type === 'image' )
        {
            $image_url = covermanager_url_background( $settings->background_path, $settings->background_image );
            return "padding:2rem 0 2rem 0;background-size:cover;background-position:top center;background-repeat:repeat;background-image:url('{$image_url}')";
        }
    }

    private static function getContent( $cover_id)
    {
        $cover_model = CoverFactory::make( $cover_id );
        return $cover_model->content();
    }
}

/*
background-image: url('w3css.gif');
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center; 
*/