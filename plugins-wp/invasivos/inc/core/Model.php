<?php namespace Inc\Core;

class Model
{
    private $connection;
    private $prefix_table;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->prefix_table = $this->getPrefixTable() . $this->table;
    }

    public function all( $order = 'DESC' )
    {
        return $this->query("SELECT * FROM {$this->prefix_table} ORDER BY id {$order}");
    }

    public function find($value, $column = 'id')
    {
        $result = $this->query("SELECT * FROM {$this->prefix_table} WHERE {$column} = '$value'");
        if( count($result) > 1 )
            return $result;

        return array_pop($result);
    }

    public function store($data)
    {
        return $this->connection->insert($this->prefix_table, $data);
    }

    public function update($data, $where)
    {
        return $this->connection->update($this->prefix_table, $data, $where);
    }

    public function delete($data)
    {
        return $this->connection->delete($this->prefix_table, $data);
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

    protected function getPrefixTable($table_name = '')
    {
        return $this->connection->prefix . $table_name;
    }

    protected function getPrefix()
    {
        return $this->connection->prefix;
    }

    protected function query($sql)
    {
        return $this->connection->get_results($sql);
    }

    protected function sudoQuery($sql)
    {
        return dbDelta($sql);
    }
}

// $wpdb = https://codex.wordpress.org/Class_Reference/wpdb
// ezSQL = https://github.com/ezSQL/ezSQL
// https://andres-dev.com/utilizando-la-clase-wpdb-de-wordpress/
// https://danielcastanera.com/wpdb-consultas-wordpress/