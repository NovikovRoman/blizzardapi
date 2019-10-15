<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Recipe extends AbstractService implements ServiceInterface
{
    const url = '/wow/recipe';

    /**
     * @param string $recipeId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $recipeId)
    {
        $url = self::url . '/:recipeId';
        return $this->requestGet($url, ['recipeId' => $recipeId]);
    }
}