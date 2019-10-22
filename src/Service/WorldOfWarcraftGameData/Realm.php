<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Realm extends AbstractService implements ServiceInterface
{
    const url = '/data/wow/realm';

    /**
     * @param string $slug
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $slug)
    {
        $url = self::url . '/:id';
        return $this->requestGet($url, ['slug' => $slug], ['namespace' => 'dynamic']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function list()
    {
        $url = self::url . '/index';
        return $this->requestGet($url, [], ['namespace' => 'dynamic']);
    }
}