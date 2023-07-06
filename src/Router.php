<?php

namespace Apvalkov\LaravelOpenexchangerates;

use Carbon\Carbon;

class Router
{
    /**
     * @return string
     */
    public function getLatest(): string
    {
        return '/api/latest.json';
    }

    /**
     * @param Carbon $date
     * @return string
     */
    public function getHistorical(Carbon $date): string
    {
        $route = '/api/historical/:date.json';

        return str_replace(':date', $date->format('Y-m-d'), $route);
    }
}
