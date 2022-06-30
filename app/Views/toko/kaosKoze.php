<?= $this->extend('layouts/templateToko') ?>
<!-- Gallery Section -->
<?= $this->section('galeryToko') ?>
  <div id="portfolio">
    <div class="container">
      <div class="section-title text-center center">
        <h2>Kaos Polos KOZE</h2>
        <hr>
        <p>Kaos polos KOZE merupakan kaos polos produksi dalam negri dengan kualitas ekspore cocok digunakan sebagai
          kaos harian ataupun bahan kaos untuk sablon manual, heat press vinil, DTG, ataupun heat transfer.</p>
      </div>
      <div class="categories">
        <ul class="cat">
          <li>
            <ol class="type">
              <li><a href="#" data-filter="*" class="active">All</a></li>
              <li><a href="#" data-filter=".premium">Premium Confort</a></li>
              <li><a href="#" data-filter=".polka">Corak Polka</a></li>
              <li><a href="#" data-filter=".misty">Corak Misty</a></li>
            </ol>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="row">
        <div class="portfolio-items">

          <?php foreach($kaos as $k){ ?>

            <div class="col-sm-6 col-md-4 <?= $k['kategori_kaos']; ?>">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="<?= base_Url(); ?><?= $k['thumbnail_kaos']; ?> " title="Coklat" data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4><?= $k['nama_kaos'];?></h4>
                    </div>
                    <img src="<?= base_Url(); ?><?= $k['gambar_kaos']; ?> " class="img-responsive" alt="Coklat">
                  </a></div>
              </div>
            </div>
          
          <?php }?>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>