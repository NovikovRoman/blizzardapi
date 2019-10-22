<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Item extends AbstractService implements ServiceInterface
{
    const url = '/data/wow';

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function classes()
    {
        $url = self::url . '/item-class/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param string $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function getId(string $id)
    {
        $url = self::url . '/item/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @param string $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function classId(string $id)
    {
        $url = self::url . '/data/wow/item-class/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }

    /**
     * @param string $classId
     * @param string $subClassId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function subClassId(string $classId, string $subClassId)
    {
        $url = self::url . '/data/wow/item-class/:classId/item-subclass/:subClassId';
        return $this->requestGet($url, ['classId' => $classId, 'subClassId' => $subClassId], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function media(int $id)
    {
        $url = self::url . '/media/item/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }
}