<?php

/*
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://localhost/studienprojekt/public/api/login',
]);

$response = curl_exec($ch);

echo $response;
*/
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://localhost/studienprojekt/public/api/login");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

// convert response
$output = json_decode($output);

// handle error; error output

var_dump($output);

curl_close($ch);
*/
/*try {
    $url = "https://localhost/studienprojekt/public/api/login";

    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );

    $response = file_get_contents($url, false, stream_context_create($arrContextOptions));

    if ($response !== false){
        echo $response;
    }
}
catch (Exception $e){
    echo $e -> getMessage();
}*/

/*$postdata = http_build_query(
    array(
        'email' => 'test@test.de',
        'passwort' => '12345678'
    )
);
$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);
$context = stream_context_create($opts);
$result = file_get_contents('http://localhost/studienprojekt/public/api/login', false, $context);
echo $result;*/

/*
$url = 'http://localhost/studienprojekt/public/api/login';
$data = array('email' => 'test@test.de', 'passwort' => '12345678');

// use key 'http' even if you send the request to https://...
$options = array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo "hieor<br>";
var_dump($result);*/


$curl = curl_init();

$url = 'https://localhost/studpro/public/api/register';

$data = array('vorname' => 'eric','name' => 'range','email' => 'gronkh@web.de','strasse' => '','firma' => '','abteilung' => '','passwort' => '123456789','mob' => '','tel' => '','iban' => '','bic' => '','bank' => '','mandatsreferenz' => '','ustidnr' => '','secret' => '','nationalitaet' => '','rollenid' => '4000','adresszusatz1' => '','strasse1' => 'Lindenstraße','hausnummer1' => '22','plz1' => '54294','ort1' => 'Trier','adresszusatz2' => '','strasse2' => '','hausnummer2' => '','plz2' => '','ort2' => '','notfallkontakt' => '','land1' => 'Deutschland','land2' => '');

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POST,$url);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($curl);

if($e = curl_error($curl)){
    echo $e;
}else {
    $decoded = json_decode($response);
    print_r($decoded);
}


/*$curl = curl_init();

$url = 'https://localhost/StudienProjekt_Lokal/public/api/document';

$data = array('personenid' => '1','produkteid' => '201','datumvon' => '2021-11-02','datumbis' => '2021-12-02');

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POST,$url);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($curl);

if($e = curl_error($curl)){
    echo $e;
}else {
    $decoded = json_decode($response);
    print_r($decoded);
}
*/