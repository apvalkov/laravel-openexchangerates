<?php

namespace Apvalkov\LaravelOpenexchangerates\Exceptions;

use Apvalkov\LaravelOpenexchangerates\Responses\ErrorResponse;
use Exception;
use Throwable;

class ApiErrorException extends Exception
{
    /**
     * @param ErrorResponse $response
     * @param Throwable|null $previous
     */
    public function __construct(ErrorResponse $response, ?Throwable $previous = null)
    {
        parent::__construct($response->description, $response->status, $previous);
    }
}
