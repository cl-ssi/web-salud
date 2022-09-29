<?php

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

require_once __DIR__ . '/../vendor/autoload.php';

switch ($_GET['f']) {
    case 'get-rayen-urgency-data':
        getRayenUrgencyData();
        break;
    default:
        echo 'No function found';
}

function getRayenUrgencyData(): void
{
    $cache = new FilesystemAdapter();

    // The callable will only be executed on a cache miss.
    $value = $cache->get('rayen_urgency_cache', function (ItemInterface $item) {
        $item->expiresAfter(30);

        $curl = curl_init('https://wsssi-chile.saludtarapaca.gob.cl/rayen-urgencia');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    });

    echo $value;

}