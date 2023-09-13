<?php

namespace App\DataSources;

class MockDataSource implements IDataSource {

    private $data = [];

    public function __construct()
    {
        $this->data = [
            'categoria' => [],
            'producto' => []
        ];
    }

    public function findAll($resource) {
        return $this->data[$resource];
    }

    public function findMany($resource, $field, $operator, $value) 
    {
        return $this->data[$resource];
    }

    public function findOne($resource, $field, $value) {
        return $this->data[$resource][0];
    }

    public function create($resource, $data) {}

    public function update($resource, $data, $field, $value) {}

    public function delete($resource, $field, $value) {}

}