<?php

        if (!defined("ABSPATH") && !defined("WP_UNINSTALL_PLUGIN")) die();

        $tables = [
            "popub",
            "popub_publicities",
        ];
        
        global $wpdb;
        foreach ($tables as $tablename) {
            $prefix_tablename = $wpdb->prefix . $tablename;
            $wpdb->query( "DROP TABLE IF EXISTS {$prefix_tablename}" );
        }

        $path = "/home/elmanana/public_html/wp-content/themes/elmanana/publicity_images_1560496601/";

        if( is_dir($path) )
        {
            $scanned = scandir($path);    
            foreach($scanned as $item)
            {
                if( is_file($item) )
                    unlink($item);
            }

            unlink($path);
        }