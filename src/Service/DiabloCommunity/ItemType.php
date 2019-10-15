<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class ItemType extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/item-type';

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getList()
    {
        return $this->requestGet(self::url);
    }

    /**
     * @param string $itemTypeSlug
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function getBySlug(string $itemTypeSlug)
    {
        $url = self::url . '/:itemTypeSlug';
        return $this->requestGet($url, ['itemTypeSlug' => $itemTypeSlug]);
    }
}