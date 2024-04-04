
  function validate() {
    var szuletesiDatum = new Date(document.getElementById("szuletesi-datum").value);
    var korhatarDatum = new Date();
    korhatarDatum.setFullYear(korhatarDatum.getFullYear() - 18); // 18 éves korhatár

    if (szuletesiDatum > korhatarDatum) {
      alert("Csak 18 éven felüliek regisztrálhatnak!");
      return false;
    }

    return true;
  }