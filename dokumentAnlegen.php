<?php
$produkteid = $_GET["produktid"];
$datumvon = $_GET["datumvon"];
$datumbis = $_GET["datumbis"];
//$kundenid = $_COOKIE["kundenid"];
/**
 *
 *
 * Kundenid aus dem Coockie holen!!
 *
 *
 */

$curl = curl_init();
$kundenid = 179;


$header = array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RAdGVzdC5kZSJ9.cw-CjwC7Xmh5RAKG-b9f8Jds8qok7QsH0Kr3w4ssv_I',
    'Cookie: ci_session=bv6gn8dq9526urrf5282j0shp8jktjos');


/*$url = 'https://localhost/studpro/public/api/document';



$data = array('email' => 'test@test.de','passwort' => '12345678');


curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POST,$url);
curl_setopt($curl,CURLOPT_POSTFIELDS,$dokumentendaten);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);*/


$dokumentendaten = array('personenid' => $kundenid, 'produkteid' => $produkteid, 'datumvon' => $datumvon, 'datumbis' => $datumbis);
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://localhost/studpro/public/api/document',
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
