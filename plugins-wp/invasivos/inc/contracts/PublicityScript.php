<?php namespace Inc\Contracts;

class PublicityScript implements \Inc\Interfaces\iContent
{
    public function generate( $request )
    {
        return htmlentities($request['codigo']);
        // return htmlspecialchars( $request['codigo'] );
    }

    public function delete( $object )
    {
        return true;
    }
}