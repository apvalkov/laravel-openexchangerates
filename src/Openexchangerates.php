<?php

namespace Apvalkov\LaravelOpenexchangerates;

use Apvalkov\LaravelOpenexchangerates\Requests\HistoricalRatesRequest;
use Apvalkov\LaravelOpenexchangerates\Requests\LatestRatesRequest;
use Apvalkov\LaravelOpenexchangerates\Responses\ExchangeRatesResponse;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Shureban\LaravelObjectMapper\Exceptions\ParseJsonException;
use Shureban\LaravelObjectMapper\ObjectMapper;

class Openexchangerates
{
    private Client $client;
    private string $appId;
    private Router $router;

    public function __construct()
    {
        $this->client = new Client();
        $this->appId  = config('openexchangerates.app_id');
        $this->router = new Router();
    }

    /**
     * @throws ParseJsonException
     * @throws GuzzleException
     */
    public function latest(LatestRatesRequest $request): ExchangeRatesResponse
    {
        $response = $this->client->get($this->router->getLatest(), [
            'query' => array_merge(['app_id' => $this->appId], $request->toArray())
        ]);

        return (new ObjectMapper(new ExchangeRatesResponse()))->map($response->getBody()->getContents());
    }

    /**
     * @throws ParseJsonException
     * @throws GuzzleException
     */
    public function historical(HistoricalRatesRequest $request, Carbon $date): ExchangeRatesResponse
    {
        $response = $this->client->get($this->router->getHistorical($date), [
            'query' => array_merge(['app_id' => $this->appId], $request->toArray())
        ]);

        return (new ObjectMapper(new ExchangeRatesResponse()))->map($response->getBody()->getContents());
    }
}
