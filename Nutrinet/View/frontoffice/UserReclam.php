<?php
include '../../Controller/ReclamController.php';
include '../../Model/ReclamM.php';

$reclamController = new ReclamController();
$reclams = $reclamController->listReclams();

$reclamC = new ReclamController();
$reclamSE = $reclamC->listReclams();

$responseController = new ResponseController();
$responseL = $responseController->listResponses();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
}

$selectedReclamID = null;
$selectedReclam = null;
$selectedReclamResponses = null;

if (isset($_GET['selectedReclamID'])) {
    $selectedReclamID = decryptId($_GET['selectedReclamID']);
    $selectedReclam = $reclamController->showReclam($selectedReclamID);
    $selectedReclamResponses = $responseController->getResponsesByReclamId($selectedReclamID);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <title>NutriNet</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="icon" href="images/nutrinet.png" type="image/gif" />
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
      rel="stylesheet">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesoeet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
   <link rel="stylesheet" href="css/product.css">
   <style>
      .ReclamD {
         max-width: 320px;
         max-height: 140px;
         overflow-x: hidden;
         overflow-y: auto;
         white-space: normal;
         direction: rtl;
         padding-left: 12px;
         text-align: left;
      }
   </style>
</head>

<body>
   <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
         <span class="dot"></span>
         <div class="dots">
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
   </div>
   <div class="banner_bg_main">
      <!-- header top section start -->
      <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="AboutUs.php">AboutUs</a></li>
                           <li><a href="products.php">Products</a></li>
                           <li><a href="reclam.php">Reclamation</a></li>
                           <li><a href="seance de coaching accuille.html">Seance de coaching</a></li>
                           <li><a href="acceuil.php">Recette</a></li>
                           
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="AboutUs.php"><img src="images/nnn.png" width="250px"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <div class="page-heading header-text">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12" align="center">
                     <span class="buy_bt"><a href="AboutUs.php">AboutUs</a>  >  <a href="#">AboutUs</a> </span>
                  </div>
               </div>
            </div>
         </div>
         <div>&nbsp;</div>
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="AboutUs.php">AboutUs</a>
                     <a href="products.php">Products</a>
                     <a href="UserReclam.php">UserReclam</a>
                     <a href="addCoach.php">addCoach</a>
                     <a href="formulaire.php">contact</a>
                     <a href="listSCU.php">listSCU</a>
                     <a href="reclam.php">Reclamation</a>



                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="products.php">Products</a>
                        <a class="dropdown-item" href="seance de coaching accuille.html">Seance de coaching</a>
                        <a class="dropdown-item" href="acceuil.php">Recette</a>
                     </div>
                  </div>
                  <div class="main">
                  <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #CEE452; border-color:#ffffff ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="images/flag-france.png" class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="panier.php">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="../backoffice/pages/produit.php">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Account</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"> Get Started  <br>Your favorite shopping</h1>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item ">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"><img src="images/ppp.png" width="250px">
                              <div class="buynow_bt"><a href="products.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item ">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"> Seance de Coaching</h1>
                              <div class="buynow_bt"><a href="seance de coaching accuille.html">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      <div>&nbsp;</div>
   </div>
   <div>&nbsp;</div>
   <div>&nbsp;</div>
   <!---------------------------------------------------------------------------------------->
   <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
         <div class="col-lg-12">
         <h4 class="reclam_title">USER RECLAMATIONS </h4>

            <form method="get" class="mt-3">
               <div class="form-group">
                  <label for="selectedReclamID">Select Reclam by ID:</label>
                  <select class="form-control" name="selectedReclamID" id="selectedReclamID">
                     <?php foreach ($reclamSE as $reclam) { ?>
                     <option value="<?= encryptId($reclam['ID_reclam']) ; ?>" <?=(isset($_GET['selectedReclamID']) &&
                       encryptId($reclam['ID_reclam'])==$_GET['selectedReclamID']) ? 'selected' : '' ; ?>>
                        <?= encryptId($reclam['ID_reclam']); ?>
                     </option>
                     <?php } ?>
                  </select>
               </div>
               <button type="submit" style="background-color: #CEE452; color: #fff;" class="btn btn-primary">Show
                  Details</button>
            </form>

 
<?php if (isset($selectedReclam)) { ?>
    <div class="mt-4">
        <h2>Selected Reclam Details</h2>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Reclam Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <tr>
                                <th>Nom</a></th>
                                <th>Title</a></th>
                                <th>Description</a></th>
                                <th>Email</a></th>
                                <th>Category</a></th>
                                <th>Date Reclam</a></th>
                                <th>Status</a></th>
                            </tr>
                            <tr>
                                <td><?= $selectedReclam['Nom']; ?></td>
                                <td><?= $selectedReclam['title']; ?></td>
                                <td>
                                    <div class="ReclamD">
                                        <?= $selectedReclam['description']; ?>
                                    </div>
                                </td>
                                <td><?= $selectedReclam['Mail']; ?></td>
                                <td><?= $selectedReclam['Category']; ?></td>
                                <td><?= $selectedReclam['date']; ?></td>
                                <td><?= $selectedReclam['Status']; ?></td>
                        </tr>                        </table>
                     </div>
                  </div>
               </div>

               <h2 class="mt-4">Responses</h2>
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">Response Details</h5>
                  </div>

                  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
        <tr>
                                <th><a href="<?= generateR('Title', 'tab2'); ?>">Title</a></th>
                                <th><a href="<?= generateR('Message', 'tab2'); ?>">Message</a></th>
                            </tr>
                            <?php foreach (sortR($selectedReclamResponses, 'tab2') as $response) { ?>
                                <tr>
                                    <td>
                                        <div class="ReclamD">
                                            <?= $response['Title']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="ReclamD">
                                            <?= $response['Message']; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

        </table>
    </div>
</div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <br><br>

   <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="AboutUs.php"><img src="images/nnn.png" width="250px"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
               <li><a href="AboutUs.php">AboutUs</a></li>
                  <li><a href="products.php">Products</a></li>
                  <li><a href="reclam.php">Reclamation</a></li>
                  <li><a href="seance de coaching accuille.html">Seance de coaching</a></li>
                  <li><a href="acceuil.php">Recette</a></li>
                  <li><a href="reclam.php">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number Najd Nagati : <a href="#">+216 94054064</a></div>
         </div>
      </div>
      <!-- footer section end -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">© 2023 All Rights Reserved. Design by <a href="https://html.design">TechTitans</a>
         </p>
      </div>
   </div>
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/isotope.min.js"></script>
   <script src="js/owl-carousel.js"></script>
   <script src="js/counter.js"></script>
   <script src="js/custom.js"></script>
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="./js/script.js"></script>
</body>
<p>Translate:</p>
    <div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element');}</script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>