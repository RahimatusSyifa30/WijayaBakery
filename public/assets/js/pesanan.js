//////Pesanan detail belum
detail = ($id) => {
  const con = document.querySelector(".container");
  const dataTable = document.getElementById("detail" + $id);
  const closeButtons = document.querySelectorAll(".btn-close");
  // Toggle tampilan tabel
  if (dataTable.style.display == "none" && con.style.display == "none") {
    dataTable.style.display = "block";
    con.style.display = "block";
  } else {
    dataTable.style.display = "none";
    con.style.display = "none";
  }

  // Menambahkan event listener pada setiap tombol close
  for (var i = 0; i < closeButtons.length; i++) {
    closeButtons[i].addEventListener("click", function () {
      // Mendapatkan elemen card terdekat
      dataTable.style.display = "none"; // Menyembunyikan card
      con.style.display = "none"; // Menyembunyikan card
    });
  }
};
/////
detail_sel = ($id) => {
  const con = document.querySelector(".sel");
  const dataTable = document.getElementById("detail_sel" + $id);
  const closeButtons = document.querySelectorAll(".btn-close");
  // Toggle tampilan tabel
  if (dataTable.style.display == "none" && con.style.display == "none") {
    dataTable.style.display = "block";
    con.style.display = "block";
  } else {
    dataTable.style.display = "none";
    con.style.display = "none";
  }

  // Menambahkan event listener pada setiap tombol close
  for (var i = 0; i < closeButtons.length; i++) {
    closeButtons[i].addEventListener("click", function () {
      // Mendapatkan elemen card terdekat
      dataTable.style.display = "none"; // Menyembunyikan card
      con.style.display = "none"; // Menyembunyikan card
    });
  }
};
/////
