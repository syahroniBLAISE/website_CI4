<?= $this->extend('layouts/templateToko') ?>



<?= $this->section('aboutToko') ?>
    <div id="about">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="about-text">
            <br>
            <br>
            <br>

            <h2>Welcome to <span>Partner Sablon</span></h2>
            <hr>
            <p>Kami menyediakan Jasa Sablon manual yang berkualitas, menggunakan tinta plastisol dan kaos cotton combed
              30s/24s dalam produksi, serta kami menyediakan sablon heat press dengan poliflex/vinil untuk pakaian jenis
              Jersey.</p>
            <p>Kami juga menjual produk berupa kaos cotton combed 30s/24s dengan kualitas terjamin serta menyediakan
              jasa cutting stiker untuk modifikasi motor / mobil.</p>
            <a href="#services" class="btn btn-custom btn-lg page-scroll">View All Services</a>
          </div>
        </div>
        <div class="col-xs-12 col-md-3">
          <div class="about-media"> <img src="<?= base_Url(); ?>/atributToko2/img/about01.jpeg" alt=" "> </div>
          <div class="about-desc">
            <h3>Kaos Berkualitas</h3>
            <p>Tersdia beragam warna dan pilihan dengan bahan berkualitas standar distro yang lembut, dingin, serta
              menyerap keringat.</p>
          </div>
        </div>
        <div class="col-xs-12 col-md-3">
          <div class="about-media"> <img src="<?= base_Url(); ?>/atributToko2/img/about02.jpeg" alt=" "> </div>
          <div class="about-desc">
            <h3>Peralatan yang memadai</h3>
            <p>kami memiliki peralatan yang memadai baik untuk mengerjakan lusinan, kodian ataupun hanya satuan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>





<?= $this->section('serviceToko') ?>
    <div id="services">
    <div class="container">
      <div class="col-md-10 col-md-offset-1 section-title text-center">
        <h2>Our Services</h2>
        <hr>
        <p>Kami menyediakan jasa seperti SABLON MANUAL, SABLON HEAT PRESS, CUTTING STICTKER dan juga produk seperti KAOS
          POLOS, SWEATER, JERSEY dll</p>
      </div>
      <div class="row">
        <div class="col-md-3 text-center">
          <div class="service-media">
            <img src="<?= base_Url(); ?>/atributToko2/img/services/service-1.jpg" alt=" ">
          </div>
          <div class="service-desc">
            <h3>SABLON MANUAL</h3>
            <p>Terima jasa sablon manual dengan kualitas standar distro menggunakan tinta plastisol dan harga terjangkau
              , baik itu kodian ataupun satuan, dengan pengerjaan yang cepat dan akurat.</p>
          </div>
        </div>

        <div class="col-md-3 text-center">
          <div class="service-media">
            <img src="<?= base_Url(); ?>/atributToko2/img/services/service-2.jpg" alt=" ">
          </div>
          <div class="service-desc">
            <h3>SABLON HEAT PRESS</h3>
            <p>Sedia jasa sablon heat press dengan kualitas bagus dan harga yang terjangkau, sablon heat press merupakan
              teknik sablon dengan mesin cutting menggunakan bahan vinil dan mesin heat press, ex produk : nama punggung
              pada jersey dll.</p>
          </div>
        </div>

        <div class="col-md-3 text-center">
          <div class="service-media">
            <img src="<?= base_Url(); ?>/atributToko2/img/services/service-3.jpg" alt=" ">
          </div>
          <div class="service-desc">
            <h3>CUTTING STICTKER</h3>
            <p>Terima jasa cutting sticker dan pemasangan stictker dengan harga terjangkau dan kulitas stiker yang
              terjamin,
              bisa untuk motor, mobil, kaca dll.</p>
          </div>
        </div>

        <div class="col-md-3 text-center">
          <div class="service-media">
            <img src="<?= base_Url(); ?>/atributToko2/img/services/service-4.jpg" alt=" ">
          </div>
          <div class="service-desc">
            <h3>KAOS, SWEATER, JERSYEY</h3>
            <p>Kami juga menjual produk berupa kaos polos, jersey, sweater baik untuk grosiran ataupun eceran dengan
              harga bersaing.</p>
          </div>
        </div>

        <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
      </div>
    </div>
  </div>
<?= $this->endSection() ?>



 


<?= $this->section('galeryToko') ?>
    <div id="portfolio">
    <div class="container">
      <div class="section-title text-center center">
        <p>
          <h3>Berikut link gallery projeck yang pernah kami kerjakan beserta produck yang kami jual :</h3>
        </p>
        <hr>
      </div>


      <!-- bagian linkg ke kaos dan konveksi -->
      <div class="categories">
        <div>
          <ul>
            <li>
              <ol class="type">
                <li>
                  <div class="row">
                    <div class="col-sm-6 col-md-12">
                      <div class="thumbnail">
                        <img src="<?= base_Url(); ?>/atributToko2/img/services/kaos.jp2" width="250" alt="...">
                        <div class="caption">
                          <p><a href="https://partnersablon.com/kaos/" target="_blank" class="btn btn-primary"
                              role="button">KAOS</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="row">
                    <div class="col-sm-6 col-md-12">
                      <div class="thumbnail">
                        <img src="<?= base_Url(); ?>/atributToko2/img/services/konveksi.jpg" width="250" alt="...">
                        <div class="caption">
                          <p><a href="https://partnersablon.com/konveksi/" target="_blank" class="btn btn-primary"
                              role="button">KONVEKSI</a> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ol>
            </li>
          </ul>
        </div>
      </div>
      <!-- bagian linkg ke kaos dan konveksi -->


      <div class="row">
        <div class="portfolio-items">




        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
<?= $this->endSection() ?>





<!-- <?= $this->section('aboutToko') ?>
<?= $this->endSection() ?> -->