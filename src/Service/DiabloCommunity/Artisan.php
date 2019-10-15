<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Artisan extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/artisan';

    /**
     * @param string $artisanSlug
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $artisanSlug)
    {
        $url = self::url . '/:artisanSlug';
        return $this->requestGet($url, ['artisanSlug' => $artisanSlug]);
    }
}