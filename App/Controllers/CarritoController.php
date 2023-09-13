<?php

namespace App\Controllers;

use App\Repositories\ProductosRepository;

use Core\Carrito;

class CarritoController
{
    public static function Agregar($req, $params){
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : new Carrito();
    
        $repo = new ProductosRepository($req->dataSource);
        $producto = $repo->findById($params[0]);
    
        if($carrito->contiene($producto))
            $carrito->incrementar($producto);
        else
            $carrito->agregar($producto);
    
    
        var_dump($carrito);
        $_SESSION['carrito'] = $carrito;
    
        header('Location: /pedido');
    }
}