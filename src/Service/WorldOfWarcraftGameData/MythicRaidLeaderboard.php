<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class MythicRaidLeaderboard extends AbstractService implements ServiceInterface
{
    const url = '/data/wow/leaderboard/hall-of-fame';

    /**
     * @param string $raid
     * @param string $faction
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function list(string $raid, string $faction)
    {
        $url = self::url . '/:raid/:faction';
        return $this->requestGet($url, ['raid' => $raid, 'faction' => $faction], ['namespace' => 'dynamic']);
    }
}