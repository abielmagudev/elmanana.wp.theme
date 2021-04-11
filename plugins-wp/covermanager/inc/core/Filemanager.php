<?php namespace Inc\Core;

abstract class Filemanager
{
    public static function getContent( $path )
    {
        return file_get_contents($path);
    }

    public static function exists( $path )
    {
        return file_exists($path);
    }

    public static function makeDir( $path )
    {
        return mkdir($path);
    }

    public static function makeFile( $path, $content = null )
    {
        $handle = fopen($path, 'w');
        if( is_string($content) )
            fwrite($handle, $content);
        
        fclose($handle);
    }

    public static function delete( $path )
    {
        return unlink($path);
    }

    public static function deleteFolder( $folder )
    {
        $path = is_dir($folder) ? $folder : dirname($folder);
        $scanned = scandir($path);    

        foreach($scanned as $item)
        {
            if( is_file($item) )
                self::delete($item);
        }

        return self::delete($path);
    }
}
