<?php

namespace BlizzardApi\Service;

use BlizzardApi\BlizzardClient;

interface ServiceInterface
{
    public function __construct(BlizzardClient $blizzardClient);
}