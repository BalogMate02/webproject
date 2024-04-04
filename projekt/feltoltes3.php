<?php
session_start();

include("functions.php");
include("database.php");

$userdata = check_login($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $cim = mysqli_real_escape_string($conn, $_POST["cim"]);
    $tars = mysqli_real_escape_string($conn, $_POST["tars"]);
    $absztrakt = mysqli_real_escape_string($conn, $_POST["absztrakt"]);
    $kulcs = mysqli_real_escape_string($conn, $_POST["kulcs"]);
    $szekcio = mysqli_real_escape_string($conn, $_POST["szekcio"]);
    $szekcioid = "SELECT SZID FROM szekcio WHERE Nev = '$szekcio'";
    $resultszid = mysqli_query($conn, $szekcioid);

    if ($resultszid && mysqli_num_rows($resultszid) > 0) {
        $row = mysqli_fetch_assoc($resultszid);
        $szekcio_id = $row['SZID'];

        if (isset($_FILES['dolgozat'])) {
            $file = $_FILES['dolgozat'];

            // File properties
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];

            if ($file_tmp == "") {
                echo "Add meg a feltöltendő fájlt.";
            } else {
                // Extracting file extension
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_ext = strtolower($file_ext);

                $allowed = array('pdf');
                if (in_array($file_ext, $allowed)) {
                    if ($file_error == 0) {
                        if ($file_size <= 2097152) {

                            $Email = $userdata['Email'];
                            $sql = "SELECT VNev, KNev FROM eloado WHERE Email='$Email'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $VNev = $row["VNev"];
                                $KNev = $row["KNev"];

                                $vnev1 = substr($VNev, 0, 1);
                                $knev1 = substr($KNev, 0, 1);

                                $str = 'AMK_' . $vnev1 . "_" . $knev1 . "." . $file_ext;
                                $new_name = strtolower($str);

                                $file_destination = 'fajlok/'.$new_name;

                                if (!file_exists("fajlok/".$new_name)) {

                                    if (move_uploaded_file($file_tmp, $file_destination)) {
                                        $sql1 = "INSERT INTO dolgozat (Cim, Absztrakt, PDF, Kulcsszavak, Tarsszerzok, SZID) VALUES ('$cim', '$absztrakt', '$new_name', '$kulcs', '$tars', '$szekcio_id')";
                                        $result1 = mysqli_query($conn, $sql1);

                                        if ($result1) {
                                            echo "Sikeres fájlfeltöltés!";
                                            header("Location: konferencia.php");
                                            exit();
                                        } else {
                                            echo "Hiba az adatbázisba való beszúrásnál: " . mysqli_error($conn);
                                        }
                                    } else {
                                        echo "Hiba a fájl mozgatásakor.";
                                    }
                                } else {
                                    echo "A fájl már létezik!";
                                }
                            }
                        }
                    }
                }
            }
        }
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
            <!-- <li><a href="contact.php">Kapcsolat</a></li> -->
            <li><a href="feltoltes.php">Dolgozat feltöltése</a></li>
            <li><a href="logout.php" class="login-button">Kijelentkezés</a></li>
            <h4>Hello <?php echo $userdata['KNev']; ?>!</h4>
            <!-- <li><a href="join.php" class="join-button">Regisztrálás</a></li> -->
        </ul>
    </nav>
    <main class="container">
        <form action="feltoltes.php" method="post">
            <div class="wrapper">
                <div class="title">
                    Dolgozat feltöltése
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label>Dolgozat címe</label>
                        <input id="cim" name="cim" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>Társszerzők</label>
                        <input id="tars" name="tars" type="text" class="input" >
                    </div>
                    <div class="inputfield">
                        <label for = "szekcio">Szekció:</label>
                        <!-- <input id="tars" name="tars"  class="input" required> -->
                        <select name="szekcio" id="szekcio" required>
                            <?php
                            $sql = "SELECT Nev FROM szekcio";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['Nev'] . "'>" . $row['Nev'] . "</option>";
                                    //echo "<option value=\"{$szekcio['Nev']}\">{$szekcio['Nev']}</option>";
                                    //echo " Nev: " . $row["Nev"] . "<br>";
                                }
                            } else {
                                echo "Nincsenek rekordok az adatbázisban.";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="inputfield">
                        <label>Absztrakt:</label>
                        <textarea id="absztrakt" name="absztrakt" rows="3" class="input" required></textarea>
                    </div>
                    <div class="inputfield">
                        <label>Kulcsszavak:</label>
                        <input type="text" id="kulcs" name="kulcs" class="input" >
                    </div>
                    <div class="inputfield">
                        <label>Fájl feltöltése:</label>
                        <input type="file" name="dolgozat" id="dolgozat">
                    </div>
                    <div class="inputfield">
                        <input class="btn" type="submit" value="Feltöltés" name=submit>
                        <!-- <input class="btn" type="button" value="Mégse" onclick="window.location.href='konferencia.php'"> -->

                    </div>
  
                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>
</body>

<script src="konfn.js"></script>

</html>