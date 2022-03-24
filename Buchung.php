<?php
$id = $_GET["id"];
$curl = curl_init();
$url = 'https://localhost/studpro/public/api/datum/' . $id;

$data = array('email' => 'test@test.de','passwort' => '12345678');
$header = array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RAdGVzdC5kZSJ9.cw-CjwC7Xmh5RAKG-b9f8Jds8qok7QsH0Kr3w4ssv_I',
    'Cookie: ci_session=bv6gn8dq9526urrf5282j0shp8jktjos');

curl_setopt($curl,CURLOPT_URL,$url);
//curl_setopt($curl,CURLOPT_POST,$url);
//curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($curl);

if($e = curl_error($curl)){
    echo $e;
}else{
    $decoded = json_decode($response);
}
curl_close($curl);


$stack = array();

foreach ($decoded as $item) {
    $array = json_decode(json_encode($item), true);
    array_push($stack, $array);
}


/*$curl = curl_init();
$url = 'https://localhost/studpro/public/api/view/179';
/**
 *
 *
 *
 *              Hier UNBEDINGT noch den Kunden eintragen !!!!!
 *
 *
 *
 */
/*
$data = array('email' => 'test@test.de','passwort' => '12345678');
$header = array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RAdGVzdC5kZSJ9.cw-CjwC7Xmh5RAKG-b9f8Jds8qok7QsH0Kr3w4ssv_I',
    'Cookie: ci_session=bv6gn8dq9526urrf5282j0shp8jktjos');

curl_setopt($curl,CURLOPT_URL,$url);
//curl_setopt($curl,CURLOPT_POST,$url);
//curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($curl);

if($e = curl_error($curl)){
    echo $e;
}else{
    $datas = json_decode($response);
}
curl_close($curl);
$personendaten = json_decode(json_encode($datas), true);
echo($personendaten[0]['vorname']);

*/
?>

<style>
    .daten{
        font-size: 20px;
        font-weight: bold;
    }

    .invalid-feedback{
        font-weight: bold;
        font-size: 15px;
    }
</style>


    <h1>Buchung</h1>


    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="h5">Schirmdaten</div>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <label class="col-form-label" for="hersteller">Hersteller: </label>
                                </div>
                                <div class="col-7">
                                    <label class="col-form-label daten" id="hersteller"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <label class="col-form-label" for="produktlinie">Produktlinie: </label>
                                </div>
                                <div class="col-7">
                                    <label class="col-form-label daten" id="produktlinie">Produktlinie</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <label class="col-form-label" for="bezeichnung">Bezeichnung: </label>
                                </div>
                                <div class="col-7">
                                    <label class="col-form-label daten" id="bezeichnung">Bezeichnung</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <label class="col-form-label" for="groesse">Größe: </label>
                                </div>
                                <div class="col-7">
                                    <label class="col-form-label daten" id="groesse">Größe</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <label class="col-form-label" for="farbe">Farbe: </label>
                                </div>
                                <div class="col-7">
                                    <label class="col-form-label daten" id="farbe">Farbe</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <label class="col-form-label" for="preis">Preis: </label>
                                </div>
                                <div class="col-7">
                                    <label class="col-form-label daten" id="preis">Preis</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="h5">Verleihdaten</div>
                </div>
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-9">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Von:</span>
                                </div>
                                <input type="date" class="form-control" id="vonDatum" required>
                                <div class="input-group-append" >
                                    <span class="input-group-text">Bis:</span>
                                </div>
                                <input type="date" class="form-control" id="bisDatum" required>
                            </div>
                            <div id="errorFenster" class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-3">
                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' id='btnKalender' data-bs-target='#calendar' onclick="getCalendarOnBooking(<?=$id?>)"><i class="fas fa-calendar-alt"></i> Kalender anzeigen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 float-right">
        <button class="btn btn-primary" onclick="buchungAbbrechen()"><i class="fas fa-times-circle"></i> Buchung abbrechen</i></button>
        <button class="btn btn-success ml-3" onclick="checkDates(<?=$id?>)"><i class="fas fa-parachute-box"></i> Produkt verbindlich buchen <i class="fa fa-check" aria-hidden="true"></i></button>
    </div>


    <div class="modal fade" id="calendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kalenderBuchungTitel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="kalender_buchung"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Schließen</button>
                </div>
            </div>
        </div>
    </div>




