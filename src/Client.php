<?php

namespace Apvalkov\LaravelOpenexchangerates;

use Apvalkov\LaravelOpenexchangerates\Exceptions\ApiErrorException;
use Apvalkov\LaravelOpenexchangerates\Responses\ErrorResponse;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Shureban\LaravelObjectMapper\Exceptions\ParseJsonException;
use Shureban\LaravelObjectMapper\ObjectMapper;

class Client extends GuzzleHttpClient
{
    public function __construct()
    {
        $config = [
            'base_uri' => config('openexchangerates.url'),
            'timeout'  => config('openexchangerates.timeout'),
        ];

        parent::__construct($config);
    }

    /**
     * @throws ApiErrorException
     * @throws ParseJsonException
     * @throws GuzzleException
     */
    public function request(string $method, $uri = '', array $options = []): ResponseInterface
    {
        try {
            return parent::request($method, $uri, $options);
        } catch (RequestException $e) {
            if ($response = $e->getResponse()) {
                $error = (new ObjectMapper(new ErrorResponse()))->map($response->getBody()->getContents());

                throw new ApiErrorException($error, $e);
            }

            throw $e;
        }
    }
}
