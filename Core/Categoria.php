<?php

namespace Core;

class Categoria
{
    public $id;
    public $nombre;
    public $descripcion;
    public $url_imagen;
    
    public $productos = [];

    public function __construct(
        $id = 0,
        $nombre = '',
        $foto = '',
        $productos = []
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->foto = $foto;
        $this->productos = $productos;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'foto' => $this->foto
        ];
    }
}