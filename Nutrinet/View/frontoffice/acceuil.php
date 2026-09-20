<?php
include "../../Controller/ratingConx.php";
include "../../Controller/recetteC.php";
include '../../Model/rating.php';
$liste = new ratingConx();
$conx = new recetteC();
$tabl = $conx->listrecettes();

$rating = null;
$ratingC = new ratingConx();
$ratings = new ratingConx();

if (isset($_POST["note"]) && isset($_POST["comment"]) && isset($_POST["fk"])) {
    if (!empty($_POST['note']) && !empty($_POST["comment"]) && !empty($_POST["fk"])) {
        $rating = new rating(
            null,
            $_POST['note'],
            $_POST['comment'],
            $_POST['fk']
        );
        $ratingC->addrating($rating);
        echo '<script>alert("MERCI d avoir donner votre avis")</script>';
        header('Location:acceuil.php');
        
         // Add exit to stop further execution after redirect
    }
}
?>

<!DOCTYPE html>

<html lang="en">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower">
    <style>
        {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
  animation-fill-mode: forwards;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
    </style>
    <style>
                              /* ... Votre code CSS existant ... */
                              <style>
                                 /* Par défaut, une étoile est en gris,
                                    avec un padding et un curseur en forme de main. */
                                 .fa-star {
                                       color: gray;
                                       cursor: pointer;
                                       padding: 0.0625rem;
                                 }

                                 /* Si elle porte en plus la classe '.gold', elle sera en jaune. */
                                 .fa-star.gold {
                                       color: #ffdc0f;
                                 }

                                 /* Le parent global '.rating' positionne le groupe des étoiles et le lien en colonne */
                                 .rating {
                                       display: flex;
                                       flex-direction: column;
                                       align-items: center;
                                 }

                                 /* Le groupe '.stars' positionne les étoiles
                                       les unes à côté des autres sans espacements. */
                                 .stars {
                                       display: inline-flex;
                                       justify-content: center;
                                       font-size: 3em;
                                 }

                                 /**
                                    * Et là opère la magie du ':hover' !
                                    */

                                 /* A l'état :hover sur le parent '.rating',
                                       on force TOUTES les étoiles à passer en jaune. */
                                 .stars:hover .fa-star {
                                       color: #ffdc0f;
                                 }
                                 /* Et si la souris survole une étoile en particulier,
                                       on sélectionne toutes les étoiles qui sont APRÈS celle-ci
                                       grâce à l'opérateur '~' et on les force en GRIS */
                                 .stars .fa-star:hover ~ .fa-star {
                                       color: gray;
                                 }

                                 /******************************************************************/
                                 /* style pour la démo */
                                 html { margin-top: 2em; text-align: center; font-family: 'Droid Sans', sans-serif; font-size: 1.4rem; }
                                 a { color: crimson; font-weight: 600; transition: all 0.8s cubic-bezier(.14,1.36,.5,.88); display: inline-block; }
                                 a:hover { transform: scale(1.3) }
                                 /******************************************************************/
                           </style>
                           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
                           <style>
body {
  font-family: 'Arial', sans-serif;
  background-color: #f8f9fa;
  margin: 20px;
}

.card {
  width: 1000px; /* Ajustez la largeur selon vos besoins */
  margin: 0 auto; /* Centrez la carte sur la page */
  border: 1px solid #dee2e6;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color: #fff;
}

.card-body {
  padding: 800px;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
}

.card-text {
  font-size: 1rem;
  color: #555;
}

.dark.horizontal {
  border-color: #343a40; /* Couleur de la ligne horizontale sombre */
}

.d-flex {
  display: flex;
  justify-content: start;
  align-items: center;
}

.material-icons {
  font-size: 1.5rem;
  color: #007bff; /* Couleur de l'icône Material Design */
}

.text-sm {
  font-size: 0.875rem; /* Taille de police plus petite */
  color: #6c757d; /* Couleur du texte de petite taille */
}

.card:nth-child(odd) {
      background-color: #f9f9f9;
   }
   .card:nth-child(even) {
      background-color: #e6e6e6;
   }   
</style>
<style>
/* Style pour la bannière */
.banner {
  background-color: #f2f2f2;
  text-align: center;
  padding: 20px;
  transition: opacity 0.5s ease-in-out;
}

.banner p {
  font-size: 1.2em;
  color: #333;
  margin: 0;
}
.banner:hover {
      opacity: 0.8;
   }
</style>
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

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<link rel="stylesheet" href="css/product.css">


   </head>
   <body>
      <!-- ***** Preloader Start ***** -->
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
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="#">Gift Ideas</a></li>
                           <li><a href="#">New Releases</a></li>
                           <li><a href="#">Today's Deals</a></li>
                           <li><a href="reclam.php">Customer Service</a></li>
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
                     <div class="logo" ><a href="index.html"><img src="images/nnn.png" width="250px"></a></div>
                  </div>
               </div>
            </div>
         </div>
	   
         <!-- logo section end -->
         <div class="page-heading header-text">
            <div class="container">
              <div class="row">
                <div class="col-lg-12  " align="center">
                  <span class="buy_bt"><a href="index.html">Home</a>  >  <a href="#">Shop</a>  >prot1</span>
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
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
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
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="#">
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
         <!-- banner section end -->
	   <div>&nbsp;</div>
   </div>
      <!-- banner bg main end -->
      <div>&nbsp;</div>
      <div>&nbsp;</div>


      














<!---here   -->


<div class="main" >
                        <!-- Another variation with a button -->
                        <div class="input-group">
                           <input type="text" id ="description" name ="description" class="form-control" placeholder="Search" style="width: 2800px;">
                          <div class="input-group-append">
                              <a class="btn btn-primary btn-sm" href ='' onclick="this.href='chercher.php?name='+document.getElementById('description').value">click me</a>
                              <i class="fa fa-search fa-2x"></i>
                           
                           </div>
                           
                        </div>
                     </div>
    <br>
    <br>

                     <center>
   <div class="banner">
    <p>Éveillez vos papilles, nourrissez votre bien-être : Des recettes saines, savoureuses et pleines de vitalité sur notre site dédié à votre santé !</p>
   </div>
</center> 
<br>
<br>

<div class="card">
   <div class="card-body">
      <h6 class="card-title mb-0">NE RATEZ PAS Nos recettes chaque jour</h6>
          
            <div class="slideshow-container">
               <?php
               $i=1;
            foreach ($tabl as $recette) 
            {?>
                  
                              <div class="mySlides fade" id="<?= $recette['id']; ?>">
                                    <img src="images/recette/<?= $recette['url']; ?>" alt='image recette' width="900" height="900" aleign="center">
                                    <?= $recette['description']; ?>
                                    <span class="dot" onclick="currentSlide(<?= $i; ?>)"></span>
                                 

                                 <form action="" method="POST" id="form<?= $recette['id']; ?>">
                                    <div class="rating">
                                          <div class="stars">
                                             <i class="fa fa-star star" onclick="clickStar(1, <?= $recette['id']; ?>)"></i>
                                             <i class="fa fa-star star" onclick="clickStar(2, <?= $recette['id']; ?>)"></i>
                                             <i class="fa fa-star star" onclick="clickStar(3, <?= $recette['id']; ?>)"></i>
                                             <i class="fa fa-star star" onclick="clickStar(4, <?= $recette['id']; ?>)"></i>
                                             <i class="fa fa-star star" onclick="clickStar(5, <?= $recette['id']; ?>)"></i>
                                          </div>
                                          

                                          <input type="hidden" id="note<?= $recette['id']; ?>" name="note" value="0" class="ratingInput">

                                          <label for="comment<?= $recette['id']; ?>">Laissez des questions :</label>
                                          <textarea name="comment" id="comment<?= $recette['id']; ?>" rows="4" cols="50"></textarea>

                                          <input type="hidden" id="fk<?= $recette['id']; ?>" name="fk" value="<?= $recette['id']; ?>">
                                          <br>
                                          <input type="submit" value="Save">
                                       </div>
                                 </form>
                                 <a href="avis.php?id=<?= $recette['id']; ?>" > Voir Plus.</a>

                                 
                              </div>
                                       <?php
                                             $i++;
                                             if($i==count($recette))
                                             {$i=1;}
                                       }   
                                       ?>
                                                <!-- Next and previous buttons -->
                                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
                

   </div>
</div>
    <br>
    <br>

    <div class="footer_section layout_padding">
        <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="images/nnn.png" width="250px"></a></div>
            <div class="input_bt">
                <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
                <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
                <ul>
                    <li><a href="#">Best Sellers</a></li>
                    <li><a href="#">Gift Ideas</a></li>
                    <li><a href="#">New Releases</a></li>
                    <li><a href="#">Today's Deals</a></li>
                    <li><a href="reclam.php">Customer Service</a></li>
                </ul>
            </div>
            <div class="location_main">Help Line  Number Najd Nagati : <a href="#">+216 94054064</a></div>
        </div>
    </div>

    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">© 2023 All Rights Reserved. Design by <a href="https://html.design">TechTitans</a></p>
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
    <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");

        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }

        // Masquer toutes les diapositives
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        // Afficher la diapositive actuelle
        slides[slideIndex - 1].style.display = "block";

       
    }
</script>
<script>
function clickStar(starValue, recetteId) {
    var formSelector = document.getElementById('form' + recetteId);
    var stars = formSelector.querySelectorAll('.fa-star');
    var ratingInput = document.getElementById('note' + recetteId);

    for (var i = 0; i < starValue; i++) {
        stars[i].classList.add('gold');
    }

    for (var i = starValue; i < stars.length; i++) {
        stars[i].classList.remove('gold');
    }

    ratingInput.value = starValue;
    console.log(ratingInput.value);
}
</script>
</html>