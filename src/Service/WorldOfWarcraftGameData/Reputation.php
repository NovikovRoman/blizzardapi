<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Reputation extends AbstractService implements ServiceInterface
{
    const urlFaction = '/data/wow/reputation-faction';
    const urlTier = '/data/wow/reputation-tiers';

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function faction(int $id)
    {
        $url = self::urlFaction . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function factions()
    {
        $url = self::urlFaction . '/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function tier(int $id)
    {
        $url = self::urlTier . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @param int $seasonId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function tiers(int $seasonId)
    {
        $url = self::urlTier . '/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }
}