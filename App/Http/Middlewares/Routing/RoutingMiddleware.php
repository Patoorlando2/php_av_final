<?php

namespace App\Http\Middlewares\Routing;

use App\Http\Middlewares\Middleware;
use App\Http\Request;

class RoutingMiddleware extends Middleware
{
    private $_router;

    public function __construct(Router $router)
    {
        $this->_router = $router;
    }

    public function router() { return $this->_router; }

    public function handle(Request $request)
    {
        return $this->router()->handle($request);
    }
}