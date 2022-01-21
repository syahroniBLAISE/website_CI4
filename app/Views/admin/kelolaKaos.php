<?= $this->extend('layouts/template');?>

<?= $this->section('content')?>
<!--  -->
<div class='base_url' visibility: hidden>
  <?= base_url();?>
</div>
<!--  -->
<!-- awal content -->
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
          <input type="text" class="form-control" name='nama_kaos' id="namaBarang" >
          <div class="" id="namaBarangError"></div>
          <input type="hidden" class="form-control" name='id_kaos' id="idBarang" >
        </div>
        <div class="mb-3">
          <label for="hargaBarang" class="form-label">HARGA BARANG</label>
          <input  type="text"  class="form-control" name='harga_kaos' id="hargaBarang">
          <div class="" id="hargaBarangError"></div>
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">KATEGORI</label>
          <input  type="text"  class="form-control" name='kategori_kaos' id="kategoriBarang">
          <div class="" id="kategoriBarangError"></div>

        </div>
        <div class="mb-3">
          <label for="warnaBarang" class="form-label">WARNA</label>
          <input  type="text"  class="form-control" name='warnaBarang' id="warnaBarang">
          <div class="" id="warnaBarangError"></div>

        </div>
                <div class="mb-3">
          <label for="gambarBarang" class="form-label">GAMBAR</label>
          <input  type="text"  class="form-control" name='gambarBarang' id="gambarBarang">
          <div class="" id="gambarBarangError"></div>

        </div>
        <div class="mb-3">
          <label for="thumbnailBarang" class="form-label">THUMBNAIL</label>
          <input  type="text"  class="form-control" name='gambar_kaos' id="thumbnailBarang">
          <div class="" id="thumbnailBarangError"></div>

        </div>
        <!-- <div class="mb-3">
          <label for="gambar" class="form-label">Pilih Gambar</label>
          <div class="invalid-feedback"><?= $validation->getError('gambar_kaos');?></div>
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
       <form action='/uploadCSVKaos' method='POST' id='formulir' enctype="multipart/form-data">
    
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


