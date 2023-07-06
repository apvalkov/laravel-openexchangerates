<?php

namespace Apvalkov\LaravelOpenexchangerates\Requests;

class LatestRatesRequest extends Request
{
    private ?string $base;
    private ?array  $symbols;
    private bool    $prettyprint;
    private bool    $show_alternative;

    /**
     * @param string|null $base
     * @param array|null $symbols
     * @param bool $prettyprint
     * @param bool $show_alternative
     */
    public function __construct(?string $base = null, ?array $symbols = null, bool $prettyprint = false, bool $show_alternative = false)
    {
        $this->base             = $base;
        $this->symbols          = $symbols;
        $this->prettyprint      = $prettyprint;
        $this->show_alternative = $show_alternative;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'base'             => $this->base,
            'symbols'          => $this->symbols !== null ? implode(',', $this->symbols) : null,
            'prettyprint'      => $this->prettyprint,
            'show_alternative' => $this->show_alternative,
        ];
    }
}
