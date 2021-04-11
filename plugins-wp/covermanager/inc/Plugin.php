<?php namespace Inc;

use Inc\Core\Filemanager;

class Plugin // extends Core\Model
{
    protected $models = array();

    public function __construct()
    {
        $this->models = [
            'plugin'  => new Settings(),
            'cols'    => new CoverCols(),
            'rows'    => new CoverRows(),
            'textual' => new CoverTextual(),
            'live'    => new CoverLive(),
        ];
    }

    public function verifyTables()
    {    
        foreach($this->models as $model)
        {
            if(! $model->verifyTable() )
            {
                return false;
                break;
            }            
        }
        return true;
    }

    public function createTables()
    {
        foreach($this->models as $model)
        {
            $model->createTable( $model->scriptCreateTable() );
        }
        return;
    }

    public function setDefaults()
    {
        foreach($this->models as $model)
        {
            call_user_func_array([$model, 'defaultsTable'], array());
        }
        return;
    }

    public function deleteTables()
    {
        foreach($this->models as $model)
        {
            $model->dropTable();
        }
        return;
    }

    public function getContentUninstall()
    {
        $table_names = '';
        foreach($this->models as $model)
        {
            $table_names .= "'{$model->getTableName()}',\n";
        }

        return "
            global \$wpdb;
            \$tables = [
                $table_names
            ];

            foreach(\$tables as \$table)
            {
                \$wpdb->query(\"DROP TABLE IF EXISTS \$table\" );
            }
        ";
    }
}
