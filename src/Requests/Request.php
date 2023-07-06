<?php

namespace Apvalkov\LaravelOpenexchangerates\Requests;

abstract class Request
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
