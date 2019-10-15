<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Pet extends AbstractService implements ServiceInterface
{
    const url = '/wow/pet';

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

    /**
     * @param string $abilityId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function ability(string $abilityId)
    {
        $url = self::url . '/ability/:abilityId';
        return $this->requestGet($url, ['abilityId' => $abilityId]);
    }

    /**
     * @param string $speciesId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function species(string $speciesId)
    {
        $url = self::url . '/species/:speciesId';
        return $this->requestGet($url, ['speciesId' => $speciesId]);
    }

    /**
     * @param string $speciesId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function stats(string $speciesId)
    {
        $url = self::url . '/stats/:speciesId';
        return $this->requestGet($url, ['speciesId' => $speciesId]);
    }
}