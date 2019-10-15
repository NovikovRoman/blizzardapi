<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Profile extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/profile';

    /**
     * @param string $account
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function account(string $account)
    {
        $url = self::url . '/:account';
        return $this->requestGet($url, ['account' => $account]);
    }

    /**
     * @param string $account
     * @param string $heroId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function hero(string $account, string $heroId)
    {
        $url = self::url . '/:account/hero/:heroId';
        return $this->requestGet($url, ['account' => $account, 'heroId' => $heroId]);
    }

    /**
     * @param string $account
     * @param string $heroId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function heroItems(string $account, string $heroId)
    {
        $url = self::url . '/:account/hero/:heroId/items';
        return $this->requestGet($url, ['account' => $account, 'heroId' => $heroId]);
    }

    /**
     * @param string $account
     * @param string $heroId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function heroFollowerItems(string $account, string $heroId)
    {
        $url = self::url . '/:account/hero/:heroId/follower-items';
        return $this->requestGet($url, ['account' => $account, 'heroId' => $heroId]);
    }
}