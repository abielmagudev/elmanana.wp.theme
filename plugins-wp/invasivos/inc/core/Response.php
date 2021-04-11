<?php namespace Inc\Core;

abstract class Response
{
    public static function attend( $request )
    {
        if(! self::validateRequest($request) )
            return;
        
        if(! $controller = self::validateRoute($request) )
            return;
        
        return call_user_func_array( array($controller['name'], $controller['method']) , array($request) );
    }

    private static function validateRequest( $request )
    {
        return isset($request['route']) && isset($request['action']);        
    }

    private static function validateRoute( $request )
    {
        $match_controller = false;
        $routes = popub_config('routes');
        foreach($routes as $route => $class)
        {
            if( $route === $request['route'] )
            {
                if( method_exists($class, $request['action']) )
                {
                    $match_controller = [
                        'name' => $class,
                        'method' => $request['action'],
                    ];
                    break;
                }
            }
        }

        return $match_controller;
    }
}