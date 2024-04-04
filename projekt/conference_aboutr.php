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
    <link rel="stylesheet" href="conf_about.css">
    <link rel="stylesheet" href="team.css">
    <link rel="stzlesheet" href="sponzor.css">

</head>

<body>
    <nav>
        <div class="logo">
            <li><a href="konferenciar.php"><img src="wine (1).png" alt="Logo Image"></a></li>
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <li><a href="conference_aboutr.php">A konferenciáról</a></li>
            
            <li><a href="aboutusr.php">Rólunk</a></li>
            <!-- <li><a href="contact.php">Kapcsolat</a></li> -->
            <?php
            if ($userdata){
                //echo '<li><a href="feltoltes.php">Dolgozat feltöltése</a></li>';
                echo '<li><a href="logout.php" class="login-button">Kijelentkezés</a></li>';
                echo "<h4>Hello {$userdata['KNev']}</h4>";
            } else {
                echo '<li><a href="login.php" class="login-button">Bejelentkezés</a></li>';
                echo '<li><a href="join.php" class="join-button">Regisztrálás</a></li>';
            }
            ?>
            <!-- <li><a href="logout.php" class="login-button">Kijelentkezés</a></li>
            <h4>Hello <?php echo $userdata['KNev']; ?>!</h4> -->
            <!-- <li><a href="join.php" class="join-button">Regisztrálás</a></li> -->
        </ul>
    </nav>
   

    <ul class="timeline">

        <!-- Item 1 -->
        <li>
            <div class="direction-r">
                <div class="flag-wrapper">
                    <span class="flag">Alkoholkultúrát a Magyaroknak</span>
                    <!--<span class="time-wrapper"><span class="time">2013 - present</span></span> -->
                </div>
                <div class="desc">Az Alkoholkultúrát a Magyaroknak egy egyesület, amely idén elsőre megszervezi a Kárpátmedencei bor- és koktélkultúra konferenciát. <br>
                    Az esemény célja megismertetni a hazai borok világát, azok kultúráját, fogyasztási szokásukat, valamint a bartenderek világnapján a résztvevők megízlelhetik a hazai koktélnagymesterek alkotásait, miközben különböző alkohollal kapcsolatos előadásokon vesznek részt.<br>
                    Az esemény tájékoztató jellegű, célja a különböző alkoholok megismertetése, bemutatása, és nem a résztvevők leitatása. <br>
                </div>
            </div>
        </li>

        <!-- Item 2 -->
        <li>
            <div class="direction-l">
                <div class="flag-wrapper">
                    <span class="flag">Jelentkezzen résztvevőnek!</span>
                    <!-- <span class="time-wrapper"><span class="time">2011 - 2013</span></span> -->
                </div>
                <div class="desc">Szeretné fejleszteni az alkoholkultúráját? Érdekli a hazai termelők különleges italai? Vagy netán a koktélmestereink munkáira kíváncsiak? <br> Ha érdekli a konferencia, jelentkezzen résztvevőnek <a href="join.html">itt</a>! <br>
                    Csak a 18. életévüket betöltő személyek jelentkezését fogadjuk. Az esemény ideje alatt kiskorú nem tartózkodhat a helyszínen.

                </div>
            </div>
        </li>

        <!-- Item 2 -->
        <li>
            <div class="direction-r">
                <div class="flag-wrapper">
                    <span class="flag">Jelentkezzen előadónak!</span>
                    <!-- <span class="time-wrapper"><span class="time">2011 - 2013</span></span> -->
                </div>
                <div class="desc">Hozzá tudna szólni az alkoholkultúra témaköréhez? Jelentkezzen előadónak! Jelentkezését az <u>alkoholkultura@office.com</u>  e-mail címre várjuk.</div>
            </div>
        </li>

        <!-- Item 3 -->
        <li>
            <div class="direction-l">
                <div class="flag-wrapper">
                    <span class="flag">Részvételi díj</span>
                    <!--<span class="time-wrapper"><span class="time">2008 - 2011</span></span>-->
                </div>
                <div class="desc">A konferencián való részvétel részvételi  díjhoz kötött. <br>
                    A teljes konferenciára a részvételi díj 80€, ami tartalmaz 2 pohár bor, 3 koktél, és a különleges alkoholfajták kóstolójának az árát. Ezen felüli fogyasztás extra költségekkel járhat. </div>
            </div>
        </li>

        <!-- Item 4 -->
        <li>
            <div class="direction-r">
                <div class="flag-wrapper">
                    <span class="flag">Konferencia programterv</span>
                     <!--<span class="time-wrapper"><span class="time">2008 - 2011</span></span>-->
                </div>
                <div class="desc">A konferencia 3 napot, egy teljes hétvégét tart. Az első nap fő témája a bor, ahol erről az igazi magyar alkoholfajtát ismerhetjük meg közelebbről.<br>
                A második nap a bartenderek világnapja alkalmából a magyar bartenderkedés kerül bemutatásra, továbbá a hazai "rövidek" világába is betekintést nyerhetnek a résztvevők. <br>
                A harmadik nap a tudatos alkoholfogyasztásról fog szólni.</div>
            </div>
        </li>

        <!-- Item 5 -->
        <li>
            <div class="direction-l">
                <div class="flag-wrapper">
                    <span class="flag">Előadók</span>
                    <!-- <span class="time-wrapper"><span class="time">2011 - 2013</span></span> -->
                </div>
                <div class="desc">A konferencián a jelentkezőkön kívül olyan neves előadók is fellépnek akik a Kárpát-medencében a szakma legjobbjai közé tartoznak. Ismerjen meg párat közülük:</div>
            </div>
        </li>

        

    </ul>


    <section id="cd-team" class="cd-section">
        <div class="cd-container">
            <h2>Első nap:</h2>
            <ul>
                <li>
                    <a href="#0" data-type="member-1">
                        <figure>
                            <img src="varga_peter.jpg">
                        </figure>

                        <div class="cd-member-info">
                            Varga Péter <span>A Varga pincészet alapítója, és tulajdonosa, bortermelő, közgazdász és házigazda.</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-2">
                        <figure>
                            <img src="Herczeg_Agnes.webp" alt="Guest 2">
                        </figure>

                        <div class="cd-member-info">
                            Herczeg Ágnes <span>Borszakértő, a világ legismertebb borversenyeinek bírája, 2015-ben az év női vállalkozója díj nyertese.</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-3">
                        <figure>
                            <img src="heimann-zoltan.jpg" alt="Guest 3">
                        </figure>

                        <div class="cd-member-info">
                            Heimann Zoltán <span>Borász, a Heimann borászat tulajdonosa, 2023-ban a Borászok Borásza díj nyertese</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>
            </ul>
        </div>
        <!-- cd-container -->
    </section>
    <!-- cd-team -->


    <section id="cd-team" class="cd-section">
        <div class="cd-container">
            <h2>Második nap:</h2>
            <ul>
                <li>
                    <a href="#0" data-type="member-1">
                        <figure>
                            <img src="schoknorbert1.jpg">
                        </figure>

                        <div class="cd-member-info">
                            Schök Norbert <span>Bartender, a Magyar Bartender Szövetség elnöke</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-2">
                        <figure>
                            <img src="lajszandras.jpg" alt="Team member 1">
                        </figure>

                        <div class="cd-member-info">
                            Lajsz András <span>Szakács, cukrász, felszolgáló, bartender, 2000-ben világbajnokságon 3. helyezést ért el, 2004-ben Guinness rekorder lett.</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-3">
                        <figure>
                            <img src="Nemeth_Szabolcs.jpg" alt="Team member 1">
                        </figure>

                        <div class="cd-member-info">
                            Németh Szabolcs <span>Bartender, a 2022-es Opera Creative Champion cím nyertese.</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>
            </ul>
        </div>
        <!-- cd-container -->
    </section>
    <!-- cd-team -->
    
    <section id="cd-team" class="cd-section">
        <div class="cd-container">
            <h2>Harmadik nap:</h2>
            <ul>
                <li>
                    <a href="#0" data-type="member-1">
                        <figure>
                            <img src="Porkoláb-Minarik Annamária.jpg">
                        </figure>

                        <div class="cd-member-info">
                            Porkoláb-Minarik Annamária <span>Klinikai szakpszihológus, mindfulness oktató, a Másnap máshogy kampány egyik szakértője.</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-2">
                        <figure>
                            <img src="molnar-gusztav.jpeg" alt="Guest 2">
                        </figure>

                        <div class="cd-member-info">
                            Molnár Gusztáv <span>Színész, gyógyulófélben levő, alkoholproblémával küzködő személy. </span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-3">
                        <figure>
                            <img src="Zacher Gábor.jpg" alt="Guest 3">
                        </figure>

                        <div class="cd-member-info">
                            Dr. Zacher Gábor <span>Toxikológus, főorvos, a magyarországi alkoholizmus elleni küzdelemben szerepet játszó közéleti személyiség</span>
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>
            </ul>
        </div>
        <!-- cd-container -->
    </section>
    <!-- cd-team -->


    <!--<footer id="footer">
        <p>*Csak a 18. életévüket betöltő személyek jelentkezését fogadjuk. Az esemény ideje alatt kiskorú nem tartózkodhat a helyszínen.</p>
      </footer>-->
      

      <section id="cd-team" class="cd-section">
        <div class="cd-container">
            <h2>Aranyfokozatú támogatóink</h2>
            <ul>
                <li>
                    <a href="#0" data-type="member-1">
                        <figure>
                            <img src="magyarbartenderszovetseg.jpg">
                        </figure>

                        <div class="cd-member-info">
                            Magyar Bartender Szövetség
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-2">
                        <figure>
                            <img src="magyar-szeszipari-szovetseg-es-termektanacs.webp">
                        </figure>
                        <div class="cd-member-info">
                            Magyar Szeszipari Szövetség és Terméktanács
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-3">
                        <figure>
                            <img src="vargapinceszet.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Varga pincészet
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>
            </ul>
        </div>
        <!-- cd-container -->
    </section>

    <section id="cd-team" class="cd-section">
        <div class="cd-container">
            <h2>Ezüstfokozatú támogatóink</h2>
            <ul>
                <li>
                    <a href="#0" data-type="member-1">
                        <figure>
                            <img src="opera gin.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Opera Gin
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-2">
                        <figure>
                            <img src="Szentkiralyi-jologo.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Szentkirályi Magyarország
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>

                <li>
                    <a href="#0" data-type="member-3">
                        <figure>
                            <img src="unicum.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Zwack Unicum
                        </div>
                        <!-- cd-member-info -->
                    </a>
                </li>
            </ul>
        </div>
        <!-- cd-container -->
    </section>
      
    <!-- cd-team -->
     <!-- <section id="cd-sponsor" class="cd-section">
        <div class="cd-container">
            <h2>Támogatóink</h2>
            <div class="sponsor-category">
                <h3>Aranyfokozatú támogatóink</h3>
                <ul>
                    
                    <li>
                        <figure>
                            <img src="magyarbartenderszovetseg.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Magyar Bartender Szövetség
                        </div>
                    </li>
                    <li>
                        <figure>
                            <img src="magyar-szeszipari-szovetseg-es-termektanacs.webp">
                        </figure>
                        <div class="cd-member-info">
                            Magyar Szeszipari Szövetség és Terméktanács
                        </div>
                    </li>
                    <li>
                        <figure>
                            <img src="vargapinceszet.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Varga pincészet
                        </div>
               </li>
                </ul>
            </div>
            <div class="sponsor-category">
                <h3>Ezüstfokozatú támogatóink</h3>
                <ul>
                    <li>
                        <a href="tamogato2.html">
                        <figure>
                            <img src="opera gin.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Opera Gin
                        </div>
                    </a>
                    </li>
                    <li>
                        <a href="tamogato2.html">
                        <figure>
                            <img src="Szentkiralyi-jologo.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Szentkirályi Magyarország
                        </div>
                    </a>
                    </li>
                    <li>
                        <a href="tamogato2.html">
                        <figure>
                            <img src="unicum.jpg">
                        </figure>
                        <div class="cd-member-info">
                            Zwack Unicum
                        </div>
                    </a>
                    </li>
                </ul>
            </div>
            <div class="sponsor-category">
                <h3>Kategória 3</h3>
                <ul>
                    <li>Támogató 7</li>
                    <li>Támogató 8</li>
                    <li>Támogató 9</li>
                </ul>
            </div>
        </div>-->
        <!-- cd-container -->
    <!-- </section> -->
    <!-- sponsors -->
      
</body>

</html>


<script src="konfn.js"></script>

</html>