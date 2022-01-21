// (function ($) {
//   "use strict";

$(document).ready(function () {
  var adminTokoKontainer = $(".adminTokoKontainer").html();
  var base_url = $(".base_url").html();

  if (adminTokoKontainer) {
    console.log("data");
    ambilData(base_url);
  }
});

function ambilData(base_url) {
  $.ajax({
    url: `${base_url}/getKaosAll`,
    dataType: "json",
    method: "get",
    success: function (data) {
      console.log(data);
      var base_url = "url";
      var i = 1;
      data.forEach(function (d) {
        console.log(d.nama_kaos);
        $(".tabelBarang").append(
          `<tr>\n
                            <th scope='row'>${i}</th>\n
                            <td>${d.nama_kaos}</td>\n 
                            <td>${d.harga_kaos}</td>\n
                            <td>${d.gambar_kaos}</td>\n
                            <td><form action='${base_url}${d.id_kaos}'  method='POST' class='d-inline'>\n
                                <?= csrf_field(); ?>\n
                                <input type='hidden' name='_method' value='DELETE'>\n
                                <a type='button' class='btn btn-danger btn-sm col-4' onclick='deletProduk(${d.id_kaos})' >DELET</a>\n
                                </form>\n
                                <a type='button' class='btn btn-primary btn-sm col-3' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='updateProdukModal(${d.id_kaos})' id='update'>EDIT</a>\n
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

  //   var id_produk = id;
  console.log("data yang diterima updateProduk(" + id + ")");
  var base_url = $(".base_url").html();
  $.ajax({
    url: `${base_url}/hapusKaos`,
    data: { id_kaos: id },
    dataType: "json",
    type: "post",
    success: function (data) {
      // console.log(data);
      if (data == true) {
        // $(".tabelBarang").html("");
        // ambilData();
        location.reload();
      }
    },
  });
}
function updateProdukModal(id) {
  document.getElementById("staticBackdropLabel").innerHTML = "UPDATE PRODUK";
  var onclick = document.getElementById("tombol_modal");
  onclick.setAttribute("onClick", "updateProduk(" + id + ")");
  var base_url = $(".base_url").html();
  $.ajax({
    url: `${base_url}/getProduk`,
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
  var base_url = $(".base_url").html();
  console.log("data yang diterima updateProduk(" + id_produk + ")");

  $.ajax({
    url: `${base_url}/updateProduk`,
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
  var base_url = $(".base_url").html();
  console.log("data yang diterima tamabahProduk()" + nama_produk);

  $.ajax({
    url: `${base_url}/tambahProduk`,
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
