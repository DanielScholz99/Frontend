<html>
<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    html {
    background-color: white;
    }

    body {
    font-family: "Poppins", sans-serif;
    height: 100vh;
    }

    a {
    color: #92badd;
    display:inline-block;
    text-decoration: none;
    font-weight: 400;
    }

    h2 {
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    display:inline-block;
    margin: 40px 8px 10px 8px;
    color: #cccccc;
    }



    /* STRUCTURE */

    .wrapper {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    min-height: 100%;
    padding: 20px;
    }

    #left {
        float: left;
        width: 50%;
        overflow: hidden;
    }

    #right {
        overflow: hidden;
    }

    #formContent {
    -webkit-border-radius: 10px 10px 10px 10px;
    border-radius: 10px 10px 10px 10px;
    background: #fff;
    padding: 30px;
    width: 90%;
    max-width: 950px;
    position: relative;
    padding: 0px;
    -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
    box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
    text-align: center;
    }

    #formFooter {
    background-color: #f6f6f6;
    border-top: 1px solid #dce8f1;
    padding: 25px;
    text-align: center;
    -webkit-border-radius: 0 0 10px 10px;
    border-radius: 0 0 10px 10px;
    }



    /* TABS */

    h2.inactive {
    color: #cccccc;
    }

    h2.active {
    color: #0d0d0d;
    border-bottom: 2px solid #5fbae9;
    }



    /* FORM TYPOGRAPHY*/

    input[type=button], input[type=submit], input[type=reset]  {
    background-color: #56baed;
    border: none;
    color: white;
    padding: 15px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    font-size: 13px;
    -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
    margin: 5px 20px 40px 20px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    }

    input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
    background-color: #39ace7;
    }

    input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
    -moz-transform: scale(0.95);
    -webkit-transform: scale(0.95);
    -o-transform: scale(0.95);
    -ms-transform: scale(0.95);
    transform: scale(0.95);
    }

    input[type=text], input[type=password]{
    background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
    border: 2px solid #f6f6f6;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
    }

    input[type=text]:focus {
    background-color: #fff;
    border-bottom: 2px solid #5fbae9;
    }

    input[type=text]:placeholder {
    color: #cccccc;
    }



    /* ANIMATIONS */

    /* Simple CSS3 Fade-in-down Animation */
    .fadeInDown {
    -webkit-animation-name: fadeInDown;
    animation-name: fadeInDown;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    }

    @-webkit-keyframes fadeInDown {
    0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
    }
    100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
    }
    }

    @keyframes fadeInDown {
    0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
    }
    100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
    }
    }

    /* Simple CSS3 Fade-in Animation */
    @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

    .fadeIn {
    opacity:0;
    -webkit-animation:fadeIn ease-in 1;
    -moz-animation:fadeIn ease-in 1;
    animation:fadeIn ease-in 1;

    -webkit-animation-fill-mode:forwards;
    -moz-animation-fill-mode:forwards;
    animation-fill-mode:forwards;

    -webkit-animation-duration:1s;
    -moz-animation-duration:1s;
    animation-duration:1s;
    }

    .fadeIn.first {
    -webkit-animation-delay: 0.4s;
    -moz-animation-delay: 0.4s;
    animation-delay: 0.4s;
    }

    .fadeIn.second {
    -webkit-animation-delay: 0.6s;
    -moz-animation-delay: 0.6s;
    animation-delay: 0.6s;
    }

    .fadeIn.third {
    -webkit-animation-delay: 0.8s;
    -moz-animation-delay: 0.8s;
    animation-delay: 0.8s;
    }

    .fadeIn.fourth {
    -webkit-animation-delay: 1s;
    -moz-animation-delay: 1s;
    animation-delay: 1s;
    }

    /* Simple CSS3 Fade-in Animation */
    .underlineHover:after {
    display: block;
    left: 0;
    bottom: -10px;
    width: 0;
    height: 2px;
    background-color: #56baed;
    content: "";
    transition: width 0.2s;
    }

    .underlineHover:hover {
    color: #0d0d0d;
    }

    .underlineHover:hover:after{
    width: 100%;
    }



    /* OTHERS */

    *:focus {
    outline: none;
    }

    #icon {
    width:60%;
    padding: 0.8em;
    }
