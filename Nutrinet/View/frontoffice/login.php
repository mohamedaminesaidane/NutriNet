


<?php
include "../../Controller/CoachC.php";

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les valeurs saisies dans le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $motdepasse = $_POST['motdepasse'];

    // Vérifier les informations de connexion
    $c = new CoachC();
    $coach = $c->getCoachByNomPrenom($nom, $prenom);

    if ($coach && $coach['motdepasse'] == $motdepasse) {
        // Les informations de connexion sont correctes
        $cdsc = $coach['id']; // Récupérer l'ID du coach et l'assigner à la variable $cdsc

        // Redirection vers le fichier addSC.php en incluant l'ID du coach dans l'URL
        header("Location: addSC.php?id=$cdsc");
        exit();
    } else {
        // Afficher un message d'erreur si les informations sont incorrectes
        echo "Nom, prénom ou mot de passe incorrect.";
    }
}
?>




















<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>NutriNet</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/nutrinet.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">



<link rel="stylesheet" href="css/product.css">
   </head>
   <body>
      <!-- ***** Preloader Start ***** -->

      <!-- ***** Preloader End ***** -->
      <!-- banner bg main start -->
   <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="AboutUs.php">Accueil</a></li>
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
                     <span class="buy_bt"><a href="AboutUs.php">Accueil</a>  >  <a href="#">AboutUs</a> </span>
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
                     <a href="AboutUs.php">Accueil</a>
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
         <!-- banner section start -->
         <!-- banner section end -->
	   <div>&nbsp;</div>
   </div>
      <!-- banner bg main end -->
      <div>&nbsp;</div>
      <div>&nbsp;</div>
























    <div class="container">
        <h2>Login</h2>
        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" class="form-control" name="prenom" id="prenom" required>
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" name="motdepasse" id="motdepasse" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
    </div>
<br>
<br>











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
               <li><a href="AboutUs.php">Accueil</a></li>
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
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2023 All Rights Reserved. Design by <a href="https://html.design">TechTitans</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>

      <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/isotope.min.js"></script>
  <script src="js/owl-carousel.js"></script>
  <script src="js/counter.js"></script>
  <script src="js/custom.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eZbI3l/H1Ij8L3+RJOh5n9xxU5aZq0NRSSzEynf7Jq87XgciG46DAyJXH4UnzZlp" crossorigin="anonymous"></script>

   </body>
   <p>Translate:</p>
    <div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element');}</script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>