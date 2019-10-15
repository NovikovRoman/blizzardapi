```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use AuthManager\OAuthManager;
use BlizzardApi\Geo;
use BlizzardApi\Region;
use BlizzardApi\Locale;
use BlizzardApi\BlizzardClient;
use BlizzardApi\Service\WorldOfWarcraftCommunity\Achievement;
use BlizzardApi\Service\WorldOfWarcraftCommunity\User;
use GuzzleHttp\Exception\GuzzleException;

try {
    $geo = new Geo(Region::Europe, Locale::RU_RU);
} catch (Exception $e) {
    die($e->getMessage());
}

$clientID = 'our client id';
$secretKey = 'our secret key';

$client = BlizzardClient::create(
    $clientID,
    $secretKey,
    ['wow.profile', 'profile'],
    'https://our.domain',
    $geo
);

$am = new OAuthManager($client);
$state = 123456;
if (!empty($_GET['code'])) {
    try {
        $token = $am->getToken($_SERVER['REQUEST_URI'], $state);
        $client->setToken($token);
        

        $a = new Achievement($client);
        $u = new User($client);

        print_r($u->characters());
        print_r($a->getId(2144));

    } catch (GuzzleException $e) {
            exit($e->getMessage());

    } catch (Exception $e) {
        exit($e->getMessage());
    }

} else {
    $am->signin($state, true);
}
```