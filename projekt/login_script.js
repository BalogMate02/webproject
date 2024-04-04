function validate() {
    var email = document.getElementById("email").value;
    var pass1 = document.getElementById("pass1").value;
    var error_message = document.getElementById("error_message");

    error_message.style.padding = "15px";

    var text;
    if (email.indexOf("@") == -1) {
        text = "Kérem írjon be egy valódi e-mail címet!"
        error_message.innerHTML = text;
        return false;
    }

    /*if (pass1.length < 5) {
        text = "irja be jelszavat"
        error_message.innerHTML = text;
        return false;
    }*/

    alert("Ön bejelentkezett!");
    return true;
}