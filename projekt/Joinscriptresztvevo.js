function validate() {
    var VNev = document.getElementById("VNev").value;
    var KNev = document.getElementById("KNev").value;
    var Email = document.getElementById("Email").value;
    /*var jelszo = document.getElementById("jelszo").value;
    var jelszo2 = document.getElementById("jelszo2").value;
    var Orszag = document.getElementById("Orszag").value;*/
    var error_message = document.getElementById("error_message");
    /*var szuletesiDatum = new Date(document.getElementById("szuletesi-datum").value);
    var korhatarDatum = new Date();
    korhatarDatum.setFullYear(korhatarDatum.getFullYear() - 18); // 18 éves korhatár*/

    error_message.style.padding = "15px";

    var text;
    /*if (fname.length < 2) {
        text = "Irjon valodi vezeteknevet"
        error_message.innerHTML = text;
        return false;
    }
    if (lname.length < 2) {
        text = "irjon valodi keresztnevet"
        error_message.innerHTML = text;
        return false;
    }*/

    if (email.indexOf("@") == -1) {
        text = "Kérem írjon be egy valódi e-mail címet!"
        error_message.innerHTML = text;
        return false;
    }

    /*if (jelszo != jelszo2) {
        text = "Ugyanazt a jelszót használja!"
        error_message.innerHTML = text;
        return false;
    }*/

    /*if (tel.length < 10) {
        text = "Irjon be egy valódi telefonszámot!"
        error_message.innerHTML = text;
        return false;
    }*/

    /*if (szuletesiDatum > korhatarDatum) {
        alert("Csak 18 éven felüliek regisztrálhatnak!");
        return false;
      }*/

    alert("Gratulálunk, ön sikeresen regisztrált az Alkoholkultúrát a Magyaroknak Konferenciára!");
    location.href = "login.html";
    function goToHomePage(){
        location.href = "login.html";
        href='login.html';
    }
    return true;
}