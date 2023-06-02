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
if (element) {
  element.style.display = "block";
  setTimeout(function () {
    element.style.display = "none";
  }, 1000); // 1000ms = 1 second
}

////
// Jika Stok Kosong, opacity berkurang
const total = document.getElementById("SelProduk");
const cards = total.querySelectorAll(".produk");
cards.forEach((card) => {
  const stok = parseInt(card.getAttribute("data-stok"));
  if (stok === 0) {
    card.classList.add("stok-abis");
    // card.style.opacity = "0.5";
  } else {
    card.style.opacity = "1";
  }
});

////
