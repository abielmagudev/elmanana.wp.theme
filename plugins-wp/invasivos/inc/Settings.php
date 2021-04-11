<?php namespace Inc;

use Inc\Core\Filemanager;

class Settings extends Core\Model
{
    protected $table = 'popub';
    protected $tables = array();
    private static $instance = null;

    public function __construct()
    {
        parent::__construct();

        $this->tables = [
            'plugin' => $this->getPrefixTable( $this->table ),
            'publicities' => $this->getPrefixTable( $this->table.'_publicities' ),
        ];
    }

    public function verifyTables()
    {
        if( $this->getVar("SHOW TABLES LIKE '%{$this->tables['plugin']}%'") === $this->tables['plugin'] )
        {
            return $this->getVar("SHOW TABLES LIKE '%{$this->tables['publicities']}%'") === $this->tables['publicities'];
        }
        
        return false;
    }

    public function createTables()
    {
        $scripts_sql = [
            'scriptPopubTable',
            'scriptPopubPublicitiesTable'
        ];

        foreach($scripts_sql as $script_sql)
        {
            $sql = call_user_func_array([$this, $script_sql], array());
            $this->sudoQuery($sql);
        }

        return;
    }

    public function setDefaults()
    {
        return $this->store([
            'modo' => 'desactivado',
            'ruta_imagenes' => $this->makeImagesPath(),
            'actualizado_at' => DATETIME_NOW, 
        ]);
    }

    public function deleteTables()
    {
        foreach($this->tables as $table)
        {
            $sql = $this->scriptPopubDeleteTable( $table );
            $this->sudoQuery($sql);
        }

        return;
    }

    private function scriptPopubTable()
    {
        return "CREATE TABLE {$this->tables['plugin']} (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `modo` enum('manual','aleatorio','desactivado') NOT NULL DEFAULT 'desactivado',
                `ruta_imagenes` text DEFAULT NULL,
                `publicidad_id` int(10) unsigned DEFAULT NULL,
                `actualizado_at` datetime NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    }

    private function scriptPopubPublicitiesTable()
    {
        return "CREATE TABLE {$this->tables['publicities']} (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `titulo` varchar(128) NOT NULL,
                `tipo` enum('imagen','codigo') NOT NULL,
                `contenido` text NOT NULL,
                `enlace` text DEFAULT NULL,
                `en_movil` tinyint UNSIGNED NULL DEFAULT NULL,
                `en_escritorio` tinyint UNSIGNED NULL DEFAULT NULL,
                `creado_at` datetime NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    }

    private function  scriptPopubDeleteTable( $tablename )
    {
        return "DROP TABLE {$tablename}";
    }

    private function makeImagesPath()
    {
        $images_dir = get_template_directory() . '/publicity_images_' . time() . '/'; 
        $index_file = $images_dir . 'index.php'; 

        if(! Filemanager::exists( $images_dir ) )
            Filemanager::makeDir( $images_dir );
        
        if(! Filemanager::exists( $index_file ) )
            Filemanager::makeFile( $index_file );
        
        return $images_dir;
    }

    public static function values()
    {
        if( is_null(self::$instance) )
            self::$instance = new self;

        return self::$instance->find(1);
    }
}