<?php

namespace App\Repositories;

use App\DataSources\IDataSource;
use Core\Producto;

class ProductosRepository
{
    private $dataSource;

    public function __construct(IDataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    private function createObject($data)
    {
        $obj = new Producto();
        $obj->id = $data['id'];
        $obj->nombre = $data['nombre'];
        $obj->url_img_principal = $data['url_img_principal'];
        $obj->contenido = $data['contenido'];
        return $obj;
    }

    /**
     * Acá usamos la interfaz del Data Source
     */
    public function findAll() 
    {
        $output = [];
        $result = $this->dataSource->findAll('productos');
        foreach ($result as $data) {
            array_push($output, $this->createObject($data));
        }
        return $output;
    }

    public function findById($id)
    {
        $data = $this->dataSource->findOne('productos', 'id', $id);
        return $this->createObject($data);
    }

    public function find($field, $operator, $value)
    {
        $output = [];
        $result = $this->dataSource->findMany('productos', $field, $operator, $value);
        foreach ($result as $data) {
            array_push($output, $this->createObject($data));
        }
        return $output;
    }

    public function create($producto)
    {
        return $this->dataSource->create($producto->toArray());
    }

    public function update($producto)
    {
        return $this->dataSource->update($producto->toArray(), 'id', $producto->id);
    }

    public function delete($producto)
    {
        return $this->dataSource->delete('id', $producto->id);
    }
}