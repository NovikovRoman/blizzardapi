<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Achievement extends AbstractService implements ServiceInterface
{
    const url = '/wow/achievement';

    /**
     * @param string $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $id)
    {
        $url = self::url . '/:id';
        return $this->requestGet($url, ['id' => $id]);
    }
}