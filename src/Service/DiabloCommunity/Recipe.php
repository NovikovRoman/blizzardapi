<?php

namespace BlizzardApi\Service\DiabloCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Recipe extends AbstractService implements ServiceInterface
{
    const url = '/d3/data/artisan';

    /**
     * @param string $artisanSlug
     * @param string $recipeSlug
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function get(string $artisanSlug, string $recipeSlug)
    {
        $url = self::url . '/:artisanSlug/recipe/:recipeSlug';
        return $this->requestGet($url, ['artisanSlug' => $artisanSlug, 'recipeSlug' => $recipeSlug]);
    }
}