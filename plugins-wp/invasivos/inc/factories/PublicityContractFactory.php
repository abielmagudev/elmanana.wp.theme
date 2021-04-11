<?php namespace Inc\Factories;

abstract class PublicityContractFactory implements \Inc\Interfaces\iFactory
{
    public static function make( $type )
    {
        switch ($type)
        {
            case 'imagen':
                return new \Inc\Contracts\PublicityImage;
                break;
            case 'codigo':
                return new \Inc\Contracts\PublicityScript;
                break;
        }

        return;
    }
}