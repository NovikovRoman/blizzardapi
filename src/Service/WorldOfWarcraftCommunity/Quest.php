<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Quest extends AbstractService implements ServiceInterface
{
    const url = '/wow/quest';

    /**
     * @param string $questId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $questId)
    {
        $url = self::url . '/:questId';
        return $this->requestGet($url, ['questId' => $questId]);
    }
}