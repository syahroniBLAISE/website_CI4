<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title;?></title>
  <meta name="description" content="halaman awal patnersablon">
  <meta name="author" content="syahroni">

  <!-- Favicons
    ================================================== -->


  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?= base_Url(); ?>/atributToko2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?= base_Url(); ?>/atributToko2/fonts/font-awesome/css/font-awesome.css">


  <!-- Stylesheet
    ================================================== -->
  <link rel="stylesheet" type="text/css" href="<?= base_Url(); ?>/atributToko2/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?= base_Url(); ?>/atributToko2/css/nivo-lightbox/nivo-lightbox.css">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  <!-- Navigation
    ==========================================-->
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand page-scroll" href="#page-top"><img width="150" src="<?= base_Url(); ?>/atributToko2/img/DESAIN.png" alt=" "></a> </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?= base_Url(); ?>" target="_blank" class="page-scroll">HOME</a></li>
          <li><a href="<?= base_Url(); ?>/admin" target="_blank" class="page-scroll">lOGIN ADMIN</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!-- Header -->
  <header id="header">
    <div class="intro">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 intro-text">
              <h1>partner sablon</h1>
              <p>Sablon Manual | Sablon Heat Press | Cutting Sticker <br>Kaos Polos | Jersey Bola | Konveksi.</p>
              <a href="<?= base_Url(); ?>/atributToko2/brosur_print.png" target="_blank" class="btn btn-custom btn-lg page-scroll">More Info</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- About Section -->
  <!-- Gallery Section -->
<!-- Gallery Section -->
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


          <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

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
        

     

          <?php 
// endfor  ?>

        </div>
      </div>
    </div>
  </div>



  <!-- Testimonials Section -->
  <!-- <div id="testimonials" class="text-center">
    <div class="overlay">
      <div class="container">
        <div class="section-title">
          <h2>Testimonials</h2>
          <hr>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div id="testimonial" class="owl-carousel owl-theme">-->

              <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

  <?php 
          // for( $i = 1; $i <= $jmlArtikel; $i++ ) :?>
  <!-- <div class="item">
                <p>ketebalan kaos polos</p>
                <p>ketebalan kaso polos di bedakan berdasarkan gramasi atau berat dari kaos itu sendiri seperti 20s,
                  24s, 30s, 40s.yang menandakan semakin tebal angka sebelum huruf s maka semakin tipis kaosnya</p>
              </div> -->
  <?php 
          // endfor ?>

  <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

  </div>
  </div>
  </div>
  </div>
  </div>
  </div> -->
  <!-- Contact Section -->
  <div id="contact" class="text-center">
    <div class="container">
      <div class="section-title text-center">
        <h2>Contact Us</h2>
        <hr>
        <!-- <p>Untuk info lebih lanjut anda dapat datang berkunjung ke workshop kami ataupun menghubungi kami melalui
          emai/nomor telpon di bawah, serta anda bisa meninggalkan pertanyaan dan alamat email pada kolom di bawah, agar
          kami dapat menghubungi anda untuk memberikan jawaban serta penawaran yang anda butuhkan.</p> -->
      </div>
      <div class="col-md-10 col-md-offset-1 contact-info">
        <div class="col-md-4">
          <h3>Address</h3>
          <hr>
          <div class="contact-item">
            <p>Desa. Kubang Putih, Kec. Banuhampu</p>
            <p>Kab. Agam, Provinsi Sumatra Barat, Indonesia</p>
          </div>
        </div>
        <div class="col-md-4">
          <h3>Working Hours</h3>
          <hr>
          <div class="contact-item">
            <p>Monday-Saturday: 07:00 - 18:00</p>
            <p>Sunday: CLOSED</p>
          </div>
        </div>
        <div class="col-md-4">
          <h3>Contact Info</h3>
          <hr>
          <div class="contact-item">
            <p>Phone: 082386363300</p>
            <p>Email: syahronibagus@yahoo.co.id</p>
          </div>
        </div>
      </div>

      <!-- Footer Section -->
      <div id="footer">
        <div class="container text-center">
          <div class="col-md-8 col-md-offset-2">
            <div class="social">
              <ul>
                <li><a href="https://m.facebook.com/Partnersablon-619631078529240"><i class="fa fa-facebook"></i></a>
                </li>
                <li><a href="https://www.instagram.com/partnersablon"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=082386363300"><i class="fa fa-whatsapp"></i></a></li>
              </ul>
            </div>
            <p>&copy; 2020 Partner Sablon. Designed by Syahroni.ST</p>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/jquery.1.11.1.js"></script>
      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/bootstrap.js"></script>
      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/jquery.isotope.js"></script>


     <!--  <script type="text/javascript" src="js/SmoothScroll.js"></script>
      <script type="text/javascript" src="js/nivo-lightbox.js"></script>
      <script type="text/javascript" src="js/owl.carousel.js"></script>
      <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
      <script type="text/javascript" src="js/contact_me.js"></script> -->


      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/main.js"></script>
</body>

</html>