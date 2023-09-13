<?php

namespace App\Http\Middlewares;

use App\Http\Request;

class ClosureMiddleware extends Middleware
{
    private $callable;

    public function __construct($callable)
    {
        $this->callable = $callable;
    }

    private function getCallable() { return $this->callable; }

    public function handle(Request $input)
    {
        $callable = $this->getCallable();

        return $callable($input, $this);
    }
}