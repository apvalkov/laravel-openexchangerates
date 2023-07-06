<?php

return [
    'url'     => env('OPEN_EXCHANGE_RATES_BASE_URI', 'https://openexchangerates.org'),
    'timeout' => env('OPEN_EXCHANGE_RATES_TIMEOUT', 30),
    'app_id'  => env('OPEN_EXCHANGE_RATES_APP_ID', 30),
];
