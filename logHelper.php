<?php
$curl = curl_init();

$url = 'https://localhost/mysite-project/public/api/login';

$data = array(
    'email' => $_POST['email'],
    'passwort' => $_POST['psw']
);
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
    foreach ($decoded as $key => $value){
        if ($key === "access_token"){
            print_r($key);
            print_r(" => ");
            print_r($value);
            setcookie("access_token", $value);
        }
    }
    //print_r($response);

    /*
        To-Do:
            -Nachschauen ob cookie ordentlich gespeichert wird
            -PersonenID an Daniels Code weitergeben
            -hübsch machen
            -bei Register noch Rollen-Beschreibung hinzufügen
    */
}
curl_close($curl);