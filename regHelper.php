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
    'strasse' => $_POST["strasseF"],
    'firma' => $_POST["firma"],
    'abteilung' => $_POST["abteilung"],
    'passwort' => $_POST["password"],
    'mob' => $_POST["mob"],
    'tel' => $_POST["tel"],
    'iban' => $_POST["iban"],
    'bic' => $_POST["bic"],
    'bank' => $_POST["bank"],
    'mandatsreferenz' => $_POST["mandatsref"],
    'ustidnr' => '',
    'secret' => '',
    'nationalitaet' => $nationalitaet,
    'rollenid' => '1000',
    'adresszusatz1' => $_POST["adresszusatz1"],
    'strasse1' => $_POST["strasse1"],
    'hausnummer1' => $_POST["hausnummer1"],
    'plz1' => $_POST["plz1"],
    'ort1' => $_POST["ort1"],
    'adresszusatz2' => $_POST["adresszusatz2"],
    'strasse2' => $_POST["strasse2"],
    'hausnummer2' => $_POST["hausnummer2"],
    'plz2' => $_POST["plz2"],
    'ort2' => $_POST["ort2"],
    'notfallkontakt' => $_POST["notfallkontakt"],
    'land1' => $_POST["land1"],
    'land2' => $_POST["land2"]
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
        //header("refresh:3;url=login.php");
        echo "<script> alert('Registrierung erfolgreich') </script>";
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

    }
}
curl_close($curl);
?>
