<?php

switch ($_GET['f']) {
    case 'get-rayen-urgency-data':
        getRayenUrgenciaData();
        break;
    default:
        echo 'No function found';
}

function getRayenUrgenciaData(): void
{
    $curl = curl_init('https://wsssi-chile.saludtarapaca.gob.cl/rayen-urgencia');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    $result = curl_exec($curl);
    curl_close($curl);

    echo $result;
}