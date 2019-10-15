<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Leaderboard extends AbstractService implements ServiceInterface
{
    const url = '/wow/leaderboard';

    /**
     * @param string $bracket
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getBracket(string $bracket)
    {
        $url = self::url . '/:bracket';
        return $this->requestGet($url, ['bracket' => $bracket]);
    }
}