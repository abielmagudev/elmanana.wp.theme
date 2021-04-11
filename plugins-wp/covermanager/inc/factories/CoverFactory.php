<?php namespace Inc\Factories;

abstract class CoverFactory implements \Inc\Interfaces\iFactory
{
    public static function make( $layout )
    {
        switch ($layout)
        {
            case 'cols_1x2':
                return new \Inc\CoverCols;
                break;
            case 'rows_1x3':
                return new \Inc\CoverRows;
                break;
            case 'textual':
                return new \Inc\CoverTextual;
                break;
            case 'live':
                return new \Inc\CoverLive;
                break;
            default: return;
        }
    }
}