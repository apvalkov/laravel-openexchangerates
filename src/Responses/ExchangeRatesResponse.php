<?php

namespace Apvalkov\LaravelOpenexchangerates\Responses;

use Apvalkov\LaravelOpenexchangerates\Enums\Currency;
use Apvalkov\LaravelOpenexchangerates\ExchangeRate;
use Carbon\Carbon;
use Shureban\LaravelObjectMapper\MappableObject;
use stdClass;

class ExchangeRatesResponse extends MappableObject
{
    public string $disclaimer;
    public string $license;
    public Carbon $timestamp;
    public string $base;
    public array  $rates;

    /**
     * @param array $rates
     * @return void
     */
    public function setRates(array $rates): void
    {
        $this->rates = [];

        foreach ($rates as $code => $rate) {
            $this->rates[] = new ExchangeRate(new Currency($this->base), new Currency($code), $rate);
        }
    }
}
