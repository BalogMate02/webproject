<?php
session_start();
include("functions.php");
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    /*$VNev = mysqli_real_escape_string($conn, $_POST["VNev"]);
    $KNev = mysqli_real_escape_string($conn, $_POST["KNev"]);*/
    $Email = mysqli_real_escape_string($conn, $_POST["Email"]);

$sql = "SELECT * FROM resztvevo WHERE Email='$Email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $userdata = mysqli_fetch_assoc($result);
            if ($userdata['Email'] == $Email) {
                $_SESSION['Email'] = $userdata['Email'];
                header("Location: konferenciar.php");
                die;
            } else {
                function_alert("Nem megfelelő név, e-mail cím vagy jelszó!");
            }
        } else {
            function_alert("Nem található felhasználó ilyen e-mail címmel!");
        }
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
        <form action="loginresztvevo.php" method="post">
            <div class="wrapper">
                <div class="title">
                    Bejelentkezés
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label>E-mail cím</label>
                        <input id="email" name=Email type="text" class="input" required>
                    </div>
                    <!--<div class="inputfield">
                        <label>Jelszó</label>
                        <input id="pass1" type="password" class="input" required>
                    </div>-->
                    <h3>Nem regisztrált még? Regisztráljon <a href="join.php">itt</a>!</h3>
                    <div class="inputfield">
                        <input type="submit" name=submit value="Bejelentkezés" class="btn">
                    </div>

                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>
</body>

<script src="konfn.js"></script>
<script src="login_script.js"></script>

</html>