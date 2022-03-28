<?php
include "requestLocation.php";
$curl = curl_init();

$url = $request_url . 'api/register';

if ($_POST["land1"]=="Deutschland"){
    $nationalitaet = "DE";
} else {
    $nationalitaet = "";
}

$data = array(
    'vorname' => $_POST["vorname"],
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
    'nationalitaet' => $nationalitaet,
    'rollenid' => $_POST["rollenid"],
    'adresszusatz1' => '',
    'strasse1' => $_POST["strasse1"],
    'hausnummer1' => $_POST["hausnummer1"],
    'plz1' => $_POST["plz1"],
    'ort1' => $_POST["ort1"],
    'adresszusatz2' => '',
    'strasse2' => '',
    'hausnummer2' => '',
    'plz2' => '',
    'ort2' => '',
    'notfallkontakt' => '',
    'land1' => $_POST["land1"],
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
        echo "<h2>Fehlerhafte Registrierung: </h2>";
        if (str_contains($tmp,"The name field is required.")){
            echo "<p>Name wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The vorname field is required.")){
            echo "<p>Vorname wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The email field is required.")){
            echo "<p>Email wurde nicht gesetzt oder hat die falsche Form</p>";
        }
        if (str_contains($tmp,"The email field must contain a valid email address.")){
            echo "<p>Email hat die falsche Form</p>";
        }

        if (str_contains($tmp,"The psw field is required.")){
            echo "<p>Passwort wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The rollenid field is required.")) {
            echo "<p>RollenID wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The strasse1 field is required.")){
            echo "<p>Strasse wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The hausnummer1 field is required.")){
            echo "<p>Hausnummer wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The plz1 field is required.")){
            echo "<p>PLZ wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The ort1 field is required.")){
            echo "<p>Ort wurde nicht gesetzt</p>";
        }
        if (str_contains($tmp,"The land1 field is required.")){
            echo "<p>Land wurde nicht gesetzt</p>";
        }
        print_r($decoded);
        echo "<form action='register.php'><button type='submit'>Zurück zur Registrierung</button></form>";

    }
}
curl_close($curl);
?>
