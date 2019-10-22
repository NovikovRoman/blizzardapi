<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class AzeriteEssence extends AbstractService implements ServiceInterface
{
    const url = '/data/wow';

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(int $id)
    {
        $url = self::url . '/azerite-essence/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function list()
    {
        $url = self::url . '/azerite-essence/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function media(int $id)
    {
        $url = self::url . '/media/azerite-essence/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }
}