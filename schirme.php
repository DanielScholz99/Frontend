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




    <style>
        .verfügbar_div {
            background: limegreen;
            width: 30px;
            height: 30px;
            border-radius: 15px;
            text-align: center;
        }
        .belegt_div{
            background: darkred;
            width: 30px;
            height: 30px;
            border-radius: 5px;
            text-align: center;
        }
        .text{
            line-height: 30px;
            color: white;
            font-size: 20px;
        }
    </style>

</head>
<?php


$curl = curl_init();

$url = 'https://localhost/studpro/public/api/produktlinie';

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

$reserved = [];

foreach ($decoded as $item) {
    $array = json_decode(json_encode($item), true);
    if ($array['datumvon']){
        $today = date('Y-m-d');
        $begin = date('Y-m-d', strtotime($array['datumvon']));
        $end = date('Y-m-d', strtotime($array['datumbis']));

        if (($today >= $begin) && ($today <= $end)){
            array_push($reserved, $array['id']);
        }

    }
}
?>


<div class="row">
    <div class="col-1"></div>
    <div class="card col-10">
        <div class="card-body">





            <table class="table table-responsive table-striped table-hover d-table"
                   id="tableprodukte"
                   data-show-columns="true"
                   showColumnsToggleAll="true"
                   data-toggle="table"
                   data-search="true"
                   data-sort-stable="true"
                   data-mobile-responsive="true"
                   data-check-on-init="true"
                   data-toolbar="#toolbar"
                   data-footer-style="footerStyle"
            >

                <thead align="left">
                <tr>
                    <th data-field="name" data-sortable="true">Produkt</th>
                    <th data-sortable="true">Größe</th>
                    <th>Farbe</th>
                    <th data-sortable="true">Preis</th>
                    <th data-sortable="true">Status</th>
                    <th data-field="datensaetze">Kalender</th>
                    <th data-field="physisch">Buchen</th>

                </tr>
                </thead>
                <tbody>
                <? $stack = []?>
                <?foreach ($decoded as $array):?>
                    <?$item = json_decode(json_encode($array), true)?>
                    <?if (!in_array($item['id'], $stack)): ?>
                        <? array_push($stack, $item['id'])?>
                        <? $name = $item['hersteller'] . " " . $item['produktlinie'] . " " . $item['bezeichnung']?>
                            <tr>
                                <td><?= $name?></td>
                                <td><?=$item['groesse']?></td>
                                <td> <?=$item['farbe']?></td>
                                <td><?=$item['vkpreis']?> €</td>
                                <td><? if (in_array($item['id'], $reserved)): ?>
                                        <div class="belegt_div">
                                            <span class="text fa fa-times" title="belegt"></span>

                                        </div>

                                    <? else:?>
                                        <div class="verfügbar_div">
                                            <span class="text fa fa-check" title="verfügbar"></span>
                                        </div>
                                    <?endif;?>
                                </td>
                                <td><button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' id='btn' data-bs-target='#exampleModal' onclick="setcookie(<?=$item["id"]?>, '<?=$name?> <?=$item['groesse']?> <?=$item['farbe']?>')"><i class="fas fa-calendar-alt"></i> Kalender anzeigen</button></td>

                                <td>buchen</td>
                            </tr>
                    <?endif;?>
                <? endforeach;?>
                </tbody>
            </table>





        </div>
    </div>
    <div class="col-1"></div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="txtHint"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Schließen</button>
            </div>
        </div>
    </div>
</div>

<script>
    function setcookie(id, name){

        document.getElementById("modalTitle").innerHTML = name;

        $.ajax({
            url: "Kalender.php?id=" + id,
            type: 'GET',
            success: function (data){
                $('#txtHint').html(data);
                start();
            }
        });
    }


</script>
