<?php

namespace App\Http\Middlewares;

use App\Http\Request;

abstract class Middleware
{
    /**
     * Referencia al siguiente
     */
    private $_next;

    public function setNext(Middleware $handler) 
    {
        $this->_next = $handler;
    }

    public function next(Request $input)
    {
        if(!is_null($this->_next))
            return $this->_next->handle($input);
    }

    /**
     * Su propio proceso
     */
    public function handle(Request $input)
    {

    }
}