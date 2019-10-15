<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Zone extends AbstractService implements ServiceInterface
{
    const url = '/wow/zone';

    /**
     * @param string $zoneId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $zoneId)
    {
        $url = self::url . '/:zoneId';
        return $this->requestGet($url, ['zoneId' => $zoneId]);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function getList()
    {
        return $this->requestGet(self::url);
    }
}