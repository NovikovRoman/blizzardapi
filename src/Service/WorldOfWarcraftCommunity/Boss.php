<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Boss extends AbstractService implements ServiceInterface
{
    const url = '/wow/boss';

    /**
     * @param string $bossId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $bossId)
    {
        $url = self::url . '/:bossId';
        return $this->requestGet($url, ['bossId' => $bossId]);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function getList()
    {
        return $this->requestGet(self::url);
    }
}