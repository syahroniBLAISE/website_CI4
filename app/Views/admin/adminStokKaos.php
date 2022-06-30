<?= $this->extend('layouts/templateAdmin');?>

<?= $this->section('content')?>
<!--  -->
<div class='base_url' visibility: hidden>
  <?= base_url();?>
</div>
<!--  -->
<!-- awal content -->
<div class="container adminStokKontainer">
  <div class="row">
    <div class="col">
      <form
          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post">
          <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2" name="keyword">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" name="button">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
      </form>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-3">
      <button type="button" class="btn btn-primary btn-sm col-10 halamanStok" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="">TAMBAH PRODUK</button>
    </div>
    <div class="col-3">
      <button type="button" class="btn btn-primary btn-sm col-12" data-bs-toggle="modal" data-bs-target="#tambahProdukMasalModal" >TAMBAH PRODUK MASSAL</button>
    </div>
    <div class="col-6"></div>
  </div>
  <div class="row">
    <?php 
    // dd($data_produk) 
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA PRODUK</th>
          <th scope="col">WARNA</th>
             <th scope="col">SIZE</th>
          <th scope="col">JUMLAH</th>
          <th scope="col">KATEGORI</th>
          <th scope="col">SETTING</th>
        </tr>
      </thead>
      <tbody  class="tabelBarang">

      <!-- tabel stok yang ada di layouts dan javascritp ajax stok  -->
        <?= $this->include('layouts/templateAdmin/tableStok'); ?>

      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col pagination">
      <?= $pager->Links('data_produk', 'stok_pagination') ?>
    </div>
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
          <label for="namaProduk" class="form-label">NAMA PRODUK</label>
          <input type="text" class="form-control" name='nama_produk' id="namaProduk" >
          <div class="" id="namaProdukError"></div>
          <input type="hidden" class="form-control" name='id_produk' id="idProduk" >
        </div>
        <div class="mb-3">
          <label for="warna" class="form-label">WARNA</label>
          <input  type="text"  class="form-control" name='warna' id="warna">
          <div class="" id="warnaError"></div>
        </div>
        <div class="mb-3">
          <label for="size" class="form-label">SIZE</label>
          <input  type="text"  class="form-control" name='size' id="size">
          <div class="" id="sizeProdukError"></div>

        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">JUMLAH</label>
          <input  type="text"  class="form-control" name='jumlah' id="jumlah">
          <div class="" id="jumlahError"></div>

        </div>
                <div class="mb-3">
          <label for="kategori" class="form-label">KATEGORI</label>
          <input  type="text"  class="form-control" name='kategori' id="kategori">
          <div class="" id="kategoriError"></div>

        </div>
        <a type="submit" class="btn btn-primary" onclick="" id='tombol_modal'>Submit</a>
      </form>
      </div>
      <div class="modal-footer modal-footerKaos">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="">Close</button>
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
       <form class="formCSVStok" action="" method='POST' id='formulir' enctype="multipart/form-data">
    
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


