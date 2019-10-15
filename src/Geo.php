<?php

namespace BlizzardApi;

use InvalidArgumentException;

class Geo
{
    const chinaApiUrl = 'https://gateway.battlenet.com.cn';
    const otherApiUrl = 'https://{region}.api.blizzard.com';

    const chinaOAuthUrl = 'https://www.battlenet.com.cn';
    const otherOAuthUrl = 'https://{region}.battle.net';

    private $region;
    private $locale;
    private $apiUrl;
    private $oauthUrl;
    private $locales = [
        Region::NorthAmerica => [
            Locale::EN_US,
            Locale::PT_BR,
            Locale::ES_MX,
        ],

        Region::Europe => [
            Locale::RU_RU,
            Locale::EN_GB,
            Locale::DE_DE,
            Locale::ES_ES,
            Locale::FR_FR,
            Locale::IT_IT,
            Locale::PT_PT,
        ],

        Region::Korea => [
            Locale::KO_KR,
        ],

        Region::Taiwan => [
            Locale::ZH_TW,
        ],

        Region::China => [
            Locale::ZH_CN,
        ],
    ];

    /**
     * @param string $region
     * @param string $locale
     * @throws InvalidArgumentException
     */
    public function __construct($region = Region::NorthAmerica, $locale = Locale::EN_US)
    {
        if (empty($this->locales[$region])) {
            throw new InvalidArgumentException("Invalid region.");
        }
        $this->region = $region;

        if (!$this->hasLocale($locale)) {
            throw new InvalidArgumentException("Locale not found.");
        }
        $this->locale = $locale;

        $this->apiUrl = $this->createApiUrl();
        $this->oauthUrl = $this->createOAuthUrl();
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function getLocales()
    {
        return $this->locales[$this->region];
    }

    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    public function getOAuthUrl()
    {
        return $this->oauthUrl;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getRegionId()
    {
        switch ($this->region) {
            case Region::NorthAmerica:
                return 1;
                break;
            case Region::Europe:
                return 2;
                break;
            case Region::Korea:
            case Region::Taiwan:
                return 3;
                break;
            case Region::China:
                return 5;
                break;
        }
        return 0;
    }

    private function createApiUrl()
    {
        if ($this->region == Region::China) {
            return self::chinaApiUrl;
        }

        return str_replace('{region}', $this->region, self::otherApiUrl);
    }

    private function createOAuthUrl()
    {
        if ($this->region == Region::China) {
            return self::chinaOAuthUrl;
        }

        return str_replace('{region}', $this->region, self::otherOAuthUrl);
    }

    private function hasLocale(string $locale)
    {
        return in_array($locale, $this->locales[$this->region]);
    }
}