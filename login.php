<head>

<style>
/* Bordered form */
form {
border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
}

/* Set a style for all buttons */
button {
background-color: #04AA6D;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
width: auto;
padding: 10px 18px;
background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
text-align: center;
margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
width: 40%;
border-radius: 50%;
}

/* Add padding to containers */
.container {
padding: 16px;
}

/* The "Forgot password" text */
span.psw {
float: right;
padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
span.psw {
display: block;
float: none;
}
.cancelbtn {
width: 100%;
}
}
</style>
</head>
<?php
/*$curl = curl_init();

$url = 'https://localhost/mysite-project/public/api/register';

$data = array('vorname' => 'eric','name' => 'range','email' => 'gronkh@web.de','strasse' => '','firma' => '','abteilung' => '','passwort' => '123456789','mob' => '','tel' => '','iban' => '','bic' => '','bank' => '','mandatsreferenz' => '','ustidnr' => '','secret' => '','nationalitaet' => '','rollenid' => '4000','adresszusatz1' => '','strasse1' => 'Lindenstraße','hausnummer1' => '22','plz1' => '54294','ort1' => 'Trier','adresszusatz2' => '','strasse2' => '','hausnummer2' => '','plz2' => '','ort2' => '','notfallkontakt' => '','land1' => 'Deutschland','land2' => '');

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
    print_r($decoded);
}
curl_close($curl);


/*$curl = curl_init();

$url = 'https://localhost/StudienProjekt_Lokal/public/api/document';

$data = array('personenid' => '1','produkteid' => '201','datumvon' => '2021-11-02','datumbis' => '2021-12-02');

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
    print_r($decoded);
}
*/
?>
<body>
<form action="Kalender.php" method="post">

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>
</body>
