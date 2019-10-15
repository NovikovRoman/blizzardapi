<?php

namespace BlizzardApi\Service\WorldOfWarcraftCommunity;

use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use BlizzardApi\Service\AbstractService;
use BlizzardApi\Service\ServiceInterface;
use GuzzleHttp\Exception\GuzzleException;

class Spell extends AbstractService implements ServiceInterface
{
    const url = '/wow/spell';

    /**
     * @param string $spellId
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     */
    public function getId(string $spellId)
    {
        $url = self::url . '/:spellId';
        return $this->requestGet($url, ['spellId' => $spellId]);
    }
}