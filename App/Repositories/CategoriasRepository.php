<?php

namespace App\Repositories;

use App\DataSources\IDataSource;
use Core\Categoria;

class CategoriasRepository
{
    private $dataSource;

    public function __construct(IDataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    private function createObject($data)
    {
        $obj = new Categoria();
        $obj->id = $data['id'];
        $obj->nombre = $data['nombre'];
        $obj->descripcion = $data['descripcion'];
        $obj->url_imagen = $data['url_imagen'];

        return $obj;
    }

    /**
     * Acá usamos la interfaz del Data Source
     */
    public function findAll() 
    {
        $output = [];
        $result = $this->dataSource->findAll('categorias');
        foreach ($result as $data) {
            array_push($output, $this->createObject($data));
        }
        return $output;
    }

    public function findById($id)
    {
        $data = $this->dataSource->findOne('categorias', 'id', $id);
        return $this->createObject($data);
    }

    public function find($field, $operator, $value)
    {
        $result = $this->dataSource->findMany('categorias', $field, $operator, $value);
        foreach ($result as $data) {
            array_push($output, $this->createObject($data));
        }
        return $output;
    }

    public function create($categoria)
    {
        return $this->dataSource->create($categoria->toArray());
    }

    public function update($categoria)
    {
        return $this->dataSource->update($categoria->toArray(), 'id', $categoria->id);
    }

    public function delete($categoria)
    {
        return $this->dataSource->delete('id', $categoria->id);
    }
}