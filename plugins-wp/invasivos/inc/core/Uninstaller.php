<?php namespace Inc\Core;

abstract class Uninstaller
{
    public static function file()
    {
        return popub_dirname() . '/uninstall.php';
    }
    
    public static function exists()
    {
        return Filemanager::exists( self::file() );
    }

    public static function generate( $settings )
    {
        $file = self::file();
        $code = self::code( $settings->ruta_imagenes );
        $uninstall_file = fopen($file, 'w');
        fwrite($uninstall_file, $code);
        return fclose($uninstall_file);
    }

    private static function code($path)
    {
        return '<?php

        if (!defined("ABSPATH") && !defined("WP_UNINSTALL_PLUGIN")) die();

        $tables = [
            "popub",
            "popub_publicities",
        ];
        
        global $wpdb;
        foreach ($tables as $tablename) {
            $prefix_tablename = $wpdb->prefix . $tablename;
            $wpdb->query( "DROP TABLE IF EXISTS {$prefix_tablename}" );
        }

        $path = "' . $path . '";

        if( is_dir($path) )
        {
            $scanned = scandir($path);    
            foreach($scanned as $item)
            {
                if( is_file($item) )
                    unlink($item);
            }

            unlink($path);
        }';
    }
}
