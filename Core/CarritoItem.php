<?php

namespace Core;

class CarritoItem
{
    public $cantidad;
    public Producto $producto;

    public function __construct($producto)
    {
        $this->producto = $producto;
        $this->cantidad = 1;
    }

    public function incrementar()
    {
        $this->cantidad = $this->cantidad + 1;
    }

    public function reducir()
    {
        $this->cantidad = $this->cantidad - 1;
    }
}