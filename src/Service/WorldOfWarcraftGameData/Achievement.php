<?php

namespace BlizzardApi\Service\WorldOfWarcraftGameData;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Achievement extends AbstractService implements ServiceInterface
{
    const url = '/data/wow';

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function categories()
    {
        $url = self::url . '/achievement-category/index';
        return $this->requestGet($url, [], ['namespace' => 'static']);
    }

    /**
     * @param int $id
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function category(int $id)
    {
        $url = self::url . '/achievement-category/:id';
        return $this->requestGet($url, ['id' => $id, ['namespace' => 'static']]);
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
        $url = self::url . '/achievement/:id';
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
        $url = self::url . '/achievement/index';
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
        $url = self::url . '/media/achievement/:id';
        return $this->requestGet($url, ['id' => $id], ['namespace' => 'static']);
    }
}