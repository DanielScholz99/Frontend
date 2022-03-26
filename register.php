<html>

<head>
<style>* {box-sizing: border-box}

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
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
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn, .signupbtn {
        float: left;
        width: 50%;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
            width: 100%;
        }
    }
</style>
</head>

<body>
<form action="regHelper.php" style="border:1px solid #ccc" method="post">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <h2>Persönliche Daten</h2>
        <br>
        <br>
        <label for="name"><b>Name*</b></label>
        <input type="text" placeholder="Enter Name" name="name" required>

        <label for="vorname"><b>Vorname*</b></label>
        <input type="text" placeholder="Enter Vorname" name="vorname" required>

        <label for="email"><b>Email*</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password*</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password*</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

        <label for="mob"><b>Mobiltelefonnr.</b></label>
        <input type="text" placeholder="Enter Mobilnummer" name="mob">

        <label for="tel"><b>Telefonnr.</b></label>
        <input type="text" placeholder="Enter Telefonnummer" name="tel">

        <label for="bank"><b>Bankname</b></label>
        <input type="text" placeholder="Enter Bankname" name="bank">

        <label for="iban"><b>IBAN</b></label>
        <input type="text" placeholder="Enter IBAN" name="iban">

        <label for="bic"><b>BIC</b></label>
        <input type="text" placeholder="Enter BIC" name="bic">

        <label for="mandatsreferenz"><b>Mandatsreferenz</b></label>
        <input type="text" placeholder="Enter Mandatsreferenz" name="mandatsreferenz">

        <label for="ustidnr"><b>Ustidnr</b></label>
        <input type="text" placeholder="Enter Ustidnr" name="ustidnr">

        <label for="secret"><b>Secret</b></label>
        <input type="text" placeholder="Enter Secret" name="secret">

        <label for="nationalitaet"><b>Nationalität</b></label>
        <input type="text" placeholder="Enter Nationalitaet" name="nationalitaet">

        <label for="rollenid"><b>RollenID</b></label>
        <input type="text" placeholder="Enter RollenID" name="rollenid">

        <label for="notfallkontakt"><b>Notfallkontakt</b></label>
        <input type="text" placeholder="Enter Notfallkontakt" name="notfallkontakt">

        <h2>Firmendaten</h2>
        <br>
        <br>
        <label for="firma"><b>Firma</b></label>
        <input type="text" placeholder="Enter Firma" name="firma">

        <label for="strasse"><b>Strasse</b></label>
        <input type="text" placeholder="Enter Strasse" name="strasse">

        <label for="abteilung"><b>Abteilung</b></label>
        <input type="text" placeholder="Enter Abteilung" name="abteilung">

        <h2>Rechnungs- und Lieferadresse</h2>
        <br>
        <br>

        <label for="adresszusatz1"><b>Adresszusatz</b></label>
        <input type="text" placeholder="Enter Adresszusatz" name="adresszusatz1" >

        <label for="strasse1"><b>Strasse</b></label>
        <input type="text" placeholder="Enter Strasse" name="strasse1" >

        <label for="hausnummer1"><b>Hausnummer</b></label>
        <input type="text" placeholder="Enter Hausnummer" name="hausnummer1" >

        <label for="plz1"><b>PLZ</b></label>
        <input type="text" placeholder="Enter PLZ" name="plz1" >

        <label for="ort1"><b>Ort</b></label>
        <input type="text" placeholder="Enter Ort" name="ort1" >

        <label for="land1"><b>Land</b></label>
        <input type="text" placeholder="Enter Land" name="land1" >

        <h2>Abweichende Lieferadresse</h2>
        <br>
        <br>
        <label for="adresszusatz2"><b>Adresszusatz</b></label>
        <input type="text" placeholder="Enter Adresszusatz" name="adresszusatz2">

        <label for="strasse2"><b>Strasse</b></label>
        <input type="text" placeholder="Enter Strasse" name="strasse2">

        <label for="hausnummer2"><b>Hausnummer</b></label>
        <input type="text" placeholder="Enter Hausnummer" name="hausnummer2">

        <label for="plz2"><b>PLZ</b></label>
        <input type="text" placeholder="Enter PLZ" name="plz2">

        <label for="ort2"><b>Ort</b></label>
        <input type="text" placeholder="Enter Ort" name="ort2">

        <label for="land2"><b>Land</b></label>
        <input type="text" placeholder="Enter Land" name="land2">

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </div>
</form>
</body>
</html>

<script>
    function validateFormOnSubmit(theForm) {
        var reason = "";

        reason += validateEmail(theForm.email);

        if (reason != "") {
            alert("Some fields need correction:\n" + reason);
        } else {
            <?php echo header("refresh;url=login.php"); ?>
        }
        return false;
    }
</script>
