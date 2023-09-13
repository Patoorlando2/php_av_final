<?php

namespace App\Controllers;

use App\Repositories\CategoriasRepository;

class HomeController
{
    public static function Index($req, $params){
        $repo = new CategoriasRepository($req->dataSource);
        
        $categorias = $repo->findAll();
        require_once '../App/Views/index.php';
    }
}