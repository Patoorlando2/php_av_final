<?php

namespace App\DataSources;

use PDO;

class MySqlDataSource implements IDataSource {

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(
            'mysql:host='.MYSQL_HOST.';dbname='.MYSQL_NAME,
            MYSQL_USER,
            MYSQL_PASS
        );
    }   

    public function findAll($resource) 
    {
        return $this->pdo->query("SELECT * FROM $resource")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findMany($resource, $field, $operator, $value) 
    {
        $value = is_string($value) ? "'".$value."'" : $value;
        return $this->pdo->query("SELECT * FROM $resource WHERE $field $operator $value")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne($resource, $field, $value) 
    {
        $value = is_string($value) ? "'".$value."'" : $value;
        return $this->pdo->query("SELECT * FROM $resource WHERE $field = $value")->fetch(PDO::FETCH_ASSOC);
    }

    public function create($resource, $data) {
        $sql = 'INSERT INTO $resource ( ';

        foreach ($data as $key => $value) {
            $sql .= $key.',';
        }
        $sql = substr($sql, 0, -1);

        $sql .= ') VALUES (';

        foreach ($data as $key => $value) {
            if(is_string($value))
                $sql .= "'".$value."',";
            else
                $sql .= $value.",";
        }
        $sql = substr($sql, 0, -1);

        $sql .= ')';

        return $this->pdo->exec($sql);
    }

    public function update($resource, $data, $field, $value) 
    {
        $sql = 'UPDATE $resource SET ';

        foreach ($data as $key => $value) {
            if(is_string($value))
                $sql .= $key." = '".$value."',";
            else
                $sql .= $key." = ".$value.",";
        }
        $sql = substr($sql, 0, -1);

        $sql .= is_string($value) ? " WHERE $field = '$value'" : " WHERE $field = $value";

        return $this->pdo->exec($sql);
    }

    public function delete($resource, $field, $value) {
        $sql = is_string($value) ? 
            "DELETE $resource WHERE $field = '$value'" : 
            "DELETE $resource WHERE $field = $value";

        return $this->pdo->exec($sql);
    }

}