<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php




$curl = curl_init();

$url = 'https://localhost/studpro/public/api/produktlinie/6';

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
    //print_r($decoded);
}
curl_close($curl);

//var_dump($decoded);
//echo sizeof($decoded);

foreach ($decoded as $item) {
    //var_dump( $item);
    $array = json_decode(json_encode($item), true);
    echo $array['id'];
    echo "<br>";
}?>


<div class="row">
    <div class="col-1"></div>
    <div class="card col-10">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" data-sortable="true">Produkt</th>
                    <th scope="col" data-sortable="true">Ser.-Nr.</th>
                    <th scope="col" data-sortable="true">nächste Buchung</th>
                    <th scope="col" data-sortable="true">Kalender anzeigen</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($decoded as $array){
                    $item = json_decode(json_encode($array), true);
                    echo "<tr>
                            <td>" . $item['id'] . "</td>
                            <td>" . $item['produktlinienid'] . " " . $item['farbe'] . "</td>
                            <td>" . $item['groessenid'] . "</td>
                            <td>von bis</td>
                            <td>Kalender</td>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-1"></div>
</div>