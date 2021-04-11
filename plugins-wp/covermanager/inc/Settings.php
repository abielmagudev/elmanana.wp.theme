<?php namespace Inc;

use Inc\Core\Filemanager;

class Settings extends Core\Model implements Interfaces\iHandleTable
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->setPrefixTable( PLUGIN_SLUG.'_settings' );
    }

    public function scriptCreateTable()
    {
        return "CREATE TABLE {$this->table} (
                `id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
                `cover_type` VARCHAR(32) DEFAULT NULL,
                `background_type` ENUM('none','color','image') NOT NULL DEFAULT 'none',
                `background_color` VARCHAR(16) DEFAULT NULL,
                `background_path` TEXT DEFAULT NULL,
                `background_image` VARCHAR(128) DEFAULT NULL,
                `updated_by` TINYINT(3) UNSIGNED DEFAULT NULL,
                `updated_at` DATETIME NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    }

    public function defaultsTable()
    {
        return $this->store([
            'cover_type' => 'cols_1x2',
            'background_type' => 'none',
            'background_color' => '#000',
            'background_path' => null,
            'background_image' => null,
            'updated_by' => get_current_user_id(),
            'updated_at' => DATETIME_NOW,
        ]);
    }

    public function makeBackgroundsStore()
    {
        $foldername = 'cover_backgrounds_' . time();
        $backgrounds_url    = get_theme_file_uri() . '/' . $foldername; 
        $backgrounds_path   = get_template_directory() . '/' . $foldername; 
        $backgrounds_index  = $backgrounds_path . '/index.php'; 

        if(! Filemanager::exists( $backgrounds_path ) )
        {
            Filemanager::makeDir( $backgrounds_path );

            $this->update([
                'background_path' => $backgrounds_path,
            ], ['id' => 1]);
        }
        
        if(! Filemanager::exists( $backgrounds_index ) )
            Filemanager::makeFile( $backgrounds_index );
    }

}