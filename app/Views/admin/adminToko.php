<?= $this->extend('layouts/template');?>

<?= $this->section('content')?>
<!--  -->

<!--  -->
<!-- awal content -->
<div id='base_url'visibility: hidden>
  <?= base_url();?>
</div>
<div class="container adminTokoKontainer">
  <div class="row">
    <div class="col-3">
      <button type="button" class="btn btn-primary btn-sm col-10" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="tambahProdukModal()">TAMBAH PRODUK</button>
    </div>
    <div class="col-3">
      <button type="button" class="btn btn-primary btn-sm col-12" data-bs-toggle="modal" data-bs-target="#tambahProdukMasalModal" >TAMBAH PRODUK MASSAL</button>
    </div>
    <div class="col-6"></div>
  </div>
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA PRODUK</th>
          <th scope="col">HARGA</th>
             <th scope="col">IMAGE</th>
          <th scope="col">SETING</th>
        </tr>
      </thead>
      <tbody  class="tabelBarang">

        </tr>

      </tbody>
    </table>
  </div>
</div>

<!-- akhir content  -->
<!--  -->

<!-- modal-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ERROR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action='' method='POST' id='formulir' enctype="multipart/formdata">
        <div class="mb-3">
          <label for="namaBarang" class="form-label">NAMA BARANG</label>
          <input type="text" class="form-control" name='nama_produk' id="namaBarang" >
          <div class="" id="namaBarangError"></div>
          <input type="hidden" class="form-control" name='id_produk' id="idBarang" >
        </div>
        <div class="mb-3">
          <label for="hargaBarang" class="form-label">HARGA BARANG</label>
          <input  type="text"  class="form-control" name='harga_produk' id="hargaBarang">
          <div class="" id="hargaBarangError"></div>
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">KATEGORI</label>
          <input  type="text"  class="form-control" name='kategori_produk' id="kategoriBarang">
          <div class="" id="kategoriBarangError"></div>

        </div>
        <div class="mb-3">
          <label for="rating" class="form-label">RATING</label>
          <input  type="text"  class="form-control" name='rating_produk' id="ratingBarang">
          <div class="" id="ratingBarangError"></div>

        </div>
        <div class="mb-3">
          <label for="img" class="form-label">img</label>
          <input  type="text"  class="form-control" name='img_produk' id="imgBarang">
          <div class="" id="imgBarangError"></div>

        </div>
        <!-- <div class="mb-3">
          <label for="gambar" class="form-label">Pilih Gambar</label>
          <div class="invalid-feedback"><?= $validation->getError('gambar_produk');?></div>
          <input  type="file"  class="form-control" name='gambar_produk' id="gambar">
        </div> -->
        
        <a type="submit" class="btn btn-primary" onclick="" id='tombol_modal'>Submit</a>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="clearModal()">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<!-- modal tambah produk masal-->
<div class="modal fade" id="tambahProdukMasalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">UPLOAD FIEL CSV</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action='/uploadCSV' method='POST' id='formulir' enctype="multipart/form-data">
    
        <div class="mb-3">
          <label for="csv" class="form-label">Pilih File</label>
          <input  type="file"  class="form-control" name='csv' id="csv">
        </div>
        
        <button type="submit" class="btn btn-primary" name="upload" >Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->





<?= $this->endSection()?>


