<?php

namespace BlizzardApi\Service\WorldOfWarcraftProfile;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Guild extends AbstractService implements ServiceInterface
{
    const url = '/profile/wow/guild';

    /**
     * @param string $realmSlug
     * @param string $nameSlug
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $realmSlug, string $nameSlug)
    {
        $url = self::url . '/:realmSlug/:nameSlug';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'nameSlug' => $nameSlug, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $nameSlug
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function achievements(string $realmSlug, string $nameSlug)
    {
        $url = self::url . '/:realmSlug/:nameSlug/achievements';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'nameSlug' => $nameSlug, 'namespace' => 'profile']
        );
    }

    /**
     * @param string $realmSlug
     * @param string $nameSlug
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function roster(string $realmSlug, string $nameSlug)
    {
        $url = self::url . '/:realmSlug/:nameSlug/roster';
        return $this->requestGet(
            $url, ['realmSlug' => $realmSlug, 'nameSlug' => $nameSlug, 'namespace' => 'profile']
        );
    }
}