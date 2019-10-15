<?php

namespace BlizzardApi\Service\StarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Player extends AbstractService implements ServiceInterface
{
    const url = '/sc2/player';

    /**
     * @param string $accountId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $accountId)
    {
        $url = self::url . '/:accountId';
        return $this->requestGet($url, ['accountId' => $accountId]);
    }
}