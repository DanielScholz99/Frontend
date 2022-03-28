<html>
<head>

    <style>
        input[type=submit], input[type=none]{
            background-color: #56baed;
            border: none;
            color: white;
            padding: 10px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
            box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin: 5px 20px 20px 20px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        #left {
            float: left;
            width: 15em;
            overflow: hidden;
        }

        #right {
            width: 15em;
            overflow: hidden;
        }

        p {
            background-color: white;
            border: none;
            color: Black;
            padding: 10px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin: 5px 20px 20px 20px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
    </style>


</head>
<body>
    <?php if (isset($_COOKIE["access_token"])){
        echo    '<div id="menu">
                    <form>
                        <p id="left" style="width: auto">Sie sind eingeloggt.</p>
                    </form>
                    <form onsubmit="logout()">
                        <input type="submit" id="right" value="Logout">
                    </form>
                </div>';
    } else {
        echo    '<div id="menu">
                    <form onsubmit="goToLogin()">
                        <input type="submit" id="left" value="Login">
                    </form>
                    <form onsubmit="goToRegister()">
                        <input type="submit" id="right" value="Register">
                    </form>
                </div>';
    }?>

    <div id="resultLogin" style="display:none;">

    </div>

    <div id="resultRegister" style="display: none">

    </div>
</body>
</html>

<script>
    function goToLogin(){

        window.open('login.php', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');

        /*document.getElementById('resultLogin').style.display = "block";
        document.getElementById('menu').style.display = "none";

        $.ajax({
            type: 'GET',
            url: 'login.php',
            success: function(response) {
                $('#resultLogin').html(response);
            }
        });*/
    }

    function goToRegister(){

        window.open('register.php', '_blank', 'location=yes,height=720,width=1040,scrollbars=yes,status=yes');



        /*document.getElementById('resultRegister').style.display = "block";
        document.getElementById('menu').style.display = "none";

        $.ajax({
            type: 'GET',
            url: 'register.php',
            success: function(response) {
                $('#resultRegister').html(response);
            }
        });*/
    }

    function logout(){
        document.cookie = "access_token=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
</script>
