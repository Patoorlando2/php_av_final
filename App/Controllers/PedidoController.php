<?php

namespace App\Controllers;

use App\Mail\Mail;
use Core\Carrito;
use App\Repositories\ProductosRepository;

class PedidoController
{
    public static function Index($req, $params){
    
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : new Carrito();
        require_once '../App/Views/pedido.php';
    }

    public static function Presupuesto($req, $params){
        $pedido = $_SESSION['carrito']->toArray();
        parse_str($req->body(), $cuerpo);

        $html = '<h1>Pedido de '.$cuerpo['nombre'].'</h1>';
        $html .= '<div><b>Email: '.$cuerpo['email'].'</b></div>';

        foreach ($pedido as $item) {
            $html .= '<h2>Producto: '.$item['producto']['nombre'].' ('.$item['producto']['id'].')</h2>';
            $html .= '<p>'.$item['producto']['descripcion'].'</p>';
            $html .= '<b>CANTIDAD: '.$item['cantidad'].'</b>';
            $html .= '<hr />';
        }

        if($req->mailer->send(new Mail(
            MAIL_FROM,
            'Solicitud de presupuesto desde la web',
            $html
        ))) {
            header('Location: /');
        } else {
            echo "Error";
        }
    }

    public static function PresupuestoApi($req, $params)
    {
        if($req->headers()['content-type'] != 'application/json')
            return http_response_code(500);

        $pedido = json_decode($req->body());

        $html = '<h1>Pedido de '.$pedido->nombre.'</h1>';
        $html .= '<div><b>Email: '.$pedido->email.'</b></div>';

        $repo = new ProductosRepository($req->dataSource);

        foreach ($pedido->productos as $item) {
            $producto = $repo->findById($item->id);
            $html .= '<h2>Producto: '.$producto->nombre.' ('.$item->id.')</h2>';
            $html .= '<p>'.$producto->contenido.'</p>';
            $html .= '<b>CANTIDAD: '.$item->count.'</b>';
            $html .= '<hr />';
        }

        if($req->mailer->send(new Mail(
            MAIL_FROM,
            'Solicitud de presupuesto desde la web',
            $html
        ))) {
            http_response_code(200);
            return;
        } else {
            http_response_code(400);
            return;
        }

    }

}