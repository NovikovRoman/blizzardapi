<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Item extends AbstractService implements ServiceInterface
{
    const url = '/wow/item';

    /**
     * @param string $itemId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $itemId)
    {
        $url = self::url . '/:itemId';
        return $this->requestGet($url, ['itemId' => $itemId]);
    }

    /**
     * @param string $setId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function set(string $setId)
    {
        $url = self::url . '/set/:itemId';
        return $this->requestGet($url, ['setId' => $setId]);
    }
}