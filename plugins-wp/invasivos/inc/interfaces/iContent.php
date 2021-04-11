<?php namespace Inc\Interfaces;

interface iContent
{
    public function generate( $request );

    public function delete( $object );
}