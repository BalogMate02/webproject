<?php
session_start();
$_SESSION;
include("functions.php");
include("database.php");
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
    <link rel="stylesheet" href="style1.css">
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
            <h4>Hello <?php echo $userdata['KNev']; ?>!</h4> -->
            <!-- <li><a href="join.php" class="join-button">Regisztrálás</a></li> -->
        </ul>
    </nav>

    <header id="about">
        <div class="about-section">
            <div class="inner-container">
                <h1>Alkoholkultúrát a Magyaroknak egyesületről:</h1>
                <p class="text">
                    Az Alkoholkultúrát a Magyaroknak egyesület idén összefog első ízben az alkoholfajták tudatos megismerése, illetve azok tudatos fogyasztása érdekében. <br>
                    A konferencia célja bemutatni a helyi illetve külföldi alkoholfajtákat a készítésüktől kezdve a felhasználáson át egészen a tudatos fogyasztásukig. 
                    Az egyesületet két nonprofit szövetség hozott létre.A <b>Magyar Szeszipari Szövetség és Terméktanács</b> tagjai olyan vállalatok amelyek a magyar piac meghatározó alkoholtermelői és szakértői. A <b>Magyar Bartender Szövetség</b> tagjai olyan italkeverők akik elhivatottak annak érdekében, hogy felvirágoztassák a magyar bartending felvirágoztatása.
                </p>
                <h1 style="text-align:center">Csapatunk tagjai</h1>
                <div class="row">
                    <div class="column">
                        <div class="card">
                            <img src="frank-odzuck.png" alt="Elnök" style="width:100%">
                            <div class="container">
                                <h2>Frank Odzuck, Magyar Szeszipari Szövetség és Terméktanács</h2>
                                <p class="title">Elnök</p>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <img src="NagyAndras.jpeg" alt="Igazgató" style="width:100%">
                            <div class="container">
                                <h2>Nagy András, Magyar Szeszipari Szövetség és Terméktanács</h2>
                                <p class="title">Igazgató</p>
                            </div>
                        </div>
                    </div>

                     <div class="column">
                        <div class="card">
                            <img src="schoknorbert1.jpg" alt="Elnök" style="width:100%">
                            <div class="container">
                                <h2>Schök Norbert, Magyar Bartender Szövetség</h2>
                                <p class="title">Elnök</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>


</body>

<script src="konfn.js"></script>

</html>