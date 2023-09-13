<?php

namespace App\Http\Middlewares;

class SessionStartMiddleware extends Middleware
{
    public function handle($req)
    {
        session_start();

        $this->next($req);
    }
}