<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=  $title ?></title>
    <meta name="description" content="halaman awal patnersablon">
    <meta name="author" content="syahroni">



    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/atributFileToko/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/atributFileToko/fonts/font-awesome/css/font-awesome.css">

    

    <!-- Stylesheet
      ================================================== -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/atributFileToko/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/atributFileToko/css/nivo-lightbox/nivo-lightbox.css">


    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url();?>/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!-- <link href="<?= base_url();?>/css/styles.css" rel="stylesheet" /> -->


  </head>

  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
      ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
              class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll" href="#page-top"><img src="<?= base_url();?>/atributFileToko/img/DESAIN 2.png" alt=" "></a> </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">

            <li><a href="https://partnersablon.com" target="_blank" class="page-scroll">HOME</a></li>
            <li><a href="https://partnersablon.com/kaos" target="_blank" class="page-scroll">KAOS</a></li>
            <li><a href="#portfolio" class="page-scroll">Gallery</a></li>
            <li><a href="#contact" class="page-scroll">Contact</a></li>
            <li>
              <form class="d-flex">
                <div class="btn-group">
                  <button class="btn btn-outline-dark" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                      <i class="bi-cart-fill me-1"></i>
                      Cart
                      <span class="badge bg-dark text-white ms-1 rounded-pill">

                      </span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <?php 
                      $cart = $cart->contents();
                      // dd($cart);
                      
                      $i = 0;
                      foreach($cart as $listCart){ ?>
                      <li><button class="dropdown-item" type="button"> <?= $listCart['name']. ' jumlah '  .$listCart['qty']. ' harga =' .$listCart['price']?> </button></li>                            
                      <?php $i= $i + 1; }?>
                      <li><a class="dropdown-item" type="button" href="<?= base_url('produkController/clearCart');?>"> CLEAR CART</a></li> 
                  </ul>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <!-- <header id="header">
      <div class="intro">
        <div class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 intro-text">
                <h1>partner sablon</h1>
                <p>Sablon Manual | Sablon Heat Press | Cutting Sticker <br>Kaos Polos | Jersey Bola | Konveksi.</p>
                <a href="brosur_print.png" target="_blank" class="btn btn-custom btn-lg page-scroll">More Info</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header> -->

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
        <!-------------------------------------- XXXXXXXXXXXXXXXX -------------------------------------->
        <!-------------------------------------- ROW UNTUK PRODUK -------------------------------------->
        <div class="row">
          <?php foreach($data as $d){?>
          <div class="col-sm-6 col-md-4 polka">
            <div class="portfolio-item">
              <div class="portfolio-items">
                  <div class="col mb-5">

                    <?php
                        helper('form'); 
                        echo form_open('produkController/cart');
                        echo form_hidden('id_produk', $d['id_produk']);
                        echo form_hidden('qty', 1);
                        echo form_hidden('harga_produk', $d['harga_produk']);
                        echo form_hidden('nama_produk', $d['nama_produk']);
                        echo form_hidden('img_produk', $d['img_produk']);
                    ?>
                      <div class="/card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <div class="hover-bg"> 
                          <a href="img/portfolio/bigs-23.jp2" title="Merah Polka"data-lightbox-gallery="gallery1">
                            <div class="hover-text">
                              <h4><?= $d['nama_produk'];?></h4>
                            </div>
                            <img src="<?= base_url();?><?= $d['img_produk'];?>" class="img-responsive" alt="Merah Polka">
                          </a>
                        </div>
                        <!-- Product details-->
                        <div class="card-body p-4">
                          <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?= $d['nama_produk'];?> <?= $d['id_produk'];?></h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                              <ul class="cat">
                                <li>
                                  <ol class="type">
                                    <?php for ($i=0; $i<$d['rating_produk']; $i++){?>
                                    <li><div class="bi-star-fill"></div></li>
                                    <?php }?>
                                  </ol>
                                </li>
                              </ul>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            <?= $d['harga_produk'];?>
                          </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                          <div class="text-center"><button type="submit" class="btn btn-outline-dark mt-auto" >Add to cart</button></div>
                        </div>
                      </div>
                    <?php echo form_close();?>

                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
          <!-------------------------------------- ROW UNTUK PRODUK -------------------------------------->
          <!-------------------------------------- XXXXXXXXXXXXXXXX -------------------------------------->
          
        </div>
    </div>
    
    <!-- Contact Section -->
    <div id="contact" class="text-center">
      <div class="container">
        <div class="section-title text-center">
          <h2>Contact Us</h2>
          <hr>
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
      </div>
    </div>
        <script type="text/javascript" src="<?= base_url();?>/atributFileToko/js/jquery.1.11.1.js"></script>
        <script type="text/javascript" src="<?= base_url();?>/atributFileToko/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?= base_url();?>/atributFileToko/js/jquery.isotope.js"></script>
        <script type="text/javascript" src="<?= base_url();?>/atributFileToko/js/main.js"></script>
  </body>

</html>