$(document).ready(function () {
  var adminTokoKontainer = $(".adminHalamanKontainer").html();
  var base_url = $(".base_url").html();

  if (adminTokoKontainer) {
    console.log("data");
    ambilData(base_url);
    $(".halamanHalaman").attr("onClick", "tambahHalamanModal()");
    $(".formCSVHalaman").attr("action", "/uploadCSVHalaman");
    $(".modal-footerHalaman").attr("action", "clearModalHalaman()");
    function ambilData(base_url) {
      $.ajax({
        url: `${base_url}/getHalamanAll`,
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
                            <td>${d.judul_halaman}</td>\n 
                            <td>${d.url_halaman}</td>\n
                            <td>${d.content_halaman}</td>\n
                            <td><form action='${base_url}${d.id_halaman}'  method='POST' class='d-inline'>\n
                                <?= csrf_field(); ?>\n
                                <input type='hidden' name='_method' value='DELETE'>\n
                                <a type='button' class='btn btn-danger btn-sm col-4' onclick='deletProduk(${d.id_halaman})' >DELET</a>\n
                                </form>\n
                                <a type='button' class='btn btn-primary btn-sm col-4' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='updateProdukModal(${d.id_halaman})' id='update'>EDIT</a>\n
                            </td>\n
                            </tr>`
            );

            i++;
          });
        },
      });
    }
  }
});
function deletProduk(id) {
  console.log("delet produk" + id);

  //   var id_produk = id;
  console.log("data yang diterima updateProduk(" + id + ")");
  var base_url = $(".base_url").html();
  $.ajax({
    url: `${base_url}/hapusHalaman`,
    data: { id_halaman: id },
    dataType: "json",
    type: "post",
    success: function (data) {
      // console.log(data);
      console.log(data);
      if (data == true) {
        // $(".tabelBarang").html("");
        // ambilData();
        location.reload();
      }
    },
  });
}
function updateProdukModal(id) {
  document.getElementById("staticBackdropLabel").innerHTML = "UPDATE HALAMAN";
  var onclick = document.getElementById("tombol_modal");
  onclick.setAttribute("onClick", "updateHalaman(" + id + ")");
  var base_url = $(".base_url").html();
  $.ajax({
    url: `${base_url}/getHalaman`,
    data: { id: id },
    dataType: "json",
    method: "post",
    success: function (data) {
      console.log(data);
      $("#titleHalaman").val(data.judul_halaman);
      $("#linkHalaman").val(data.url_halaman);
      $("#keteranganHalaman").val(data.content_halaman);
    },
  });
}

function updateHalaman(id) {
  var id_halaman = id;
  var titleHalaman = $("#titleHalaman").val();
  var linkHalaman = $("#linkHalaman").val();
  var keteranganHalaman = $("#keteranganHalaman").val();
  var base_url = $(".base_url").html();
  console.log("data yang diterima updateProduk(" + id_halaman + ")");

  $.ajax({
    url: `${base_url}/updateHalaman`,
    data:
      "id_halaman=" +
      id_halaman +
      "&judul_halaman=" +
      titleHalaman +
      "&url_halaman=" +
      linkHalaman +
      "&content_halaman=" +
      keteranganHalaman,
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
      // console.log(Object.keys(data));

      if (data == true) {
        clearModalKaos();
        $("#staticBackdrop").removeClass("show");
        location.reload();
      } else {
        responDataError(data);
      }
    },
  });
}

function clearModal() {
  $("#titleHalaman").val("");
  $("#linkHalaman").val("");
  $("#keteranganHalaman").val("");
}

function tambahHalamanModal() {
  document.getElementById("staticBackdropLabel").innerHTML = "TAMBAH HALAMAN";
  var click = document.getElementById("tombol_modal");
  click.setAttribute("onClick", "tambahHalaman()");
  // var action = document.getElementById("formulir");
  // action.action = '<?=base_url();?>/tambahProduk';
  console.log("tambahHalamanModal");
  clearModal();
}

function tambahHalaman() {
  console.log("ajax TAMBAH HALAMAN");
  var titleHalaman = $("#titleHalaman").val();
  var linkHalaman = $("#linkHalaman").val();
  var keteranganHalaman = $("#keteranganHalaman").val();

  var base_url = $(".base_url").html();
  console.log("data yang diterima tambah  halaman" + titleHalaman);

  $.ajax({
    url: `${base_url}/tambahHalaman`,
    data:
      "&judul_halaman=" +
      titleHalaman +
      "&url_halaman=" +
      linkHalaman +
      "&content_halaman=" +
      keteranganHalaman,
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
