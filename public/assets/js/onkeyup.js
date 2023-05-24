///////
//Search Filter Produk
function myFunction() {
  // Declare variables
  var input, filter, row, li, a, i, txtValue;
  input = document.getElementById("cari");
  filter = input.value.toUpperCase();
  row = document.getElementById("SelProduk");
  li = row.getElementsByClassName("card");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("card-title")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
function cariProdukModal() {
  // Declare variables
  var input, filter, row, li, a, i, txtValue;
  input = document.getElementById("cari1");
  filter = input.value.toUpperCase();
  row = document.getElementById("modalProduk");
  li = row.getElementsByClassName("card");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("card-title")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
function pesanBelum() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("cariBelum");
  filter = input.value.toUpperCase();
  table = document.getElementById("pesanan_belum");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
///
function pesanSudah() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("cariSudah");
  filter = input.value.toUpperCase();
  table = document.getElementById("pesanan_sudah");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
