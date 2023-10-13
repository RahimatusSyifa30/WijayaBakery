// Scroll Window
window.onscroll = function () {
  scrollFunctiontoTop();
};
//////
// Btn Scroll to top
let mybuttonn = document.getElementById("btntotop");
function scrollFunctiontoTop() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybuttonn.style.display = "block";
  } else {
    mybuttonn.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
iziinfo = (message) => {
  iziToast.info({
    title: message,
    position: "topRight", // Atur posisi iziToast sesuai keinginan Anda
  });
};
izisuccess = (message) => {
  document.addEventListener("DOMContentLoaded", function () {
    iziToast.success({
      title: message,
      position: "topRight", // Atur posisi iziToast sesuai keinginan Anda
    });
  });
};
iziwarning = (message) => {
  document.addEventListener("DOMContentLoaded", function () {
    iziToast.warning({
      title: message,
      position: "topRight", // Atur posisi iziToast sesuai keinginan Anda
    });
  });
};

//tooltip
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

//Profil Akun
profil = () => {
  const con = document.querySelector(".conta");
  const closeButtons = document.getElementById("btn-close");
  // Toggle tampilan tabel
  if (con.style.display == "none") {
    con.style.display = "block";
  } else {
    con.style.display = "none";
  }
  closeButtons.addEventListener("click", function () {
    // Mendapatkan elemen card terdekat
    con.style.display = "none"; // Menyembunyikan card
  });
};
