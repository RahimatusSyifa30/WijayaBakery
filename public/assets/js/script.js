//Alert Produk

// Scroll Window
window.onscroll = function () {
  stickyheader();
  scrollFunctiontoTop();
};
//////
// Function Header Sticky
let header = document.getElementById("header");
let sticky = header.offsetTop;
function stickyheader() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
///////
// Hamburger
const navbarNav = document.querySelector(".nav-item");
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};
const menu = document.querySelector("#hamburger-menu");
document.addEventListener("click", function (e) {
  if (!menu.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});
//////
// Btn Scroll to top
let mybutton = document.getElementById("btntotop");
function scrollFunctiontoTop() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

///// Filter Button Jenis Produk
const filterButtons = document.querySelectorAll(".filter-btn");
const produkItems = document.querySelectorAll(".produk");

filterButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const kategori = this.getAttribute("data-kategori");

    produkItems.forEach((item) => {
      if (
        item.getAttribute("data-kategori") == kategori ||
        kategori === "all"
      ) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  });
});

//////Pesanan detail

// Tambahkan event listener untuk tombol
detail = ($id) => {
  const dataTable = document.getElementById("data-table" + $id);
  // Toggle tampilan tabel
  if (dataTable.style.display == "none") {
    dataTable.style.display = "block";
  } else {
    dataTable.style.display = "none";
  }
};

var element = document.querySelector(".alert");
element.style.display = "block";
setTimeout(function () {
  element.style.display = "none";
}, 1000); // 1000ms = 1 second

/////Tambah Pesanan di edit pesanan
const button11 = document.querySelectorAll("#tambah-pesanan");
const table11 = document.querySelectorAll("#tabel");
