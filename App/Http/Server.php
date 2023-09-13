<?php

namespace App\Http;

use App\Http\Request;
use App\Http\Middlewares\ClosureMiddleware;
use App\Http\Middlewares\Routing\RoutingMiddleware;
use App\Http\Middlewares\Routing\Router;

class Server
{
    private $_router;
    private $_pipeline;
    private $_request;

    private $conditionals = [];



    public function __construct(Request $request)
    {
        $this->_request = $request;
        $this->_router = new Router();
        $this->_pipeline = new RequestPipeline();
    }

    public function router() { return $this->_router; }
    public function request() { return $this->_request; }
    
    public function if($basePath, $configCallback)
    {
        if($this->_request->uriStartsWith($basePath))
            $configCallback($this);
    }

    public function not($basePath, $configCallback)
    {
        if(!$this->_request->uriStartsWith($basePath))
            $configCallback($this);
    }

    public function use($middleware) { 
        if(is_callable($middleware))
            $this->_pipeline->use(new ClosureMiddleware($middleware)); 
        else
            $this->_pipeline->use($middleware); 
    }

    public function handle() {
        $this->_pipeline->use(
            new RoutingMiddleware($this->_router)
        );
        return $this->_pipeline->handle($this->_request);
    }


}
