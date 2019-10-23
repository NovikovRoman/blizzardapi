<?php

namespace BlizzardApi\Service;

use BlizzardApi\BlizzardClient;
use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use GuzzleHttp\Exception\GuzzleException;

abstract class AbstractService
{
    /** @var BlizzardClient */
    protected $blizzardClient;

    public function __construct(BlizzardClient $blizzardClient)
    {
        $this->blizzardClient = $blizzardClient;
    }

    /**
     * @param $url
     * @param array $vars
     * @param array $params
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    protected function requestGet($url, $vars = [], $params = [])
    {
        if (!empty($params['namespace'])) {
            $params['namespace'] .= '-' . $this->blizzardClient->getRegion();
        }
        $resp = $this->blizzardClient->requestGet($url, $vars, $params);

        return json_decode($resp->getBody()->getContents(), true);
    }
}