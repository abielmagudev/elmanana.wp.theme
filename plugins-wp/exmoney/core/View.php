<?php namespace Exmoney\Core;

class View
{
    static function render($path, $data = null)
    {
        $view_path = self::getViewFile($path);
        if( Finder::isFile($view_path) )
        {
            return Finder::import($view_path, $data);
        }

        return false;
    }

    static function getViewFile($path, $ext = 'php')
    {
        return "views/{$path}.$ext";
    }
}