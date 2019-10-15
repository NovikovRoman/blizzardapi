<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Guild extends AbstractService implements ServiceInterface
{
    const MEMBERS = 'members';
    const ACHIEVEMENTS = 'achievements';
    const NEWS = 'news';
    const CHALLENGE = 'challenge';

    const url = '/wow/guild';

    /**
     * @param string $realm
     * @param string $guildName
     * @param array $fields
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $realm, string $guildName, array $fields = [])
    {
        $url = self::url . '/:realm/:guildName';
        $params = [];
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        return $this->requestGet($url, ['realm' => $realm, 'guildName' => $guildName], $params);
    }

    /**
     * @param string $realm
     * @param string $guildName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function members(string $realm, string $guildName)
    {
        return $this->get($realm, $guildName, [self::MEMBERS]);
    }

    /**
     * @param string $realm
     * @param string $guildName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function achievements(string $realm, string $guildName)
    {
        return $this->get($realm, $guildName, [self::ACHIEVEMENTS]);
    }

    /**
     * @param string $realm
     * @param string $guildName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function news(string $realm, string $guildName)
    {
        return $this->get($realm, $guildName, [self::NEWS]);
    }

    /**
     * @param string $realm
     * @param string $guildName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function challenge(string $realm, string $guildName)
    {
        return $this->get($realm, $guildName, [self::CHALLENGE]);
    }
}