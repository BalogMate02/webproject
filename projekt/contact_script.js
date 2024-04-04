function validate() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    var error_message = document.getElementById("error_message");

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

    if (message.length < 10) {
        text = "Fejtse ki bővebben az üzenetét!"
        error_message.innerHTML = text;
        return false;
    }


    alert("Ön elküldött egy üzenetet");
    return true;
}