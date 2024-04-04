<?php
session_start();
include("functions.php");
include("database.php");


/*$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $minosites = $_POST['minosites'];

    if ($minosites == 'Előadó') {
        header("Location: joineloado.php");
        exit();
    } elseif ($minosites == 'Résztvevő') {
        header("Location: joinresztvevo.php");
        exit();
    }
    
    
    
        //header("Location: login.php");
    
    
    //mysqli_close($conn);
}*/
?> 


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial-scale=1.0" />
    <link rel="icon" type="png" href="wine (1).png">
    <title>AMK</title>
    <link rel="stylesheet" href="konf.css">
    <link rel="stylesheet" href="style_join.css">
</head>

<body>

    <nav>
        <div class="logo">
            <li><a href="konferencia.php"><img src="wine (1).png" alt="Logo Image"></a></li>
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <li><a href="conference_about.php">A konferenciáról</a></li>
            
            <li><a href="aboutus.php">Rólunk</a></li>
            <!-- <li><a href="contact.php">Kapcsolat</a></li> -->
            
            <li><a href="login.php" class="login-button">Bejelentkezés</a></li>
            <li><a href="join.php" class="join-button">Regisztrálás</a></li>
        </ul>
    </nav>

    <main class="container">
        <form action="join.php" method="post"> <!-- id="myform" name="signup" onsubmit="return validate();" --> 
            <div class="wrapper">
                <div class="title">
                    Kérjük jelezze milyen minősítésben szeretne részt venni a konferencián!
                </div>
                <div class="form">
                    <!--<div class="inputfield">
                        <label>Vezetéknév</label>
                        <input id="VNev" name="VNev" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>Keresztnév</label>
                        <input id="KNev" name="KNev" type="text" class="input" required>
                    </div>-->
                    <!--<div class="inputfield">
                        <label>Titulus</label>
                        <input id="tname" type="text" class="input" required>
                    </div>-->
                    
                    <!--<div class="inputfield">
                        <label for="minosites"></label>-->
                        <!--<input id="Intezmeny" type="text" class="input" required>-->
                        <!--<select id="minosites" name="minosites" required>
                            <option value="eloado">Előadó</option>
                            <option value="resztvevo">Résztvevő</option>
                            
                        </select>
                    </div>-->

                    <!--<div class="inputfield">
                        <label>Születési dátum</label>
                        <input id="szuletesi-datum" type="date" class="input" required>
                    </div>-->
                    <!--<div class="inputfield">
                        <label>Ország</label>
                        <input id="Orszag" name="Orszag" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>E-mail cím</label>
                        <input id="Email" name="Email" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>Jelszó</label>
                        <input id="password" name="jelszo" type="password" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>Jelszó megerősítése</label>
                        <input id="password2" name="jelszo2" type="password" class="input" required>
                    </div>-->
                    <!--<div class="inputfield">
                        <label>Telefonszám</label>
                        <input id="tel" type="text" class="input" required>
                    </div>-->
                    <h3>Regisztráljon előadónak <a href="joineloado.php">itt</a>!</h3>
                    <h3>Regisztráljon résztvevőnek <a href="joinresztvevo.php">itt</a>!</h3>
                    <!--<div class="inputfield">
                        <input type="submit" name="submit" value="Regisztrál" class="btn">
                    </div>-->
                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>

</body>

<script src="konfn.js"></script>
<script>

    function loadForm(role) {
    const formContainer = document.getElementById('registrationForm');
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        formContainer.innerHTML = this.responseText;
      }
    };

    if (role === 'Előadó') {
      xhttp.open('GET', 'joineloado.html', true);
    } else if (role === 'Résztvevő') {
      xhttp.open('GET', 'joinresztvevo.html', true);
    }
    
    xhttp.send();
  }
  function cancelRegistration() {
      location.href = "konferencia.html";
    }
    
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
      event.preventDefault();
      if (validateForm()) {
        alert("Sikeres regisztráció!");
        location.href = "konferencia.html";
      }
    });
  </script>
<!--<script src="join_script.js"></script> -->
<!-- <script src="validation.js"></script> -->

</html>