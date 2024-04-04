<?php
session_start();
include("functions.php");
include("database.php");


$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    

    $VNev = mysqli_real_escape_string($conn, $_POST["VNev"]);
    $KNev = mysqli_real_escape_string($conn, $_POST["KNev"]);
    $Email = mysqli_real_escape_string($conn, $_POST["Email"]);
    $Intezmeny = mysqli_real_escape_string($conn, $_POST["Intezmeny"]);
    /*$Orszag = mysqli_real_escape_string($conn, $_POST["Orszag"]);
    $jelszo = mysqli_real_escape_string($conn, $_POST["jelszo"]);
    $jelszo2 = mysqli_real_escape_string($conn, $_POST["jelszo2"]);*/
    $ev = "2024-01-01"/*"SELECT Ev FROM esemeny LIMIT 1"*/;
        $sql = "INSERT INTO `resztvevo` (`Email`, `KNev`, `VNev`, `Intezmeny`, `Ev`) 
                VALUES ('$Email', '$KNev', '$VNev', '$Intezmeny','$ev')";
function_alert("Sikeres regisztracio!");
        if (mysqli_query($conn, $sql)) {
            function_alert("Sikeres regisztracio!");
        } else {
            function_alert("Hiba az adatbázisba való beillesztéskor: " . mysqli_error($conn));
        }
        header("Location: login.php");
    
    
    mysqli_close($conn);
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
            <!--<li><a href="contact.php">Kapcsolat</a></li> -->
            
            <li><a href="login.php" class="login-button">Bejelentkezés</a></li>
            <li><a href="join.php" class="join-button">Regisztrálás</a></li>
        </ul>
    </nav>

    <main class="container">
        <form action="joinresztvevo.php" method="post"> <!-- id="myform" name="signup" onsubmit="return validate();" --> 
            <div class="wrapper">
                <div class="title">
                    Regisztrációs űrlap 
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label>Vezetéknév</label>
                        <input id="VNev" name="VNev" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>Keresztnév</label>
                        <input id="KNev" name="KNev" type="text" class="input" required>
                    </div>
                    <!--<div class="inputfield">
                        <label>Titulus</label>
                        <input id="tname" type="text" class="input" required>
                    </div>-->
                    <div class="inputfield">
                        <label for="intezmeny">Intézmény</label>
                        <!--<input id="Intezmeny" type="text" class="input" required>-->
                        <select id="Intezmeny" name="Intezmeny" required>
                            <?php
                            /*$sql = "SELECT Intezmeny FROM resztvevo";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // Dinamikusan generált legördülő lista elemei az adatbázisból kapott adatok alapján
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['Intezmeny'] . "'>" . $row['Intezmeny'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Nincs elérhető intezmeny</option>";
                            }*/
                            ?> 
                            <option value="szesz">Magyar Szeszipari Szövetség és Terméktanács</option>
                            <option value="bartender">Magyar Bartender Szövetség</option>
                            <option value="antialkesz">Magyar Anonim Alkoholista Klub</option>
                            <option value="semmi">Magánszemélyként érkezem</option>
                            <option value="Egyéb">Egyéb</option>
                        </select>
                    </div>
                    <!--<div class="inputfield">
                        <label>Születési dátum</label>
                        <input id="szuletesi-datum" type="date" class="input" required>
                    </div>-->
                    <!--<div class="inputfield">
                        <label>Ország</label>
                        <input id="Orszag" name="Orszag" type="text" class="input" required>
                    </div>-->
                    <div class="inputfield">
                        <label>E-mail cím</label>
                        <input id="Email" name="Email" type="text" class="input" required>
                    </div>
                    <!--<div class="inputfield">
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
                    <h3>Már regisztrált? Jelentkezzen be <a href="login.php">itt</a>!</h3>
                    <div class="inputfield">
                        <input type="submit" name="submit" value="Regisztrál" class="btn">
                    </div>
                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>

</body>

<script src="konfn.js"></script>
<script src="joinscriptresztvevo.js"></script>
<!-- <script src="validation.js"></script> -->

</html>