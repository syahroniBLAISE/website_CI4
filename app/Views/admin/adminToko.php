<?= $this->extend('layouts/template');?>

<?= $this->section('content')?>


<!--  -->
<!-- awal content -->
<div class="container">
  <div class="row">
    <button type="button" class="btn btn-primary btn-sm col-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">TAMBAH PRODUK</button>

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
      <tbody>
          <?php $i=1; foreach($data as $d){ ?>
        <tr>
          <th scope="row"><?=$i;?></th>
          <td><?= $d['nama_produk'];?></td>
          <td><?= $d['harga_produk'];?></td>
          <td><?= $d['img_produk'];?></td>
          <td>
            <form action="/hapusProduk/<?= $d['id_produk'];?>"  method='POST' class='d-inline'>
            <?= csrf_field(); ?>
              <input type="hidden" name='_method' value='DELETE'>
              <button type="submit" class="btn btn-danger btn-sm col-4" >DELET</button>
            </form>
              <a type="button" class="btn btn-primary btn-sm col-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="updateProduk(<?= $d['id_produk'];?>)" id="update">EDIT</a>

              <!-- <a type="button" class="btn btn-primary btn-sm col-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data_id="2" id="update">EDIT</a> -->
          </td>
        </tr>
        <?php $i++; }?>
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
        <h5 class="modal-title" id="staticBackdropLabel">TAMBAH PRODUK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action='<?=base_url();?>/produkController/tambahProduk' method='POST' id='formulir' >
        <div class="mb-3">
          <label for="namaBarang" class="form-label">NAMA BARANG</label>
          <input type="text" class="form-control" name='nama_produk' id="namaBarang" >
          <input type="hidden" class="form-control" name='id_produk' id="idBarang" >
        </div>
        <div class="mb-3">
          <label for="hargaBarang" class="form-label">HARGA BARANG</label>
          <input  type="text"  class="form-control" name='harga_produk' id="hargaBarang">
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">KATEGORI</label>
          <input  type="text"  class="form-control" name='kategori_produk' id="kategori">
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">GAMBAR</label>
          <input  type="text"  class="form-control" name='gambar_produk' id="gambar">
        </div>
        <div class="mb-3">
          <label for="rating" class="form-label">RATING</label>
          <input  type="text"  class="form-control" name='rating_produk' id="rating">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->






<?= $this->endSection()?>


