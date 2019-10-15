<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Act extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/act';

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
     * @param int $actId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(int $actId)
    {
        $url = self::url . '/:actId';
        return $this->requestGet($url, ['actId' => $actId]);
    }
}