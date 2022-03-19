<?php
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
curl_close($curl);


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