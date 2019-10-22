<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Creature extends AbstractService implements ServiceInterface
{
    const url = '/data/wow';

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function families()
    {
        $url = self::url . '/creature-family/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function family(int $id)
    {
        $url = self::url . '/creature-family/index';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function types()
    {
        $url = self::url . '/creature-type/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function type(int $id)
    {
        $url = self::url . '/creature-type/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(int $id)
    {
        $url = self::url . '/creature/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function displayMedia(int $id)
    {
        $url = self::url . '/media/creature-display/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function familyMedia(int $id)
    {
        $url = self::url . '/media/creature-family/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }
}