// (function ($) {
//   "use strict";

$(document).ready(function () {
  var adminTokoKontainer = $(".adminTokoKontainer").html();
  var base_url = $("#base_Url").html();

  if (adminTokoKontainer) {
    console.log("data");
    ambilData(base_url);
  }
});

function ambilData(base_url) {
  $.ajax({
    url: "http://localhost:8080/getProdukAll",
    dataType: "json",
    method: "get",
    success: function (data) {
      console.log(data);
      var base_url = "url";
      var i = 1;
      data.forEach(function (d) {
        console.log(d.nama_produk);
        $(".tabelBarang").append(
          `<tr>\n
                            <th scope='row'>${i}</th>\n
                            <td>${base_url}${d.nama_produk}</td>\n 
                            <td>${d.harga_produk}</td>\n
                            <td>${d.img_produk}</td>\n
                            <td><form action='http://localhost:8080/${d.id_produk}'  method='POST' class='d-inline'>\n
                                <?= csrf_field(); ?>\n
                                <input type='hidden' name='_method' value='DELETE'>\n
                                <a type='button' class='btn btn-danger btn-sm col-4' onclick='deletProduk(${d.id_produk})' >DELET</a>\n
                                </form>\n
                                <a type='button' class='btn btn-primary btn-sm col-3' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='updateProdukModal(${d.id_produk})' id='update'>EDIT</a>\n
                            </td>\n
                            </tr>`
        );
        i++;
      });
    },
  });
}
function deletProduk(id) {
  console.log("delet produk" + id);

  var id_produk = id;
  console.log("data yang diterima updateProduk(" + id_produk + ")");

  $.ajax({
    url: "http://localhost:8080/hapusProduk",
    data: "id_produk=" + id_produk,
    dataType: "json",
    type: "post",
    success: function (data) {
      // console.log(data);
      if (data == true) {
        $(".tabelBarang").html("");
        ambilData();
      }
    },
  });
}
function updateProdukModal(id) {
  document.getElementById("staticBackdropLabel").innerHTML = "UPDATE PRODUK";
  var onclick = document.getElementById("tombol_modal");
  onclick.setAttribute("onClick", "updateProduk(" + id + ")");

  $.ajax({
    url: "http://localhost:8080/getProduk",
    data: { id: id },
    dataType: "json",
    method: "post",
    success: function (data) {
      console.log(data);
      $("#idBarang").val(data.id_produk);
      $("#namaBarang").val(data.nama_produk);
      $("#hargaBarang").val(data.harga_produk);
      $("#kategoriBarang").val(data.kategori_produk);
      $("#imgBarang").val(data.img_produk);
      $("#ratingBarang").val(data.rating_produk);
    },
  });
}

function updateProduk(id) {
  var id_produk = id;
  var nama_produk = $("#namaBarang").val();
  var harga_produk = $("#hargaBarang").val();
  var kategori_produk = $("#kategoriBarang").val();
  var img_produk = $("#imgBarang").val();
  var rating_produk = $("#ratingBarang").val();

  console.log("data yang diterima updateProduk(" + id_produk + ")");

  $.ajax({
    url: "http://localhost:8080/updateProduk",
    data:
      "id_produk=" +
      id_produk +
      "&nama_produk=" +
      nama_produk +
      "&harga_produk=" +
      harga_produk +
      "&kategori_produk=" +
      kategori_produk +
      "&rating_produk=" +
      rating_produk +
      "&img_produk=" +
      img_produk,
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
      // console.log(Object.keys(data));

      if (data == true) {
        clearModal();
        $("#staticBackdrop").removeClass("show");
        location.reload();
      } else {
        responDataError(data);
      }
    },
  });
}

function clearModal() {
  $("#idBarang").val("");
  $("#namaBarang").val("");
  $("#hargaBarang").val("");
  $("#kategoriBarang").val("");
  $("#imgBarang").val("");
  $("#ratingBarang").val("");
}

function tambahProdukModal() {
  document.getElementById("staticBackdropLabel").innerHTML = "TAMBAH PRODUK";
  var click = document.getElementById("tombol_modal");
  click.setAttribute("onClick", "tambahProduk()");
  // var action = document.getElementById("formulir");
  // action.action = '<?=base_url();?>/tambahProduk';
  console.log("tambahProdukModal");
  clearModal();
}
function tambahProduk() {
  // console.log('ajax TAMBAH PRODUK');
  var nama_produk = $("#namaBarang").val();
  var harga_produk = $("#hargaBarang").val();
  var kategori_produk = $("#kategoriBarang").val();
  var img_produk = $("#imgBarang").val();
  var rating_produk = $("#ratingBarang").val();

  console.log("data yang diterima tamabahProduk()" + nama_produk);

  $.ajax({
    url: "http://localhost:8080/tambahProduk",
    data:
      "nama_produk=" +
      nama_produk +
      "&harga_produk=" +
      harga_produk +
      "&kategori_produk=" +
      kategori_produk +
      "&rating_produk=" +
      rating_produk +
      "&img_produk=" +
      img_produk,
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
      // console.log(Object.keys(data));

      if (data == true) {
        clearModal();
        $("#staticBackdrop").removeClass("show");
        location.reload();
      } else {
        responDataError(data);
      }
    },
  });
}

function responDataError(data) {
  Object.keys(data).forEach(function eachKey(key) {
    console.log(key);

    switch (key) {
      case "nama_produk":
        console.log("nama barang");
        $("#namaBarang").addClass("is-invalid");
        $("#namaBarangError").text(data.nama_produk);
        return;
      case "harga_produk":
        console.log("harga barang");
        $("#hargaBarang").addClass("is-invalid");
        $("#hargaBarangError").text(data.harga_produk);
        return;
      case "kategori_produk":
        console.log("kategori produk");
        $("#kategoriBarang").addClass("is-invalid");
        $("#kategoriBarangError").text(data.kategori_produk);
        return;
      case "rating_produk":
        console.log("rating barang");
        $("#ratingBarang").addClass("is-invalid");
        $("#ratingBarangError").text(data.rating_produk);
        return;
      default:
        console.log("semua data error validation telah di periksa");
    }
  });
}
// })(jQuery);
