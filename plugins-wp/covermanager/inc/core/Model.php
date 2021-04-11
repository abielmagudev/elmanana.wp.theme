<?php namespace Inc\Core;

class Model
{
    private $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        // $this->prefix_table = $this->getPrefixTable() . $this->table;
    }

    public function all( $order = 'DESC' )
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY id {$order}");
    }

    public function find($value, $column = 'id')
    {
        $result = $this->query("SELECT * FROM {$this->table} WHERE {$column} = '$value'");
        if( count($result) > 1 )
            return $result;

        return array_pop($result);
    }

    public function store($data)
    {
        return $this->connection->insert($this->table, $data);
    }

    public function update($data, $where)
    {
        return $this->connection->update($this->table, $data, $where);
    }

    public function delete($data)
    {
        return $this->connection->delete($this->table, $data);
    }

    public function raw($sql)
    {
        return $this->query($sql);
    }

    public function getVar($sql)
    {
        return $this->connection->get_var($sql);
    }

    public function getRow($sql)
    {
        return $this->connection->get_row($sql);
    }

    public function getColumn($sql)
    {
        return $this->connection->get_col($sql);
    }

    public function verifyTable()
    {
        return $this->getVar("SHOW TABLES LIKE '%{$this->table}%'") === $this->table;
    }

    public function createTable( $sql )
    {
        return $this->sudoQuery( $sql );
    }

    public function dropTable()
    {
        return $this->sudoQuery("DROP TABLE {$this->table}");
    }

    public function getTableName()
    {
        return $this->table;
    }
    
    protected function query($sql)
    {
        return $this->connection->get_results($sql);
    }

    protected function sudoQuery($sql)
    {
        return dbDelta($sql);
    }

    protected function setPrefixTable( $table_name )
    {
        return $this->connection->prefix . $table_name;
    }

    protected function getPrefix()
    {
        return $this->connection->prefix;
    }
}

// $wpdb = https://codex.wordpress.org/Class_Reference/wpdb
// ezSQL = https://github.com/ezSQL/ezSQL
// https://andres-dev.com/utilizando-la-clase-wpdb-de-wordpress/
// https://danielcastanera.com/wpdb-consultas-wordpress/