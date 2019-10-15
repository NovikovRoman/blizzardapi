<?php

namespace BlizzardApi\Service\StarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Profile extends AbstractService implements ServiceInterface
{
    const url = '/sc2';

    /**
     * @param int $regionId
     * @param int $realmId (1 or 2)
     * @param int $profileId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(int $regionId, int $realmId, int $profileId)
    {
        $url = self::url . '/profile/:regionId/:realmId/:profileId';
        return $this->requestGet($url,
            ['regionId' => $regionId, 'realmId' => $realmId, 'profileId' => $profileId]
        );
    }

    /**
     * @param int $regionId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function static(int $regionId)
    {
        $url = self::url . '/static/profile/:regionId';
        return $this->requestGet($url, ['regionId' => $regionId]);
    }

    /**
     * @param int $regionId
     * @param int $realmId (1 or 2)
     * @param int $profileId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function metadata(int $regionId, int $realmId, int $profileId)
    {
        $url = self::url . '/metadata/profile/:regionId/:realmId/:profileId';
        return $this->requestGet($url,
            ['regionId' => $regionId, 'realmId' => $realmId, 'profileId' => $profileId]
        );
    }

    /**
     * @param int $regionId
     * @param int $realmId (1 or 2)
     * @param int $profileId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function ladderSummary(int $regionId, int $realmId, int $profileId)
    {
        $url = self::url . '/profile/:regionId/:realmId/:profileId/ladder/summary';
        return $this->requestGet($url,
            ['regionId' => $regionId, 'realmId' => $realmId, 'profileId' => $profileId]
        );
    }

    /**
     * @param int $regionId
     * @param int $realmId (1 or 2)
     * @param int $profileId
     * @param int $ladderId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function ladder(int $regionId, int $realmId, int $profileId, int $ladderId)
    {
        $url = self::url . '/profile/:regionId/:realmId/:profileId/ladder/:ladderId';
        return $this->requestGet($url,
            ['regionId' => $regionId, 'realmId' => $realmId, 'profileId' => $profileId, 'ladderId' => $ladderId]
        );
    }
}