document.addEventListener("DOMContentLoaded", function () {
  // Fungsi untuk menghasilkan bilangan bulat acak antara min dan max
  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  // Fungsi untuk mengisi CAPTCHA dengan operasi penjumlahan acak
  function generateCaptcha() {
    const num1 = getRandomInt(1, 10); // Angka pertama
    const num2 = getRandomInt(1, 10); // Angka kedua
    const result = num1 + num2; // Hasil penjumlahan
    const captchaOperation = `${num1} + ${num2} = ?`;

    const operationElement = document.getElementById("captcha-input");
    const operationElement1 = document.getElementById("captcha-result");
    operationElement.placeholder = captchaOperation;
    operationElement1.value = result; // Simpan hasil sebagai data-*

    // Bersihkan input
    document.getElementById("captcha-input").value = "";
  }

  // Panggil generateCaptcha() saat halaman dimuat
  window.addEventListener("load", generateCaptcha);
});
