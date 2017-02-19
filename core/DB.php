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
        $values =  ':'.implode(', :', array_keys($data));

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUE (%s)",
            $table,
            $fields,
            $values
        );

       $this->db->prepare($sql)->execute($data);
    }

    public function select($table)
    {
        $sql = "SELECT * FROM $table";

        return $this->db->query($sql)->fetchAll();
    }

    /**
     * @param string $table
     * @param array $data = [
     *                       'field_name_1' => value_1,
     *                      ]
     * @param array $where = [
     *                         'field_name_1' => [
     *                                            value1,
     *                                            value2
     *                                           ]
     *                       ]
     * @return string
     */
    private static function where_cond(array $where){
        $where_str = "";
        foreach($where as $key => $values){
            foreach ($values as $value){
                $where_str.= $key. ' = '. $value.' OR ';
            }
        }
        $where_str = rtrim($where_str, ' OR ');
        return $where_str;
    }

    public function update($table, $data, $where){
        $fields_str = implode(' = ?, ',array_keys($data)).' = ?';

        $where_str = $this->where_cond($where);


        $sql = sprintf(
            "UPDATE %s SET %s WHERE %s",
            $table,
            $fields_str,
            $where_str
        );
        $this->db->prepare($sql)->execute(array_values($data));
    }

    public function sql_delete($table, $where){

        $where_str= $this->where_cond($where);

        $sql = sprintf("DELETE FROM %s WHERE %s",
            $table,
            $where_str
        );

        $this->db->exec($sql);
    }

}