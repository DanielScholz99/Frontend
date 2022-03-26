<?php
$curl = curl_init();

$url = 'https://localhost/mysite-project/public/api/register';

$data = array('vorname' => $_POST["vorname"],
    'name' => $_POST["name"],
    'email' => $_POST["email"],
    'strasse' => '',
    'firma' => '',
    'abteilung' => '',
    'passwort' => $_POST["psw"],
    'mob' => '',
    'tel' => '',
    'iban' => '',
    'bic' => '',
    'bank' => '',
    'mandatsreferenz' => '',
    'ustidnr' => '',
    'secret' => '',
    'nationalitaet' => '',
    'rollenid' => '4000',
    'adresszusatz1' => '',
    'strasse1' => 'Lindenstraße',
    'hausnummer1' => '22',
    'plz1' => '54294',
    'ort1' => 'Trier',
    'adresszusatz2' => '',
    'strasse2' => '',
    'hausnummer2' => '',
    'plz2' => '',
    'ort2' => '',
    'notfallkontakt' => '',
    'land1' => 'Deutschland',
    'land2' => ''
);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, $url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($curl);

if ($e = curl_error($curl)) {
    echo $e;

} else {
    $decoded = json_decode($response);
    $tmp = json_encode($decoded);
    if (str_contains($tmp,"User generated succesfully" )){
        echo "Register successful! Redirect now!";
        header("refresh:3;url=login.php");
    } else{
        header("refresh:3;url=register.php");
        print_r($tmp);
    }
}
curl_close($curl);
?>