<script>

    name = "";

    function start(hersteller, linie, bezeichnung, groesse, farbe, preis){
        document.getElementById("hersteller").innerHTML = hersteller;
        document.getElementById("produktlinie").innerHTML = linie;
        document.getElementById("bezeichnung").innerHTML = bezeichnung;
        document.getElementById("groesse").innerHTML = groesse;
        document.getElementById("farbe").innerHTML = farbe;
        document.getElementById("preis").innerHTML = preis + " €";
        name = hersteller + " " + linie + " " + bezeichnung + " " + groesse + " " + farbe;
    }


    function getCalendarOnBooking(id){


        document.getElementById("kalenderBuchungTitel").innerHTML = name;

        $.ajax({
            url: "Kalender.php?id=" + id,
            type: 'GET',
            success: function (data){
                $('#kalender_buchung').html(data);
                start();
            }
        });
    }

    function checkDates(id){
        var js_array = <?php echo json_encode($stack);?>;
        var startDatum = [];
        var endDatum   = [];
        for (let j = 0; j < js_array.length; j++) {
            var tmpStart = new Date(js_array[j]['datumvon'].substring(0, 4), js_array[j]['datumvon'].substring(5, 7) - 1, js_array[j]['datumvon'].substring(8, 10));
            startDatum.push(tmpStart);
            var tmpEnde = new Date((js_array[j]['datumbis'].substring(0, 4)), js_array[j]['datumbis'].substring(5, 7) - 1, js_array[j]['datumbis'].substring(8, 10));
            endDatum.push(tmpEnde);
        }
        var errorVar = false;

        tmpStart = document.getElementById("vonDatum").value;
        tmpEnde = document.getElementById("bisDatum").value;
        var heute = new Date();

        heute.setHours(0, 0, 0, 0);

        if (tmpStart === "" || tmpEnde === ""){
            document.getElementById("errorFenster").style.display = "block";
            document.getElementById("errorFenster").innerText = "Bitte tragen Sie ein Datum ein.";
            errorVar = true;
        }
        else {
            var startLeihe = new Date(tmpStart.substring(0, 4), tmpStart.substring(5, 7) - 1, tmpStart.substring(8, 10));
            var endLeihe = new Date(tmpEnde.substring(0, 4), tmpEnde.substring(5, 7) - 1, tmpEnde.substring(8, 10));
            if (startLeihe > endLeihe && !errorVar) {
                document.getElementById("errorFenster").style.display = "block";
                document.getElementById("errorFenster").innerText = "Das Startdatum der Leihe liegt nach dem Enddatum.";
                errorVar = true;
            } else if (startLeihe < heute && !errorVar) {
                document.getElementById("errorFenster").style.display = "block";
                document.getElementById("errorFenster").innerText = "Der Zeitraum beginnt in der Vergangenheit.";
                errorVar = true;
            }
            for (let i = 0; i < startDatum.length; i++) {
                if ((startLeihe >= startDatum[i] && startLeihe <= endDatum[i] || endLeihe >= startDatum[i] && endLeihe <= endDatum[i] || startLeihe <= startDatum[i] && endLeihe >= endDatum[i]) && !errorVar) {
                    document.getElementById("errorFenster").style.display = "block";
                    document.getElementById("errorFenster").innerText = "Der Schirm ist in der Zeit leider belegt.";
                    errorVar = true;
                }
            }
        }
        if (!errorVar){
            sendData(id, startLeihe, endLeihe);
        }
    }
    function sendData(id, startLeihe, endLeihe){
        datumVon = document.getElementById("vonDatum").value;
        datumBis = document.getElementById("bisDatum").value;
        $.ajax({
            url: "dokumentAnlegen.php?produktid=" + id + "&datumvon=" + datumVon + "&datumbis=" + datumBis,
            type: 'GET',
            success: function (data){
                $('#successmessage').html(data);
                successwindow(name, startLeihe, endLeihe);
                //document.getElementById("schirmname").innerHTML = name;
            }
        });
        document.getElementById("buchungsseite").style.display = "none";
        //document.getElementById("successdiv").style.display ="block";
    }

    function buchungAbbrechen(){
        document.getElementById("buchungsseite").style.display = "none";
        document.getElementById("liste").style.display = "block";
    }

</script>
