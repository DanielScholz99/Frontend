
<?php
include "requestLocation.php";
$curl = curl_init();

$url = $request_url . 'api/login';

$data = array(
    'email' => $_POST['email'],
    'passwort' => $_POST['password']
);
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
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
        if ($value === "Invalid login credentials provided"){
            echo '<script> alert("Login fehlgeschlagen, bitte Daten überprüfen und neu versuchen!"); window.location.reload()</script>';

        } else {
            if ($key === "access_token"){
                setcookie("access_token", $value, time()+3600);
            }
            if ($key === "user"){
                foreach ($value as $key2 => $value2){
                    if ($key2 === "id"){
                        setcookie("id", $value2);
                    }
                }
            }
            echo '<script> alert("Login erfolgreich, leite weiter."); window.opener.location.reload(); window.close() ;</script>';
        }
    }



    /*
        To-Do:
            -Nachschauen ob cookie ordentlich gespeichert wird
            -PersonenID an Daniels Code weitergeben
            -hübsch machen
            -bei Register noch Rollen-Beschreibung hinzufügen
    */
}
curl_close($curl);
#echo $_COOKIE["id"];
#echo $_COOKIE["access_token"]
?>