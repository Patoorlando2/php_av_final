<?php

/**
 * Front-Controller
 * 
**/

require_once '../configs/mail.php';
require_once '../configs/database.php';

require_once '../autoload.php';

require_once '../vendor/PHPMailer/PHPMailer.php';
require_once '../vendor/PHPMailer/SMTP.php';
require_once '../vendor/PHPMailer/Exception.php';

use App\Http\Request;
use App\Http\Server;

use App\Http\Middlewares\SessionStartMiddleware;
use App\Http\Middlewares\Authentication\AuthMiddleware;

use App\DataSources\MySqlDataSource;
use App\Mail\Mailers\DefaultMailer;
use App\Mail\Mailers\PhpmailerMailer;

$server = new Server((new Request())->fromGlobal());

// Configurar las dependencias de la aplicación
$server->use(function($req, $middleware) {
    $req->dataSource = new MySqlDataSource(); 
    $req->mailer = new PhpmailerMailer();

    $middleware->next($req);

});

$server->if('/api', function($server){

    // $server->use(new AuthMiddleware());

    // API - Recurso Productos
    $server->router()->get('/api/producto',                         'App\Controllers\ProductoController::All');
    $server->router()->get('/api/producto/([A-Za-z0-9]*)',          'App\Controllers\ProductoController::One');
    $server->router()->post('/api/producto',                        'App\Controllers\ProductoController::Create');
    $server->router()->put('/api/producto/([A-Za-z0-9]*)',          'App\Controllers\ProductoController::Update');
    $server->router()->delete('/api/producto/([A-Za-z0-9]*)',       'App\Controllers\ProductoController::Delete');

        // API - Recurso Categorias
    $server->router()->get('/api/categoria',                        'App\Controllers\CategoriaController::All');
    $server->router()->get('/api/categoria/([A-Za-z0-9]*)',         'App\Controllers\CategoriaController::One');
    $server->router()->post('/api/categoria',                       'App\Controllers\CategoriaController::Create');
    $server->router()->put('/api/categoria/([A-Za-z0-9]*)',         'App\Controllers\CategoriaController::Update');
    $server->router()->delete('/api/categoria/([A-Za-z0-9]*)',      'App\Controllers\CategoriaController::Delete');

    $server->router()->post('/api/presupuesto',                     "App\Controllers\PedidoController::PresupuestoApi");
});

$server->not('/api', function($server){

    $server->use(new SessionStartMiddleware);

    $server->router()->get('/',                                                 "App\Controllers\HomeController::Index");

    $server->router()->get('/categoria/([A-Za-z0-9]*)',                         "App\Controllers\CategoriaController::Index");
    $server->router()->get('/categoria/([A-Za-z0-9]*)/producto/([A-Za-z0-9]*)', "App\Controllers\CategoriaController::Producto");

    $server->router()->get('/carrito/agregar/([0-9]*)',                         "App\Controllers\CarritoController::Agregar");

    $server->router()->get('/pedido',                                           "App\Controllers\PedidoController::Index");
    $server->router()->post('/pedido/presupuesto',                              "App\Controllers\PedidoController::Presupuesto");

});

$server->handle();
