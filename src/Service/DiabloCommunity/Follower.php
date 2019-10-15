<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Follower extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/follower';

    /**
     * @param string $followerSlug
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $followerSlug)
    {
        $url = self::url . '/:followerSlug';
        return $this->requestGet($url, ['followerSlug' => $followerSlug]);
    }
}