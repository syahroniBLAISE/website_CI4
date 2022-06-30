<?= $this->extend('layouts/templateAdmin');?>

<?= $this->section('content')?>
<!--  -->
<div class='base_url' visibility: hidden>
  <?= base_url();?>
</div>
<!--  -->
<!-- awal content -->
<div class="container adminCatatanKeuanganKontainer">
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
      <button type="button" class="btn btn-primary btn-sm col-10 tambahPenjualanModal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="">TAMBAH PRODUK</button>
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
          <th scope="col">NAMA PELANGGAN</th>
          <th scope="col">UANG MASUK</th>
             <th scope="col">UANG KELUAR</th>
          <th scope="col">TIME STAMP</th>
          <th scope="col">KETERANGAN</th>
          <th scope="col">SETTING</th>
        </tr>
      </thead>
      <tbody  class="tabelBarang">

      <!-- tabel stok yang ada di layouts dan javascritp ajax stok  -->
        <?php
        echo $this->include('layouts/templateAdmin/tableCatatanKeuangan'); 
        ?>

      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col pagination">
      <?= $pager->Links('catatan_penjualan', 'stok_pagination') ?>
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
          <label for="nama_pelanggan" class="form-label">NAMA PELANGGAN</label>
          <input type="text" class="form-control" name='nama_pelanggan' id="nama_pelanggan" >
          <div class="" id="nama_pelangganError"></div>
          <input type="hidden" class="form-control" name='id_transaksi' id="id_transaksi" >
        </div>
        <div class="mb-3">
          <label for="uang_masuk" class="form-label">UANG MASUK</label>
          <input  type="text"  class="form-control" name='uang_masuk' id="uang_masuk">
          <div class="" id="uang_masukError"></div>
        </div>
        <div class="mb-3">
          <label for="uang_keluar" class="form-label">UANG KELUAR</label>
          <input  type="text"  class="form-control" name='uang_keluar' id="uang_keluar">
          <div class="" id="uang_keluarProdukError"></div>

        </div>
        <!-- <div class="mb-3">
          <label for="time_transaksi" class="form-label">TIME TRANSAKSI</label>
          <input  type="text"  class="form-control" name='time_transaksi' id="time_transaksi">
          <div class="" id="time_transaksiError"></div>

        </div> -->
                <div class="mb-3">
          <label for="ket_transaksi" class="form-label">KETERANGAN</label>
          <input  type="text"  class="form-control" name='ket_transaksi' id="ket_transaksi">
          <div class="" id="ket_transaksiError"></div>

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
       <form class="uploadCSVPenjualan" action="" method='POST' id='formulir' enctype="multipart/form-data">
    
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


