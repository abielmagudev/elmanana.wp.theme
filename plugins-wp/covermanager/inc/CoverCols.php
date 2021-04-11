<?php namespace Inc;

class CoverCols extends Core\Model implements Interfaces\iHandleTable
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->setPrefixTable( PLUGIN_SLUG.'_cols' );
    }

    public function scriptCreateTable()
    {
        return "CREATE TABLE {$this->table} (
                `id` TINYINT(3) unsigned NOT NULL AUTO_INCREMENT,
                `post_url` TEXT DEFAULT NULL,
                `updated_at` DATETIME NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    }

    public function defaultsTable()
    {
        for($i = 1; $i <= 3; $i++)
        {
            $this->store([
                'updated_at' => DATETIME_NOW,
            ]);
        }
        return;
    }

    public function save( $request )
    {
        $fails = 0;
        $id = 0;

        foreach( $request['posts'] as $post_url )
        {
            if( filter_var($post_url, FILTER_VALIDATE_URL) )
            {
                $success = $this->update([
                    'post_url' => $post_url,
                    'updated_at' => DATETIME_NOW,
                ], ['id' => ++$id]);

                if( !$success ) ++$fails;
            }
        }

        return $fails === 0;
    }

    public function content()
    {
        $all = $this->all('ASC');
        
        foreach($all as $item)
        {
            if( !is_null($item->post_url) && $post_id = url_to_postid($item->post_url) )
            {
                $item->post = get_post($post_id);
            }
        }

        return $all;
    }
}