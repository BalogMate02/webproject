<?php
session_start();
$_SESSION;
include("functions.php");
include("database.php");
$userdata = check_login($conn);
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
            <!-- <li><a href="konferencia.html">Alkoholkultúrát a Magyaroknak</a></li> ????????? -->
            <li><a href="conference_about.php">A konferenciáról</a></li>
            
            <li><a href="aboutus.php">Rólunk</a></li>
            <li><a href="contact.php">Kapcsolat</a></li>
            
            <li><a href="login.php" class="login-button">Bejelentkezés</a></li>
            <li><a href="join.php" class="join-button">Regisztrálás</a></li>
        </ul>
    </nav>

    <main class="container">
        <form action="" id="myform" name="signup" onsubmit="return validate();">
            <div class="wrapper">
                <div class="title">
                    Vedd fel a kapcsolatot velünk!
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label>Vezetéknév</label>
                        <input id="fname" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>Keresztnév</label>
                        <input id="lname" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>E-mail cím</label>
                        <input id="email" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>írd ide az üzenetedet!</label>
                        <textarea id="message" type="text" class="input" required></textarea>
                    </div>
                    <!--<h3>Interested about frequently asked questions? Find them <a href="faq.html">here</a>!</h3> -->
                    <div class="inputfield">
                        <input type="submit" value="Küldés" class="btn">
                    </div>
                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>

</body>

<script src="contact_script.js"></script>
<script src="konfn.js"></script>

</html>