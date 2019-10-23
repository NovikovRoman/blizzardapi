<?php

namespace BlizzardApi;

use AuthManager\OAuthToken;
use AuthManager\OAuthTokenInterface;
use BlizzardApi\Exceptions\ExceptionForbidden;
use BlizzardApi\Exceptions\ExceptionNotFound;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use AuthManager\OAuthClientInterface;

class BlizzardClient implements OAuthClientInterface
{
    private $clientID;
    private $clientSecret;
    /** @var Geo */
    private $geo;
    /** @var bool */
    private $enableLocale;
    /** @var Client */
    private $httpClient;
    private $scope;
    private $redirectUri;
    /** @var OAuthTokenInterface */
    private $token;

    /**
     * BlizzardClient constructor.
     * @param string $clientID
     * @param string $clientSecret
     * @param $scope
     * @param $redirectUri
     */
    public function __construct(string $clientID, string $clientSecret, array $scope = [], string $redirectUri = "")
    {
        $this->clientID = $clientID;
        $this->clientSecret = $clientSecret;
        $this->scope = $scope;
        $this->redirectUri = $redirectUri;
        $this->localeOn();
    }

    public static function create($clientID, $clientSecret, $scope, $redirectUri, Geo $geo)
    {
        $c = new BlizzardClient($clientID, $clientSecret, $scope, $redirectUri);
        $c->setGeo($geo);
        return $c;
    }

    public function setGeo(Geo $geo)
    {
        $this->geo = $geo;
        $this->httpClient = new Client([
            'base_uri' => $geo->getApiUrl(),
        ]);
    }

    public function getRegion()
    {
        if ($this->geo == null) {
            return '';
        }
        return $this->geo->getRegion();
    }

    public function getLocale()
    {
        if ($this->geo == null) {
            return '';
        }
        return $this->geo->getLocale();
    }

    public function localeOn()
    {
        $this->enableLocale = true;
        return $this;
    }

    public function localeOff()
    {
        $this->enableLocale = false;
        return $this;
    }

    /**
     * @param $url
     * @param array $vars
     * @param array $params
     * @return ResponseInterface
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function customRequestGet($url, $vars = [], $params = [])
    {
        if (empty($this->httpClient)) {
            throw new InvalidArgumentException('Empty http client.');
        }

        foreach ($vars as $code => $value) {
            $url = str_replace(':' . $code, urldecode($value), $url);
        }

        $url .= empty($params) ? '' : '?' . http_build_query($params);
        $request = new Request('GET', $url);
        $resp = $this->httpClient->send($request, [
            'headers' => [
                'Authorization' => 'Bearer ' . ($this->token ? $this->token->getAccessToken() : ''),
            ]
        ]);

        switch ($resp->getStatusCode()) {
            case 200:
                return $resp;
                break;

            case 404:
                throw new ExceptionNotFound('Not Found.', $request, $resp);
                break;

            case 403:
                throw new ExceptionForbidden('Forbidden.', $request, $resp);
                break;
        }

        throw new RequestException('Bad status code  ' . $resp->getStatusCode() . '.', $request, $resp);
    }

    /**
     * @param $url
     * @param array $vars
     * @param array $params
     * @return ResponseInterface
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws GuzzleException
     */
    public function requestGet($url, $vars = [], $params = [])
    {
        if ($this->enableLocale) {
            $params['locale'] = $this->getLocale();
        }
        return $this->customRequestGet($url, $vars, $params);
    }

    /**
     * Get client_credentials token
     * @return OAuthTokenInterface
     * @throws GuzzleException
     */
    public function getAccessToken()
    {
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientID,
                'client_secret' => $this->clientSecret,
            ],
        ];

        $request = new Request('POST', $this->geo->getOAuthUrl() . '/oauth/token');
        $response = $this->httpClient->send($request, $options);
        if (200 === $response->getStatusCode()) {
            $this->token = new OAuthToken(json_decode($response->getBody()->getContents(), true));
            return $this->token;
        }

        throw new BadResponseException('Invalid Response.', $request, $response);
    }

    public function getAuthorizeURL(): string
    {
        return $this->geo->getOAuthUrl() . '/oauth/authorize';
    }

    public function getTokenUrl(): string
    {
        return $this->geo->getOAuthUrl() . '/oauth/token';
    }

    public function getClientID(): string
    {
        return $this->clientID;
    }

    public function getSecretKey(): string
    {
        return $this->clientSecret;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function getScope(): array
    {
        return $this->scope;
    }

    public function setToken(OAuthTokenInterface $token)
    {
        $this->token = $token;
        return $this;
    }

    public function getToken(): OAuthTokenInterface
    {
        return $this->token;
    }
}