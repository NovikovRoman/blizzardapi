<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Playable extends AbstractService implements ServiceInterface
{
    const url = '/data/wow';
    const urlClass = '/data/wow/playable-class';
    const urlRace = '/data/wow/playable-race';
    const urlSpecialization = '/data/wow/playable-specialization';

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function classId(int $id)
    {
        $url = self::urlClass . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function classes()
    {
        $url = self::urlClass . '/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $classId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function talentSlots(int $classId)
    {
        $url = self::urlClass . '/:classId/pvp-talent-slots';
        return $this->requestGet($url, ['classId' => $classId], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function classMedia(int $id)
    {
        $url = self::url . '/media/playable-class/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function raceId(int $id)
    {
        $url = self::urlRace . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function races()
    {
        $url = self::urlRace . '/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function specializationId(int $id)
    {
        $url = self::urlSpecialization . '/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function specializations()
    {
        $url = self::urlSpecialization . '/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }
}