<?php

namespace Core;

class Carrito
{
    private $items = [];

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function items() 
    { 
        return $this->items; 
    }

    public function toArray()
    {
        $output = array_map(function($item){
            return [
                'cantidad' => $item->cantidad,
                'producto' => [
                    'id' => $item->producto->id,
                    'nombre' => $item->producto->nombre,
                    'descripcion' => $item->producto->contenido
                ]
            ];
        }, $this->items);
        return $output;
    }

    public function contiene(Producto $prod)
    {
        $founded = false;
        foreach ($this->items as $item) {
            if($item->producto->id == $prod->id) {
                $founded = true;
                break;
            }
        }
        return $founded;
    }

    public function agregar(Producto $prod)
    {
        array_push($this->items, new CarritoItem($prod));
    }

    public function quitar(Producto $prod)
    {
        $this->items = array_filter($this->items, function($item){
            return $item->producto->id != $prod->id;
        });
    }

    public function incrementar(Producto $prod)
    {
        $this->items = array_map(function($item) use ($prod){
            if($item->producto->id == $prod->id)
            {
                $item->incrementar();
                return $item;
            }
            else
            {
                return $item;
            }
        },$this->items);
    }

    public function reducir(Producto $prod)
    {
        $this->items = array_map(function($item) use ($prod){
            if($item->producto->id == $prod->id)
            {
                $item->reducir();
                return $item;
            }
            else
            {
                return $item;
            }
        }, $this->items);
    }
}
