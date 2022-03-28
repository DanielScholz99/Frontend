<?php
include "requestLocation.php";
if (isset($_COOKIE['access_token'])) {
$produkteid = $_GET["produktid"];
$datumvon = $_GET["datumvon"];
$datumbis = $_GET["datumbis"];
$kundenid = $_COOKIE["id"];
$abholung = $_GET["abholung"];


$curl = curl_init();

$access_token = 'Authorization: Bearer ' . $_COOKIE['access_token'];
$header = array($access_token);


$dokumentendaten = array('personenid' => $kundenid, 'produkteid' => $produkteid, 'datumvon' => $datumvon, 'datumbis' => $datumbis, 'abholung' => $abholung);
curl_setopt_array($curl, array(
    CURLOPT_URL => $request_url . 'api/document',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $dokumentendaten,
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_PROXY_SSL_VERIFYHOST => false,
));

$response = curl_exec($curl);

curl_close($curl);

?>



<script>
    function successwindow(name, startLeihe, endLeihe){
        var sl = startLeihe.getDate() + "." + startLeihe.getMonth() + "." + startLeihe.getFullYear();
        var el = endLeihe.getDate() + "." + endLeihe.getMonth() + "." + endLeihe.getFullYear();
        document.getElementById("successdiv").style.display = "block";
        document.getElementById("successmessage").innerHTML = "<h3 style='text-align: center'>Ihre Buchung war erfolgreich</h3> <br>Der " + name + " wurde vom " + sl + " bis zum " + el + " reserviert";
        setTimeout(redirectFunction, 2300);
    }

    function redirectFunction(){
        location.reload();
    }
</script>
    <?php
}
else{
    echo "Bitte melden Sie sich an!";
}