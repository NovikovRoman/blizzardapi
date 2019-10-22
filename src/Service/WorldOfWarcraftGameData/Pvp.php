<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Pvp extends AbstractService implements ServiceInterface
{
    const url = '/data/wow';
    const urlSeason = '/data/wow/pvp-season';
    const urlTier = '/data/wow/pvp-tier';

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function season(int $id)
    {
        $url = self::urlSeason . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'dynamic']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function seasons()
    {
        $url = self::urlSeason . '/index';
        return $this->requestGet($url, [], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $seasonId
     * @param string $bracket
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function leaderboard(int $seasonId, string $bracket)
    {
        $url = self::urlSeason . '/:seasonId/pvp-leaderboard/:bracket';
        return $this->requestGet($url, ['seasonId' => $seasonId, 'bracket' => $bracket], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $seasonId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function leaderboards(int $seasonId)
    {
        $url = self::urlSeason . '/:seasonId/pvp-leaderboard/index';
        return $this->requestGet($url, ['seasonId' => $seasonId], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $seasonId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function rewards(int $seasonId)
    {
        $url = self::urlSeason . '/:seasonId/pvp-reward/index';
        return $this->requestGet($url, ['seasonId' => $seasonId], ['namespace' => 'dynamic']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function tierId(int $id)
    {
        $url = self::urlTier . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function tiers()
    {
        $url = self::urlTier . '/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function tierMedia(int $id)
    {
        $url = self::url . '/media/pvp-tier/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }
}