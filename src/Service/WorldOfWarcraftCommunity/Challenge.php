<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Challenge extends AbstractService implements ServiceInterface
{
    const url = '/wow/challenge';

    /**
     * @param string $realm
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $realm)
    {
        $url = self::url . '/:realm';
        return $this->requestGet($url, ['realm' => $realm]);
    }

    /**
     * @param string $realm
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function region(string $realm)
    {
        $url = self::url . '/region';
        return $this->requestGet($url);
    }
}