<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class MythicKeystone extends AbstractService implements ServiceInterface
{
    const url = '/data/wow/mythic-keystone';
    const urlAffix = '/data/wow/keystone-affix';
    const urlLeaderboard = '/data/wow/connected-realm';

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function list()
    {
        $url = self::url . '/index';
        return $this->requestGet($url, [], ['namespace' => 'dynamic']);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function dungeons()
    {
        $url = self::url . '/dungeon/index';
        return $this->requestGet($url, [], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function dungeon(int $id)
    {
        $url = self::url . '/dungeon/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'dynamic']);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function periods()
    {
        $url = self::url . '/preiod/index';
        return $this->requestGet($url, [], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function period(int $id)
    {
        $url = self::url . '/period/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'dynamic']);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function seasons()
    {
        $url = self::url . '/season/index';
        return $this->requestGet($url, [], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function season(int $id)
    {
        $url = self::url . '/season/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $connectedRealmId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function leaderboards(int $connectedRealmId)
    {
        $url = self::urlLeaderboard . '/:connectedRealmId/mythic-leaderboard/index';
        return $this->requestGet($url, ['connectedRealmId' => $connectedRealmId], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $connectedRealmId
     * @param int $dungeonId
     * @param int $period
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function leaderboard(int $connectedRealmId, int $dungeonId, int $period)
    {
        $url = self::urlLeaderboard . '/:connectedRealmId/mythic-leaderboard/:dungeonId/period/:period';
        return $this->requestGet($url,
            ['connectedRealmId' => $connectedRealmId, 'dungeonId' => $dungeonId, 'period' => $period],
            ['namespace' => 'dynamic']);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function affixes()
    {
        $url = self::urlAffix . '/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function affix(int $id)
    {
        $url = self::urlAffix . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }
}