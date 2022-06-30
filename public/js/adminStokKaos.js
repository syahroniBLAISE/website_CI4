$(document).ready(function () {
  var adminTokoKontainer = $(".adminStokKontainer").html();
  var base_url = $(".base_url").html();

  if (adminTokoKontainer) {
    console.log("data");
    ambilData(base_url);
    $(".halamanStok").attr("onClick", "tambahStokModal()");
    $(".formCSVStok").attr("action", "/uploadCSVStok");
    $(".modal-footerKaos").attr("action", "clearModalStok()");
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
      //                         <a type='button' class='btn btn-danger btn-sm col-4' onclick='deletStok(${d.id_stok})' >DELET</a>\n
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

function deletStok(id) {
  console.log("data yang diterima deletStok(" + id + ")");
  var base_url = $(".base_url").html();
  $.ajax({
    url: `${base_url}/hapusStok`,
    data: { id_stok: id },
    dataType: "json",
    type: "post",
    success: function (data) {
      if (data == true) {
        location.reload();
      }
    },
  });
}

function updateStokModal(id) {
  document.getElementById("staticBackdropLabel").innerHTML = "UPDATE STOK";
  var onclick = document.getElementById("tombol_modal");
  onclick.setAttribute("onClick", "updateStok(" + id + ")");
  var base_url = $(".base_url").html();
  console.log("data yang diterima updateStok(" + id + ")");
  $.ajax({
    url: `${base_url}/getStok`,
    data: { id: id },
    dataType: "json",
    method: "post",
    success: function (data) {
      console.log(data);
      $("#namaProduk").val(data.nama_produk);
      $("#warna").val(data.warna_kaos);
      $("#size").val(data.size_kaos);
      $("#jumlah").val(data.jumlah_stok);
      $("#kategori").val(data.kategori);
      $("#idProduk").val(data.id_stok);
    },
  });
}

function updateStok(id) {
  var id_produk = id;
  var nama_produk = $("#namaProduk").val();
  var warna_kaos = $("#warna").val();
  var size_kaos = $("#size").val();
  var jumlah_stok = $("#jumlah").val();
  var kategori = $("#kategori").val();
  var warna_produk = $("#idProduk").val();
  var base_url = $(".base_url").html();
  console.log("data yang diterima updateProduk(" + id_produk + ")");

  $.ajax({
    url: `${base_url}/updateStok`,
    data:
      "id_stok=" +
      id_produk +
      "&nama_produk=" +
      nama_produk +
      "&warna_kaos=" +
      warna_kaos +
      "&size_kaos=" +
      size_kaos +
      "&jumlah_stok=" +
      jumlah_stok +
      "&kategori=" +
      kategori,
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
      // console.log(Object.keys(data));

      if (data == true) {
        clearModalStok();
        $("#staticBackdrop").removeClass("show");
        location.reload();
      } else {
        responDataError(data);
      }
    },
  });
}

function clearModalStok() {
  $("#namaProduk").val("");
  $("#warna").val("");
  $("#size").val("");
  $("#jumlah").val("");
  $("#kategori").val("");
  $("#idProduk").val("");
}

function tambahStokModal() {
  document.getElementById("staticBackdropLabel").innerHTML = "TAMBAH STOK";
  var click = document.getElementById("tombol_modal");
  click.setAttribute("onClick", "tambahStok()");
  // var action = document.getElementById("formulir");
  // action.action = '<?=base_url();?>/tambahProduk';
  console.log("tambahProdukModal");
  clearModalStok();
}
function tambahStok() {
  // console.log('ajax TAMBAH PRODUK');
  var nama_produk = $("#namaProduk").val();
  var warna_kaos = $("#warna").val();
  var size_kaos = $("#size").val();
  var jumlah_stok = $("#jumlah").val();
  var kategori = $("#kategori").val();
  var base_url = $(".base_url").html();
  console.log("data yang diterima tamabahProduk()" + nama_produk);

  $.ajax({
    url: `${base_url}/tambahStok`,
    data:
      "nama_produk=" +
      nama_produk +
      "&warna_kaos=" +
      warna_kaos +
      "&size_kaos=" +
      size_kaos +
      "&jumlah_stok=" +
      jumlah_stok +
      "&kategori=" +
      kategori,
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
      // console.log(Object.keys(data));

      if (data == true) {
        clearModalStok();
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
