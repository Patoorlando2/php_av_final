<?php

namespace App\Http\Middlewares\Routing;

use App\Http\Request;

class Router
{
    private $routes = [];

    public function add($method, $pattern, $callable)
    {
        array_push($this->routes, [
            'method' => strtoupper($method),
            'pattern' => $pattern,
            'callable' => $callable
        ]);
        return $this;
    }

    public function get($pattern, $callable) 
    { 
        $this->add("GET", $pattern, $callable);
        return $this;
    }

    public function post($pattern, $callable) 
    { 
        $this->add("POST", $pattern, $callable);
        return $this;
    }

    public function put($pattern, $callable) 
    { 
        $this->add("PUT", $pattern, $callable);
        return $this;
    }

    public function patch($pattern, $callable) 
    { 
        $this->add("PATCH", $pattern, $callable);
        return $this;
    }

    public function delete($pattern, $callable) 
    { 
        $this->add("DELETE", $pattern, $callable);
        return $this;
    }

    public function handle(Request $request)
    {
        foreach ($this->routes as $route) {
            $pattern = '#^'.$route['pattern'].'$#';
            if(
                preg_match($pattern, $request->uri(), $urlParams) &&
                $route['method'] == $request->method()
            )
            {
                array_shift($urlParams);

                return $route['callable']($request, $urlParams);
            }
        }
    }
}