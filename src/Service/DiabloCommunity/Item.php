<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Item extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/item';

    /**
     * @param string $itemSlugAndId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $itemSlugAndId)
    {
        $url = self::url . '/:itemSlugAndId';
        return $this->requestGet($url, ['itemSlugAndId' => $itemSlugAndId]);
    }
}