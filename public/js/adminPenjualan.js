$(document).ready(function () {
  var adminTokoKontainer = $(".adminCatatanKeuanganKontainer").html();
  var base_url = $(".base_url").html();

  if (adminTokoKontainer) {
    console.log("data");
    ambilData(base_url);
    $(".tambahPenjualanModal").attr("onClick", "tambahPenjualanModal()");
    $(".uploadCSVPenjualan").attr("action", "/uploadCSVPenjualan");
    $(".modal-footerKaos").attr("action", "clearModalPenjualan()");
    function ambilData(base_url) {
      // $.ajax({
      //   url: `${base_url}/getStokAll`,
      //   dataType: "json",
      //   method: "get",
      //   success: function (data) {
      //     console.log(data);
      //     var item = data.item;
      //     var i = 1;
      //     item.forEach(function (d) {
      //       console.log(d);
      //       $(".tabelBarang").append(
      //         `<tr>\n
      //                     <th scope='row'>${i}</th>\n
      //                     <td>${d.nama_produk}</td>\n
      //                     <td>${d.warna_kaos}</td>\n
      //                     <td>${d.size_kaos}</td>\n
      //                     <td>${d.jumlah_stok}</td>\n
      //                     <td>${d.kategori}</td>\n
      //                     <td><form action='${base_url}${d.id_stok}'  method='POST' class='d-inline'>\n
      //                         <?= csrf_field(); ?>\n
      //                         <input type='hidden' name='_method' value='DELETE'>\n
      //                         <a type='button' class='btn btn-danger btn-sm col-4' onclick='deletPenjualan(${d.id_stok})' >DELET</a>\n
      //                         </form>\n
      //                         <a type='button' class='btn btn-primary btn-sm col-4' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='updateStokModal(${d.id_stok})' id='update'>EDIT</a>\n
      //                     </td>\n
      //                     </tr>`
      //       );
      //       i++;
      //     });
      //   },
      // });
    }
  }
});

function deletPenjualan(id) {
  console.log("data yang diterima deletPenjulan(" + id + ")");
  var base_url = $(".base_url").html();
  $.ajax({
    url: `${base_url}/hapusPenjualan`,
    data: { id_transaksi: id },
    dataType: "json",
    type: "post",
    success: function (data) {
      if (data == true) {
        location.reload();
      }
    },
  });
}

function updatePenjualanModal(id) {
  document.getElementById("staticBackdropLabel").innerHTML = "UPDATE PENJUALAN";
  var onclick = document.getElementById("tombol_modal");
  onclick.setAttribute("onClick", "updatePenjualan(" + id + ")");
  var base_url = $(".base_url").html();
  console.log("data yang diterima updatePenjualanModal(" + id + ")");
  $.ajax({
    url: `${base_url}/getPenjualan`,
    data: { id: id },
    dataType: "json",
    method: "post",
    success: function (data) {
      console.log(data);
      $("#nama_pelanggan").val(data.nama_pelanggan);
      $("#uang_masuk").val(data.uang_masuk);
      $("#uang_keluar").val(data.uang_keluar);
      $("#time_transakasi").val(data.time_transakasi);
      $("#ket_transaksi").val(data.ket_transaksi);
      $("#id_transaksi").val(data.id_transaksi);
    },
  });
}

function updatePenjualan(id) {
  console.log("data yang diterima updatePenjualan(" + id + ")");

  var nama_pelanggan = $("#nama_pelanggan").val();
  var uang_masuk = $("#uang_masuk").val();
  var uang_keluar = $("#uang_keluar").val();
  var time_transakasi = $("#time_transakasi").val();
  var ket_transaksi = $("#ket_transaksi").val();
  var id_transaksi = id;
  var base_url = $(".base_url").html();
  console.log("data yang diterima updatePenjualan(" + id + ")");

  $.ajax({
    url: `${base_url}/updatePenjualan`,
    data:
      "nama_pelanggan=" +
      nama_pelanggan +
      "&uang_masuk=" +
      uang_masuk +
      "&uang_keluar=" +
      uang_keluar +
      "&time_transakasi=" +
      time_transakasi +
      "&ket_transaksi=" +
      ket_transaksi +
      "&id_transaksi=" +
      id_transaksi,
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
      // console.log(Object.keys(data));

      if (data == true) {
        clearModalPenjualan();
        $("#staticBackdrop").removeClass("show");
        location.reload();
      } else {
        responDataError(data);
      }
    },
  });
}

function clearModalPenjualan() {
  $("#nama_pelanggan").val("");
  $("#uang_masuk").val("");
  $("#uang_keluar").val("");
  $("#time_transakasi").val("");
  $("#ket_transaksi").val("");
  $("#id_transaksi").val("");
}

function tambahPenjualanModal() {
  document.getElementById("staticBackdropLabel").innerHTML = "TAMBAH PENJUALAN";
  var click = document.getElementById("tombol_modal");
  click.setAttribute("onClick", "tambahPenjualan()");
  // var action = document.getElementById("formulir");
  // action.action = '<?=base_url();?>/tambahProduk';
  console.log("tambahProdukModal");
  clearModalPenjualan();
}
function tambahPenjualan() {
  // console.log('ajax TAMBAH PRODUK');
  var nama_pelanggan = $("#nama_pelanggan").val();
  var uang_masuk = $("#uang_masuk").val();
  var uang_keluar = $("#uang_keluar").val();
  var time_transakasi = $("#time_transakasi").val();
  var ket_transaksi = $("#ket_transaksi").val();
  var base_url = $(".base_url").html();
  console.log("data yang diterima tamabahProduk()" + nama_pelanggan);

  $.ajax({
    url: `${base_url}/tambahPenjualan`,
    data:
      "nama_pelanggan=" +
      nama_pelanggan +
      "&uang_masuk=" +
      uang_masuk +
      "&uang_keluar=" +
      uang_keluar +
      "&time_transakasi=" +
      time_transakasi +
      "&ket_transaksi=" +
      ket_transaksi,
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
      // console.log(Object.keys(data));

      if (data == true) {
        clearModalPenjualan();
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
