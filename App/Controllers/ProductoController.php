<?php

namespace App\Controllers;

use App\Repositories\CategoriasRepository;
use App\Repositories\ProductosRepository;

class ProductoController
{
    public static function Index($req, $params){
        $repoProds = new ProductosRepository($req->dataSource);
        $repoCategorias = new CategoriasRepository($req->dataSource);
    
        $categoria = $repoCategorias->findById($params[0]);
        $productos = $repoProds->find('id_categoria', '=', $params[0]);
        require_once '../App/Views/categoria.php';
    }

    public static function Producto($req, $params){
        $repoProds = new ProductosRepository($req->dataSource);
        $repoCategorias = new CategoriasRepository($req->dataSource);
    
        $categoria = $repoCategorias->findById($params[0]);
        $producto = $repoProds->findById($params[1]);
        require_once '../App/Views/detalle.php';
    }

    // API Methods
    public static function All($req, $params){
        $repoProds = new ProductosRepository($req->dataSource);
        
        header('Content-type: application/json');
        echo json_encode($repoProds->findAll());
    }

    public static function One($req, $params){
        $repoProds = new ProductosRepository($req->dataSource);
        
        header('Content-type: application/json');
        echo json_encode($repoProds->findById($params[0]));
        
    }

    public static function Create($req, $params){
        $repoProds = new ProductosRepository($req->dataSource);
        // TODO
    }

    public static function Update($req, $params){
        $repoProds = new ProductosRepository($req->dataSource);
        // TODO
    }

    public static function Delete($req, $params){
        $repoProds = new ProductosRepository($req->dataSource);
        // TODO
    }
}