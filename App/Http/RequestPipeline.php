<?php

namespace App\Http;

use App\Http\Request;
use App\Http\Middlewares\Middleware;

class RequestPipeline
{
    private $handlers = [];

    public function use(Middleware $handler)
    {
        array_push($this->handlers, $handler);
    }
    
    public function handle(Request $input)
    {
        // Asignamos automáticamente los next basandonos en la posicion en el array
        for ($i=0; $i < count($this->handlers); $i++) { 
            if($i != (count($this->handlers) - 1)) {
                $this->handlers[$i]->setNext($this->handlers[$i + 1]);
            }
        }
        
        // Usamos el primero para empezar la cadena
        return $this->handlers[0]->handle($input);
    }
}