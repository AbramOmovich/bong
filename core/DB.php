<?php
namespace Core;

class DB
{
    private $db;

    public function __construct(array $config)
    {
        $this->db = new \PDO(
            $config['dsn'],
            $config['user'],
            $config['password'],
            $config['options']
        );
    }

    public function insert($table, array $data)
    {
        $fields = implode(', ', array_keys($data));
        $values = '\'' . implode('\', \'', array_values($data)) . '\'';

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUE (%s)",
            $table,
            $fields,
            $values
        );
        
        return $this->db->query($sql);
    }

    public function select($table)
    {
        $sql = "SELECT * FROM $table";
        
        $result = $this->db->query($sql);
        
        return $result->fetchAll();
    }

    public function update($table, $data, $where){
        var_dump($table, $data,$where);
        $data_keys = array_keys($data);
        $data_val = array_values($data);
        $where_str = array_keys($where)[0].' = '. implode( ' OR '.array_keys($where)[0].' = ', array_values($where)[0]);

        $sql = "UPDATE $table SET " .$data_keys[0].' = '.$data_val[0].' WHERE '. $where_str;
        var_dump($sql);
    }
}