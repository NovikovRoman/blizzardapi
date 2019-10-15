<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Character extends AbstractService implements ServiceInterface
{
    const APPEARANCE = 'appearance';
    const ACHIEVEMENTS = 'achievements';
    const FEED = 'feed';
    const GUILD = 'guild';
    const HUNTER_PETS = 'hunterPets';
    const ITEMS = 'items';
    const MOUNTS = 'mounts';
    const PETS = 'pets';
    const PET_SLOTS = 'petSlots';
    const PROFESSIONS = 'professions';
    const PROGRESSION = 'progression';
    const PVP = 'pvp';
    const QUESTS = 'quests';
    const REPUTATION = 'reputation';
    const STATISTICS = 'statistics';
    const STATS = 'stats';
    const TALENTS = 'talents';
    const TITLES = 'titles';
    const AUDIT = 'audit';

    const url = '/wow/character';

    /**
     * @param string $realm
     * @param string $characterName
     * @param array $fields
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $realm, string $characterName, array $fields = [])
    {
        $url = self::url . '/:realm/:characterName';
        $params = [];
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        return $this->requestGet($url, ['realm' => $realm, 'characterName' => $characterName], $params);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function appearance(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::APPEARANCE]);
    }


    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function achievements(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::ACHIEVEMENTS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function feed(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::FEED]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function guild(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::GUILD]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function hunterPets(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::HUNTER_PETS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function items(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::ITEMS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function mounts(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::MOUNTS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function pets(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::PETS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function petSlots(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::PET_SLOTS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function professions(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::PROFESSIONS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function progression(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::PROGRESSION]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function pvp(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::PVP]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function quests(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::QUESTS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function reputation(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::REPUTATION]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function statistics(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::STATISTICS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function stats(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::STATS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function talents(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::TALENTS]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function titles(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::TITLES]);
    }

    /**
     * @param string $realm
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function audit(string $realm, string $characterName)
    {
        return $this->get($realm, $characterName, [self::AUDIT]);
    }
}