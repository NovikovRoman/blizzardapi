<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class ConnectedRealm extends AbstractService implements ServiceInterface
{
    const url = '/data/wow/connected-realm';

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(int $id)
    {
        $url = self::url . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'dynamic']);
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