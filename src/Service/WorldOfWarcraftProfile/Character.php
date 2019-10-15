<?php

namespace BlizzardApi\Service\WorldOfWarcraftProfile;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Character extends AbstractService implements ServiceInterface
{
    const url = '/profile/wow/character';

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function achievements(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/achievements';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function appearance(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/appearance';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function collections(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/collections';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function mountsCollection(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/collections/mounts';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function petsCollection(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/collections/pets';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function equipment(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/equipment';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function hunterPets(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/hunter-pets';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function media(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/character-media';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function mythicKeystoneProfile(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/mythic-keystone-profile';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @param string $seasonId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function mythicKeystoneSeason(string $realmSlug, string $characterName, string $seasonId)
    {
        $url = self::url . '/:realmSlug/:characterName/mythic-keystone-profile/season/:seasonId';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'seasonId' => $seasonId, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function get(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function status(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/status';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function pvp(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/pvp-summary';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @param string $pvpBracket
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function pvpBracket(string $realmSlug, string $characterName, string $pvpBracket)
    {
        $url = self::url . '/:realmSlug/:characterName/pvp-bracket/:pvpBracket';
        return $this->requestGet(
            $url,
            [
                'realmSlug' => $realmSlug,
                'characterName' => $characterName,
                'pvpBracket' => $pvpBracket,
                'namespace' => 'profile',
            ]
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function reputations(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/reputations';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function specializations(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/specializations';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function statistics(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/statistics';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $characterName
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function titles(string $realmSlug, string $characterName)
    {
        $url = self::url . '/:realmSlug/:characterName/titles';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'characterName' => $characterName, 'namespace' => 'profile']
        );
    }
}