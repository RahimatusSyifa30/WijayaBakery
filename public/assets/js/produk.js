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
////

// Jika Stok Kosong, opacity berkurang
const total = document.getElementById("SelProduk");
const cards = total.querySelectorAll(".produk");

// const tambah = cards.getElementsByName("tambah");
cards.forEach((card) => {
  const stok = parseInt(card.getAttribute("data-stok"));
  if (stok === 0) {
    card.classList.add("stok-abis");
  } else {
    card.style.opacity = "1";
  }
});

////
