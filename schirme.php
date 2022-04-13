<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script src="https://unpkg.com/jquery@3.6.0/dist/jquery.min.js"></script>

    <link href="https://unpkg.com/bootstrap@4.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap@4.6/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/locale/bootstrap-table-de-DE.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <style>
        .verfuegbar {
            color: limegreen;
            font-size: 30px;
        }
        .belegt{
            color: #c90909;
            font-size: 30px;
        }
    </style>

</head>
<?php

include "requestLocation.php";

if (isset($_COOKIE['access_token'])) {

    $curl = curl_init();

    $url = $request_url . 'api/produktlinie';

    $access_token = 'Authorization: Bearer ' . $_COOKIE['access_token'];
    $header = array($access_token);

    curl_setopt($curl, CURLOPT_URL, $url);
//curl_setopt($curl,CURLOPT_POST,$url);
//curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($curl);

    if ($e = curl_error($curl)) {
        echo $e;
    } else {
        $decoded = json_decode($response);
    }
    curl_close($curl);

    $reserved = [];
    $gebuer = 0;
    $kaution = 0;
    foreach ($decoded as $item) {
        $array = json_decode(json_encode($item), true);
        if (is_array($array)) {
            foreach ($array as $tmp) {
                if ($tmp['datumvon']) {
                    $today = date('Y-m-d');
                    $begin = date('Y-m-d', strtotime($tmp['datumvon']));
                    $end = date('Y-m-d', strtotime($tmp['datumbis']));

                    if (($today >= $begin) && ($today <= $end)) {
                        array_push($reserved, $tmp['id']);
                    }

                }
            }
        }



    }
    $gebuer = json_decode(json_encode($decoded), true)['leihgebuehren'];
    $kaution = json_decode(json_encode($decoded), true)['kaution'];
?>

<div id="seitendiv">
    <div class="container" id="liste">
        <div class="card">
            <div class="card-body">





                <table class="table table-responsive table-striped table-hover d-table"
                       id="tableprodukte"
                       showColumnsToggleAll="true"
                       data-toggle="table"
                       data-search="true"
                       data-sort-stable="true"
                       data-mobile-responsive="true"
                       data-check-on-init="true"
                       data-toolbar="#toolbar"
                       data-footer-style="footerStyle"
                >
                    <b>Für jede Buchung fällt eine Gebühr von <?=$gebuer?>€ (inkl. MwSt), eine Kaution in Höhe von <?=$kaution?>€ sowie Versandkosten bei einer Lieferung an!</b>
                    <thead align="left">
                    <tr>
                        <th data-sortable="true">Produkt</th>
                        <th data-sortable="true">Größe</th>
                        <th>Farbe</th>
                        <th data-sortable="true">Kaufpreis</th>
                        <th data-sortable="true">Status</th>
                        <th>Kalender</th>
                        <th>Buchen</th>

                    </tr>
                    </thead>
                    <tbody>
                    <? $stack = []?>
                    <?foreach ($decoded as $array):?>
                        <?$decoded = json_decode(json_encode($array), true)?>
                        <?if (is_array($decoded)):?>
                            <?foreach ($decoded as $item):?>
                                <?if (!in_array($item['id'], $stack)): ?>
                                    <? array_push($stack, $item['id'])?>
                                    <? $name = $item['hersteller'] . " " . $item['produktlinie'] . " " . $item['bezeichnung']?>
                                        <tr class="<?=$item['hersteller']?>">
                                            <td><?= $name?></td>
                                            <td><?=$item['groesse']?></td>
                                            <td> <?=$item['farbe']?></td>
                                            <td><?=$item['vkpreis'] * $kaution?> €</td>
                                            <td style="text-align: center"><? if (in_array($item['id'], $reserved)): ?>
                                                    <i class="fas fa-times-circle belegt" title="belegt"></i>
                                                <? else:?>
                                                    <i class="fas fa-check-circle verfuegbar" title="verfügbar"></i>
                                                <?endif;?>
                                            </td>
                                            <td><button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' id='btnKalender' data-bs-target='#exampleModal' onclick="getCalendar(<?=$item["id"]?>, '<?=$name?> <?=$item['groesse']?> <?=$item['farbe']?>')"><i class="fas fa-calendar-alt"></i> Kalender anzeigen</button></td>

                                            <td>
                                                <button type='button' class='btn btn-outline-success' id='btnBuchen' onclick="bookProduct(<?=$item["id"]?>, '<?=$item["hersteller"]?>', '<?=$item["produktlinie"]?>', '<?=$item["bezeichnung"]?>', '<?=$item["groesse"]?>', '<?=$item["farbe"]?>', '<?=$item["vkpreis"] * $kaution?>', '<?=$gebuer?>' )"><i class="fas fa-parachute-box"></i> Produkt buchen <i class="fas fa-arrow-right"></i></button>
                                            </td>
                                        </tr>
                                <?endif;?>
                            <? endforeach;?>
                        <? endif;?>
                    <? endforeach;?>
                    </tbody>
                </table>





            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="kalender_div"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Schließen</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container" id="buchungsseite" style="display: none">
        <div class="card">
            <div class="card-body" id="buchungs_div">

            </div>
        </div>
    </div>


    <div class="container" id="successdiv" style="display: none">
        <div class="card">
            <div class="card-body" style="align-self: center" id="successmessage">
                <h3>Ihre Buchung war erfolgreich</h3>
            </div>
        </div>
    </div>
</div>

<script>
    function getCalendar(id, name){

        document.getElementById("modalTitle").innerHTML = name;

        $.ajax({
            url: "Kalender.php?id=" + id,
            type: 'GET',
            success: function (data){
                $('#kalender_div').html(data);
                start();
            }
        });
    }

    var kalenderListeDivModal = document.getElementById('exampleModal');

    function bookProduct (id, hersteller, linie, bezeichnung, groesse, farbe, kaution, gebuehr){

        document.getElementById('liste').style.display = "none";
        document.getElementById('buchungsseite').style.display = "block";
        kalenderListeDivModal.parentNode.removeChild(kalenderListeDivModal);

        $.ajax({
            url: "Buchung.php?id=" + id,
            type: 'GET',
            success: function (data){
                $('#buchungs_div').html(data);
                start(hersteller, linie, bezeichnung, groesse, farbe, kaution, gebuehr);
            }
        });
    }

</script>
<?php
}
else{
    echo "Bitte melden Sie sich an!";
}
