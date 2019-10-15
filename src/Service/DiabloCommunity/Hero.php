<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Hero extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/hero';

    /**
     * @param string $classSlug
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function characterClass(string $classSlug)
    {
        $url = self::url . '/:classSlug';
        return $this->requestGet($url, ['classSlug' => $classSlug]);
    }

    /**
     * @param string $classSlug
     * @param string $skillSlug
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function skill(string $classSlug, string $skillSlug)
    {
        $url = self::url . '/:classSlug/skill/:skillSlug';
        return $this->requestGet($url, ['classSlug' => $classSlug, 'skillSlug' => $skillSlug]);
    }
}