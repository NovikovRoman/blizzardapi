<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class User extends AbstractService implements ServiceInterface
{
    const url = '/wow/user';

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function characters()
    {
        $url = self::url . '/characters';
        return $this->requestGet($url, []);
    }
}