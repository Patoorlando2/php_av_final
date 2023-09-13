<?php

namespace Core;

class Producto
{
    public $id;
    public $nombre;
    public $contenido;
    public $precio;
    public $url_img_principal;
    public $categoria;

    public function __construct(
        $id = 0,
        $nombre = '',
        $contenido = '',
        $precio = 0,
        $fotos = [],
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->contenido = $contenido;
        $this->precio = $precio;
        $this->fotos = $fotos;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'contenido' => $this->contenido,
            'precio' => $this->precio
        ];
    }
}