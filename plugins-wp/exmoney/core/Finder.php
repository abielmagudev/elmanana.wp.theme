<?php namespace Exmoney\Core;

class Finder
{
    static function content($file)
    {
        if( self::exists($file) )
        {
            $exm_path = self::getPath($file);
            return file_get_contents($exm_path);
        }

        return false;
    }

    static function put($file, $content)
    {
        $exm_path = self::getPath($file);
        return file_put_contents($exm_path, $content);
    }

    static function import($path, $data = null)
    {
        $exm_path = self::getPath($path);
        if( is_array($data) ) extract($data);
        return include($exm_path);
    }

    static function exists($path)
    {
        $exm_path = self::getPath($path);
        return file_exists($exm_path);
    }

    static function isDir($dir)
    {
        $exm_path = self::getPath($dir);
        return is_dir($exm_path);
    }

    static function isFile($file)
    {
        $exm_path = self::getPath($file);
        return is_file($exm_path);
    }

    static function getPath($path)
    {
        return EXM_PATH.$path;
    }
}