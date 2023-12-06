document.getElementById("ktp").addEventListener("change", function () {
  var gambarTampil = document.getElementById("gambarTampil1");
  var inputFile = document.getElementById("ktp").files[0];

  if (inputFile) {
    var pembaca = new FileReader();

    pembaca.onload = function (e) {
      gambarTampil.src = e.target.result;
    };

    pembaca.readAsDataURL(inputFile);
  }
});
document.getElementById("foto-pro").addEventListener("change", function () {
  var gambarTampil = document.getElementById("gambarTampil2");
  var inputFile = document.getElementById("foto-pro").files[0];

  if (inputFile) {
    var pembaca = new FileReader();

    pembaca.onload = function (e) {
      gambarTampil.src = e.target.result;
    };

    pembaca.readAsDataURL(inputFile);
  }
});
