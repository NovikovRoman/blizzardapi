<?php

namespace BlizzardApi\Service\StarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Ladder extends AbstractService implements ServiceInterface
{
    const url = '/sc2/ladder';

    /**
     * @param int $regionId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function grandmaster(int $regionId)
    {
        $url = self::url . '/grandmaster/:regionId';
        return $this->requestGet($url, ['regionId' => $regionId]);
    }

    /**
     * @param int $regionId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function season(int $regionId)
    {
        $url = self::url . '/season/:regionId';
        return $this->requestGet($url, ['regionId' => $regionId]);
    }
}