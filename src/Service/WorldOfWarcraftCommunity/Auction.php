<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Auction extends AbstractService implements ServiceInterface
{
    const url = '/wow/auction';

    /**
     * @param string $realm
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function data(string $realm)
    {
        $url = self::url . '/data/:realm';
        return $this->requestGet($url, ['realm' => $realm]);
    }
}