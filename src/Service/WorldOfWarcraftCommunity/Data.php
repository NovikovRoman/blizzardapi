<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Data extends AbstractService implements ServiceInterface
{
    const url = '/wow/data';

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function battlegroups()
    {
        $url = self::url . '/battlegroups';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function characterRaces()
    {
        $url = self::url . '/character/races';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function characterClasses()
    {
        $url = self::url . '/character/classes';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function characterAchievements()
    {
        $url = self::url . '/character/achievements';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function guildRewards()
    {
        $url = self::url . '/guild/rewards';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function guildPerks()
    {
        $url = self::url . '/guild/perks';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function guildAchievements()
    {
        $url = self::url . '/guild/achievements';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function itemClasses()
    {
        $url = self::url . '/item/classes';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function talents()
    {
        $url = self::url . '/talents';
        return $this->requestGet($url);
    }

    /**
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function petTypes()
    {
        $url = self::url . '/pet/types';
        return $this->requestGet($url);
    }
}