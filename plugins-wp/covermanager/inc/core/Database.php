<?php namespace Inc\Core;

abstract class Database
{
    public static function getConnection()
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb;
        return $wpdb;
    }
}