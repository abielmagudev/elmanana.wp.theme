<?php namespace Inc\Core;

abstract class Menu
{
    public static function add( $menus )
    {
        foreach($menus as $menu)
        {
            add_menu_page(
                $menu['menu_title'],
                $menu['menu_title'],
                $menu['capability'],
                $menu['menu_slug'],
                $menu['function'],
                $menu['icon_url'],
                $menu['position']
            );

            if( isset($menu['submenu']) && is_array($menu['submenu']) )
            {
                foreach($menu['submenu'] as $submenu)
                {
                    add_submenu_page(
                        $submenu['parent_slug'],
                        $submenu['page_title'],
                        $submenu['menu_title'],
                        $submenu['capability'],
                        $submenu['menu_slug'],
                        $submenu['function']
                    );
                }
            }
        }
    }
}