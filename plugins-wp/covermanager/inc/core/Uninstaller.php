<?php namespace Inc\Core;

abstract class Uninstaller
{
    public static function exists()
    {
        return Filemanager::exists( self::getUninstallPath() );
    }

    public static function getUninstallPath()
    {
        return maguk_dirname() . '/uninstall.php';
    }

    private static function generate( $content )
    {
        return "<?php 
        if( !defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) die();
        $content";
    }

    public static function create( $content )
    {
        $generated = self::generate( $content );
        $filepath = self::getUninstallPath();

        $uninstaller = fopen($filepath, 'w');
        fwrite($uninstaller, $generated);
        return fclose($uninstaller);
    }
}
