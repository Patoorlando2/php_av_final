<?php

namespace App\DataSources;

interface IDataSource {

    public function findAll($resource);

    public function findMany($resource, $field, $operator, $value);

    public function findOne($resource, $field, $value);

    public function create($resource, $data);

    public function update($resource, $data, $field, $value);

    public function delete($resource, $field, $value);

}

