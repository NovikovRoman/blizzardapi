<?php

namespace BlizzardApi\Service\StarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Legacy extends AbstractService implements ServiceInterface
{
    const url = '/sc2/legacy';

    /**
     * @param int $regionId
     * @param int $realmId (1 or 2)
     * @param int $profileId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function profile(int $regionId, int $realmId, int $profileId)
    {
        $url = self::url . '/profile/:regionId/:realmId/:profileId';
        return $this->requestGet($url, ['regionId' => $regionId, 'realmId' => $realmId, 'profileId' => $profileId]);
    }

    /**
     * @param int $regionId
     * @param int $realmId
     * @param int $profileId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function ladders(int $regionId, int $realmId, int $profileId)
    {
        $url = self::url . '/profile/:regionId/:realmId/:profileId/ladders';
        return $this->requestGet($url, ['regionId' => $regionId, 'realmId' => $realmId, 'profileId' => $profileId]);
    }

    /**
     * @param int $regionId
     * @param int $realmId
     * @param int $profileId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function matches(int $regionId, int $realmId, int $profileId)
    {
        $url = self::url . '/profile/:regionId/:realmId/:profileId/matches';
        return $this->requestGet($url, ['regionId' => $regionId, 'realmId' => $realmId, 'profileId' => $profileId]);
    }

    /**
     * @param int $regionId
     * @param int $ladderId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function ladder(int $regionId, int $ladderId)
    {
        $url = self::url . '/ladder/:regionId/:ladderId';
        return $this->requestGet($url, ['regionId' => $regionId, 'ladderId' => $ladderId]);
    }

    /**
     * @param int $regionId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function achievements(int $regionId)
    {
        $url = self::url . '/data/achievements/:regionId';
        return $this->requestGet($url, ['regionId' => $regionId]);
    }

    /**
     * @param int $regionId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function rewards(int $regionId)
    {
        $url = self::url . '/data/rewards/:regionId';
        return $this->requestGet($url, ['regionId' => $regionId]);
    }
}