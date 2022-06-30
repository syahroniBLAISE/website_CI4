<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Partner Sablon</title>
  <meta name="description"
    content="kami partnersablon atau partner sablon merupakan usaha jasa bergerak di bidang sablon kaos polo, sablon poliflex, sablon plastisol, sablon manual, sablon cutting, sablon water base, sablon rubber, cutting sticdker, konveksi kaos, konveksi kemeja, konveksi celana, konveksi rompi, konveksi jas, konveksi wearpack, serta juga menjual kaos polo, kaoas namako tea, kaos gildan, kaos koze, dan juga menyediakan jasa pembuatan website, toko online yang berlokasi di sablon kaos kota bukittinggi, sablon kaos kota padang, sablon kaos kota padang panjang, sablon kaos kota payakumbuh, sablon kaos kota pariaman, sablon kaos kota solok, kabupaten agam, kabupaten 50 sablon kaos kota, sablon kaos kabupaten lima puluh sablon kaos kota, sablon kaos desa kubang putih.  ">
  <meta name="author" content="syahroni">

  <!-- flowting whatsapp -->
  <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/floating-whatsapp-master/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/floating-whatsapp-master/floating-wpp.min.js"></script>
  <link rel="stylesheet" href="<?= base_Url(); ?>/atributToko2/floating-whatsapp-master/floating-wpp.min.css">

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
  
    <?= $this->include('layouts/templateToko/navToko') ?>

<!-- Header -->


    <?= $this->renderSection('headerTokoLink') ?>


<!-- Contact Section -->

    <?= $this->include('layouts/templateToko/contacToko') ?>


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
            <p>&copy; <?= date('Y'); ?> Partner Sablon. Designed by Syahroni.ST</p>
            </div>
        </div>
    </div>
    <div id="myDiv"></div>


      <script type="text/javascript">
        $('#myDiv').floatingWhatsApp({
          phone: '+6282387047732',
          popupMessage: 'Aday yang bisa di bantu bosku ..?',
          message: "saya ingin sablon baju",
          showPopup: true,
          showOnIE: false,
          headerTitle: 'Welcome!',
          headerColor: 'green',
          backgroundColor: 'black',
          buttonImage: '<img src="<?= base_Url(); ?>/atributToko2/floating-whatsapp-master/whatsapp.svg" />'
        });
      </script>
      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/jquery.1.11.1.js"></script>
      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/bootstrap.js"></script>
      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/jquery.isotope.js"></script>
      <script type="text/javascript" src="<?= base_Url(); ?>/atributToko2/js/main.js"></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
      </script>

</body>

</html>