<?php
session_start();
$_SESSION;
include("functions.php");
include("database.php");
//$userdata = check_login($conn);
$userdata = null;
    if (isset($_SESSION['Email'])) {
        $userdata = check_login($conn);
    }
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial-scale=1.0" />
    <link rel="icon" type="png" href="wine (1).png">
    <title>AMK</title>
    <link rel="stylesheet" href="konf.css">
    <link rel="stylesheet" href="usual.css">
    <link rel="stylesheet" href="countdown.css">


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
            <?php
            if ($userdata){
                echo '<li><a href="feltoltes.php">Dolgozat feltöltése</a></li>';
                echo '<li><a href="logout.php" class="login-button">Kijelentkezés</a></li>';
                echo "<h4>Hello {$userdata['KNev']}</h4>";
            } else {
                echo '<li><a href="login.php" class="login-button">Bejelentkezés</a></li>';
                echo '<li><a href="join.php" class="join-button">Regisztrálás</a></li>';
            }
            ?>
            <!-- <li><a href="contact.php">Kapcsolat</a></li> -->
            <!-- <li><a href="feltoltes.php">Dolgozat feltöltése</a></li>
            <li><a href="logout.php" class="login-button">Kijelentkezés</a></li>
            <h4><?php //if ($userdata != null) {"print Hello $userdata[KNev] !";}?></h4>
            <li><a href="login.php" class="login-button">Bejelentkezés</a></li>
            <li><a href="join.php" class="join-button">Regisztrálás</a></li> -->
            <!--<li>
                <form class="search-form" method="get"> 
                  <input type="text" placeholder="Keresés...">
                  <button type="submit">Keresés</button>
                </form>
              </li> -->
        </ul>
    </nav>

    <header id="showcase">

        <div class="showcont">
            <h1>Alkoholkultúrát a Magyaroknak</h1>
            <p>Kárpátmedencei bor- és koktélkultúra konferencia</p>
            <p1>02. 23. 2024 - 02. 25. 2024&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Badacsonytomaj, Magyarország</p1>

            <div class="container">
                <!-- h2 id="headline" B&R will be in...: -->
                <div id="countdown">
                    <ul>
                        <li1><span id="days"></span>Days</li1>
                        <li1><span id="hours"></span>Hours</li1>
                        <li1><span id="minutes"></span>Minutes</li1>
                        <li1><span id="seconds"></span>Seconds</li1>
                    </ul>
                </div>
            </div>

            <a href="conference_about.php" class="button">Tudj meg többet!</a>

        </div>

    </header>

</body>

<script src="konfn.js"></script>
<p id="countdown"></p>
<script src="coundown.js"></script>

</html>