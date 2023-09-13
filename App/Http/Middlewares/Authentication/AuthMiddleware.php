<?php

namespace App\Http\Middlewares\Authentication;

use App\Http\Middlewares\Middleware;
use App\Http\Request;

class AuthMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        // En este sencillo ejemplo verificamos que se haya pasado el Token.
        // Ahora bien la lógica puede ser tan compleja como queramos.
        // El control de usuarios sí que es un caso muy interesante de Middlewares
        
        $auth = true;

        if(!isset($request->headers()['x-access-token']))
            $auth = false;

        
        if($auth)
            $this->next($request);
        else
            http_response_code(403);
            
    }
}