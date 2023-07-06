<?php

namespace Apvalkov\LaravelOpenexchangerates;

use Apvalkov\LaravelOpenexchangerates\Enums\Currency;

class ExchangeRate
{
    private Currency $base;
    private Currency $quote;
    private float    $rate;

    /**
     * @param Currency $base
     * @param Currency $quote
     * @param float $rate
     */
    public function __construct(Currency $base, Currency $quote, float $rate)
    {
        $this->base  = $base;
        $this->quote = $quote;
        $this->rate  = $rate;
    }

    /**
     * @return Currency
     */
    public function base(): Currency
    {
        return $this->base;
    }

    /**
     * @return Currency
     */
    public function quote(): Currency
    {
        return $this->quote;
    }

    /**
     * @return float
     */
    public function rate(): float
    {
        return $this->rate;
    }
}