</style>
</head>
    <body>
    <div class="wrapper fadeInDown" id="wholeLogin">
        <div id="formContent">
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="./resources/moselglider_ICON.PNG" id="icon" alt="User Icon" />
            </div>
            <br>
            <!-- Login Form -->
            <form id="registerForm" onsubmit="getRegister($('#name').val(),$('#vorname').val(),$('#email').val(),$('#password').val(),$('#tel').val(),
            $('#mobil').val(),$('#nationalitaet').val(),$('#notfallkontakt').val(),$('#adresszusatz1').val(),$('#strasse1').val(),$('#hausnummer1').val(),
            $('#plz1').val(),$('#ort1').val(),$('#land1').val(),$('#adresszusatz2').val(),$('#strasse2').val(),$('#hausnummer2').val(),
            $('#plz2').val(),$('#ort2').val(),$('#land2').val(),$('#bank').val(),$('#iban').val(),$('#bic').val(),$('#mandatsref').val()
            ,$('#firma').val(),$('#abteilung').val(),$('#strasseF').val());return false">
                <div id="left">
                    <h3 class="fadeIn second">
                        Persönliche Daten
                    </h3>
                    <input type="text" id="name" class="fadeIn second" name="name" placeholder="Name*" required>
                    <input type="text" id="vorname" class="fadeIn second" name="vorname" placeholder="Vorname*" required>
                    <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email-Adresse*" required>
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password*" required>
                    <input type="password" id="confPassword" class="fadeIn third" name="confPassword" placeholder="Confirm Password*" required>
                    <input type="text" id="tel" class="fadeIn third" name="tel" placeholder="Telefonnr." >
                    <input type="text" id="mobil" class="fadeIn third" name="mobil" placeholder="Mobiltel.">
                    <input type="text" id="nationalitaet" class="fadeIn third" name="nationalitaet" placeholder="Nationalität">
                    <input type="text" id="notfallkontakt" class="fadeIn third" name="notfallkontakt" placeholder="Notfallkontakt">
                    <br>
                    <br>
                    <h3 class="fadeIn second">
                        Rechnungs- und Lieferadresse
                    </h3>
                    <input type="text" id="adresszusatz1" class="fadeIn third" name="adresszusatz1" placeholder="Adresszusatz">
                    <input type="text" id="strasse1" class="fadeIn third" name="strasse1" placeholder="Strasse*" required>
                    <input type="text" id="hausnummer1" class="fadeIn third" name="hausnummer1" placeholder="Hausnummer*" required>
                    <input type="text" id="plz1" class="fadeIn third" name="plz1" placeholder="PLZ*" required>
                    <input type="text" id="ort1" class="fadeIn third" name="ort1" placeholder="Ort*" required>
                    <input type="text" id="land1" class="fadeIn third" name="land1" placeholder="Land*" required>


                </div>
                <div id="right">
                    <h3 class="fadeIn second">
                        Abweichende Lieferadresse
                    </h3>
                    <input type="text" id="adresszusatz2" class="fadeIn third" name="adresszusatz2" placeholder="Adresszusatz">
                    <input type="text" id="strasse2" class="fadeIn third" name="strasse2" placeholder="Strasse">
                    <input type="text" id="hausnummer2" class="fadeIn third" name="hausnummer2" placeholder="Hausnummer">
                    <input type="text" id="plz2" class="fadeIn third" name="plz2" placeholder="PLZ">
                    <input type="text" id="ort2" class="fadeIn third" name="ort2" placeholder="Ort">
                    <input type="text" id="land2" class="fadeIn third" name="land2" placeholder="Land">
                    <br>
                    <br>
                    <h3 class="fadeIn second">
                        Bankdaten
                    </h3>
                    <input type="text" id="bank" class="fadeIn third" name="bank" placeholder="Bankname">
                    <input type="text" id="iban" class="fadeIn third" name="iban" placeholder="IBAN">
                    <input type="text" id="bic" class="fadeIn third" name="bic" placeholder="BIC">
                    <input type="text" id="mandatsref" class="fadeIn third" name="mandatsreferenz" placeholder="Mandatsreferenz">
                    <br>
                    <br>
                    <h3 class="fadeIn second">
                        Firmendaten
                    </h3>
                    <input type="text" id="firma" class="fadeIn third" name="firma" placeholder="Firmenname">
                    <input type="text" id="abteilung" class="fadeIn third" name="abteilung" placeholder="Abteilung">
                    <input type="text" id="strasseF" class="fadeIn third" name="strasseF" placeholder="Strasse">
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <input type="submit" id="login" class="fadeIn fourth" value="Registrieren">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="login.php">Schon registriert? Dann klick hier zum Login</a>
            </div>

        </div>
    </div>

    <div id="result" style="none">

    </div>
    </body>
<form id="registerForm" onsubmit="getRegister($('#name').val(),$('#vorname').val(),$('#email').val(),$('#password').val(),$('#tel').val(),
            $('#mobil').val(),$('#nationalitaet').val(),$('#notfallkontakt').val(),$('#adresszusatz1').val(),$('#strasse1').val(),$('#hausnummer1').val(),
            $('#plz1').val(),$('#ort1').val(),$('#land1').val(),$('#adresszusatz2').val(),$('#strasse2').val(),$('#hausnummer2').val(),
            $('#plz2').val(),$('#ort2').val(),$('#land2').val(),$('#bank').val(),$('#iban').val(),$('#bic').val(),$('#mandatsref').val()
            ,$('#firma').val(),$('#abteilung').val(),$('#strasseF').val());return false">
</html>
<script>
    function getRegister(name, vorname, email, password, tel, mob, nationalitaet, notfallkontakt, adresszusatz1, strasse1, hausnummer1, plz1, ort1, land1,
    adresszusatz2, strasse2, hausnummer2, plz2, ort2, land2, bank, iban, bic, mandatsref, firma, abteilung, strasseF){

        document.getElementById('wholeLogin').style.display = "none";
        document.getElementById('result').style.display = "block";

        $.ajax({
            type: 'POST',
            url: 'regHelper.php',
            data: { name: name, vorname:vorname, email: email, password: password, tel: tel, mob: mob, nationalitaet: nationalitaet,
                notfallkontakt: notfallkontakt, adresszusatz1: adresszusatz1, strasse1: strasse1, hausnummer1: hausnummer1, plz1: plz1, ort1: ort1,
                land1: land1, adresszusatz2: adresszusatz2, strasse2: strasse2, hausnummer2: hausnummer2, plz2: plz2, ort2: ort2,
                land2: land2, bank: bank, iban: iban, bic: bic, mandatsref: mandatsref, firma: firma, abteilung: abteilung, strasseF: strasseF},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }
</script>


