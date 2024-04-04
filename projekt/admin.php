<?php
session_start();
include("functions.php");
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit1'])) {
    $ujAdat = mysqli_real_escape_string($conn, $_POST["ujAdat"]);

    $sqlLastValue = "SELECT SZID FROM szekcio ORDER BY SZID DESC LIMIT 1";
    $result = $conn->query($sqlLastValue);
    $lastValue = ($result->num_rows > 0) ? $result->fetch_assoc()['SZID'] : 0;
    $newLastValue = $lastValue + 1;

    $sqlCheck = "SELECT * FROM szekcio WHERE Nev = '$ujAdat'";
    $result = $conn->query($sqlCheck);

    if ($result->num_rows > 0) {
        echo "Az adat már létezik az adatbázisban.";
    } else {
    $sql = "INSERT INTO szekcio (Nev,SZID) VALUES ('$ujAdat','$newLastValue')";
    //$Ev="2024-01-01";
    //$sql = "INSERT INTO konfszekcio (SZID,Ev) VALUES ('$newLastValue','$Ev')";
    if ($conn->query($sql) === TRUE) {
        echo "Sikeresen hozzáadva az adatbázishoz.";
    } else {
        echo "Hiba: " . $sql . "<br>" . $conn->error;
    }
}
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit2'])) {
    $torlendoAdat = mysqli_real_escape_string($conn, $_POST["ujAdat2"]);
    //$idToDelete = "SELECT SZID FROM szekcio WHERE Nev='$ujAdat2'";
    
    $sql = "DELETE FROM szekcio WHERE Nev = '$torlendoAdat' /*SZID = '$idToDelete'*/";//id = '$idToDelete'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Sikeresen törölve az adatbázisból.";
    } else {
        echo "Hiba: " . $sql . "<br>" . $conn->error;
    }
}
//header("Location: logout.php");
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
            
            <li><a href="login.php" class="login-button">Bejelentkezés</a></li>
            <li><a href="join.php" class="join-button">Regisztrálás</a></li>
            <li><a href="logout.php" class="login-button">Kijelentkezés</a></li>
        </ul>
    </nav>

    <main class="container">
        <form action="admin.php" method="post">
            <div class="wrapper">
                <div class="title">
                    Admin felület
                </div>
                <div class="form">
                        <h3>Szúrjon be új szekciót</h3>
                    <h3><?php
                    $sql = "SELECT Nev FROM szekcio";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo " Nev: " . $row["Nev"] . "<br>";
                        }
                        } else {
                        echo "Nincsenek rekordok az adatbázisban.";
                        }
                    ?></h3>
                    <!-- </div> -->
                    <div class="inputfield">
                        <label for="ujAdat">Új szekció</label>
                        <input id="ujAdat" name="ujAdat" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <input type="submit" name=submit1 value="Beszúrás" class="btn">
                    </div>

                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>
    <main class="container">
        <form action="admin.php" method="post">
            <div class="wrapper">
                <!-- <div class="title">
                    Admin felület
                </div> -->
                <div class="form">
                    <!-- <div class="inputfield">
                        <label>E-mail cím</label>
                        <input id="email" name="Email" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label>Jelszó</label>
                        <input id="Jelszo" name="Jelszo" type="password" class="input" required>
                    </div>
                    <h3>Nem regisztrált még? Regisztráljon <a href="join.php">itt</a>!</h3> -->
                    <!-- <div class="inputfield"> -->
                    <h3>Töröljön szekciót</h3>
                    <h3><?php
                    $sql = "SELECT Nev FROM szekcio";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo " Nev: " . $row["Nev"] . "<br>";
                        }
                        } else {
                        echo "Nincsenek rekordok az adatbázisban.";
                        }
                    ?></h3>
                    <!-- </div> -->
                    <div class="inputfield">
                        <label for="ujAdat2">Törölni kívánt szekció</label>
                        <input id="ujAdat2" name="ujAdat2" type="text" class="input" required>
                    </div>
                    <div class="inputfield">
                        <input type="submit" name=submit2 value="Törlés" class="btn">
                    </div>

                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>
    <main class="container">
        <form action="admin.php" method="post">
            <div class="wrapper">
                <!-- <div class="title">
                    Admin felület
                </div> -->
                <div class="form">
                        <h3>Nézze meg kik vannak regisztrálva a választott szekcióhoz</h3>
                    <div class="inputfield">
                        <label for="ujadat3">Szekció:</label>
                        <select name="ujadat3" id="ujadat3">
                            <?php
                            $sql = "SELECT Nev FROM szekcio";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    //echo " Nev: " . $row["Nev"] . "<br>";
                                    echo "<option value='" . $row['Nev'] . "'>" . $row['Nev'] . "</option>";
                                    //echo "<option value=\"{$szekcio['Nev']}\">{$szekcio['Nev']}</option>";
                                    }
                            } else {
                                echo "Nincsenek rekordok az adatbázisban.";
                            }
                        ?> 
                        </select>   
                    </div>
                    <!-- </div> -->
                    <div class="inputfield">
                        <input type="submit" name="irdki" value="jelentkezők" class="btn">
                        <!-- <input id="ujAdat3" name="ujAdat" type="text" class="input" required> -->
                    </div>
                    <h3><?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['irdki'])) {
                        $kivalasztottSzekcio = mysqli_real_escape_string($conn, $_POST["ujadat3"]);
        
                        $sql = "SELECT eloado.VNev as eloado_neve, eloado.KNev as eloado_nev, dolgozat.Cim as Cim FROM eloado
                            INNER JOIN dolgozat ON eloado.DID = dolgozat.DID 
                            INNER JOIN szekcio ON dolgozat.SZID = szekcio.SzID
                            WHERE szekcio.Nev = '$kivalasztottSzekcio'";
            
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0){
        
                            echo "<h4>A kiválasztott szekcióba jelentkezettek:</h4>";
                            echo "<ul>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<li>{$row['eloado_neve']} {$row['eloado_nev']} {$row['Cim']}</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "Nincsenek jelentkezők ebben a szekcióban.";
                        }
                    }?></h3>
                    <!-- <div class="inputfield">
                        <input type="submit" name=submit1 value="Beszúrás" class="btn">
                    </div> -->

                </div>
            </div>
        </form>
        <div id="error_message"></div>
    </main>
</body>

<script src="konfn.js"></script>
<!-- <script src="login_script.js"></script> -->

</html>