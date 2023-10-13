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
document.get;
const total = document.getElementById("SelProduk");
const cards = total.querySelectorAll(".produk");
let a = 0;
cards.forEach((card) => {
  const stok = parseInt(card.getAttribute("data-stok"));
  const button = document.getElementById("add" + a);
  if (stok === 0) {
    card.classList.add("stok-abis");
    button.style.backgroundColor = "rgba(255, 182, 45, 0.8)";
    button.style.border = "none";
    button.disabled = true;
  } else {
    card.style.opacity = "1";
    button.style.cursor = "allowed";
    button.disabled = false;
  }
  a++;
});

////
