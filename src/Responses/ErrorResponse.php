<?php

namespace Apvalkov\LaravelOpenexchangerates\Responses;

class ErrorResponse
{
    public bool   $error;
    public int    $status;
    public string $message;
    public string $description;
}
