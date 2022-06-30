<?= $this->extend('layouts/templateAdmin');?>

<?= $this->section('content')?>
<!--  -->
<div class='base_url' visibility: hidden>
  <?= base_url();?>
</div>
<!--  -->
<!-- awal content -->
<div class="container adminHalamanKontainer">
  <div class="row">
    <div class="col-3">
      <button type="button" class="btn btn-primary btn-sm col-10" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="tambahHalamanModal()">TAMBAH HALAMAN</button>
    </div>
    <div class="col-3">
      
    </div>
    <div class="col-6"></div>
  </div>
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">TITLE</th>
          <th scope="col">KETERANGAN</th>
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
          <label for="titleHalaman" class="form-label">TITLE</label>
          <input type="text" class="form-control" name='titleHalaman' id="titleHalaman" >
          <div class="" id="titleHalamanError"></div>
          <input type="hidden" class="form-control" name='id_halaman' id="idBarang" >
        </div>
        <div class="mb-3">
          <label for="linkHalaman" class="form-label">LINK</label>
          <input  type="text"  class="form-control" name='harga_produk' id="linkHalaman">
          <div class="" id="linkHalamanError"></div>
        </div>
        <div class="mb-3">
          <label for="keteranganHalaman" class="form-label">KETERANGAN</label>
          <input  type="text"  class="form-control" name='keteranganHalaman' id="keteranganHalaman">
          <div class="" id="kategoriBarangError"></div>

        </div>
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


