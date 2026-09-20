<?php

include '../../Controller/CoachC.php';
include '../../Model/Coach.php';

// create coach
$coach = null;

// create an instance of the controller
$coachC = new CoachC();
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["sexe"]) &&
    isset($_POST["specialite"]) &&
    isset($_POST["diplome"]) &&
    isset($_POST["motdepasse"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["sexe"]) &&
        !empty($_POST["specialite"]) &&
        !empty($_POST["diplome"]) &&
        !empty($_POST["motdepasse"])
    ) {
        $coach = new Coach(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['sexe'],
            $_POST['specialite'],
            $_POST['diplome'],
            $_POST['motdepasse']
        );
        $coachC->addCoach($coach);
       // header('Location:listCoach.php');
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
      <!-- ***** Preloader Start ***** 
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
       ***** Preloader End ***** -->
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


      <head>
         <title>Inscription (Nouveau coach)</title>
         <!-- Inclusion des fichiers CSS de Bootstrap -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
         <head>
    <title>Inscription (Nouveau coach)</title>
    <!-- Inclusion des fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-4">
    <a href="../backoffice/pages/listCoach.php" class="btn btn-primary">Back to list</a>
    <hr>

    <form id="coachForm" method="POST">
        <div class="mb-3 row">
            <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="sexe" class="col-sm-2 col-form-label">Sexe :</label>
            <div class="col-sm-10">
                <select class="form-select" id="sexe" name="sexe">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="specialite" class="col-sm-2 col-form-label">Spécialité :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="specialite" name="specialite">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="diplome" class="col-sm-2 col-form-label">Diplôme :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="diplome" name="diplome">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="motdepasse" class="col-sm-2 col-form-label">Mot de passe :</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="motdepasse" name="motdepasse">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="captcha-response" class="col-sm-2 col-form-label">CAPTCHA:</label>
            <div class="col-sm-10">
                <img id="captcha-image" src="" alt="CAPTCHA Image" class="mb-2">
                <input type="text" class="form-control" id="captcha-response" name="captcha-response" placeholder="Enter the text from the image">
                <input type="hidden" id="captcha-answer">
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Save">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>
        </div>
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var captchaPhotos = [
            { image: 'captcha1.jpg', answer: 'a' },
            { image: 'captcha2.jpg', answer: 'a' },
            { image: 'captcha3.jpg', answer: 'a' }
            // Add more CAPTCHA photos with their corresponding answers
        ];

        function generateCaptcha() {
            var captcha = captchaPhotos[Math.floor(Math.random() * captchaPhotos.length)];
            var captchaImage = document.getElementById('captcha-image');
            captchaImage.src = captcha.image;

            document.getElementById('captcha-answer').value = captcha.answer;
        }

        document.getElementById("coachForm").addEventListener("submit", function(event) {
            var nomInput = document.getElementById("nom");
            var prenomInput = document.getElementById("prenom");
            var motdepasseInput = document.getElementById("motdepasse");
            var captchaResponseInput = document.getElementById("captcha-response");

            var nom = nomInput.value;
            var prenom = prenomInput.value;
            var motdepasse = motdepasseInput.value;
            var captchaResponse = captchaResponseInput.value;
            var expectedAnswer = document.getElementById("captcha-answer").value;

            var errors = [];

            // Validate nom and prenom
            if (!/^[a-zA-Z]+$/.test(nom)) {
                errors.push("Le nom est invalide. Veuillez saisir un nom valide sans numéros.");
            }

            if (!/^[a-zA-Z]+$/.test(prenom)) {
                errors.push("Le prénom est invalide. Veuillez saisir un prénom valide sans numéros.");
            }

            // Validate motdepasse
            if (motdepasse.length < 6 || !/\d/.test(motdepasse)) {
                errors.push("Le mot de passe est invalide. Veuillez saisir un mot de passe d'au moins 6 caractères avec au moins un numéro.");
            }

            // Validate CAPTCHA response
            if (captchaResponse !== expectedAnswer) {
                errors.push("La réponse CAPTCHA est incorrecte. Veuillez réessayer.");
            }

            if (errors.length > 0) {
                event.preventDefault(); // Prevent form submission

                // Display error messages
                var errorContainer = document.createElement("div");
                errorContainer.className = "alert alert-danger";
                errorContainer.innerHTML = "<ul>" + errors.map(function(error) {
                    return "<li>" + error + "</li>";
                }).join("") + "</ul>";

                var form = document.getElementById("coachForm");
                form.insertBefore(errorContainer, form.firstChild);
            }
        });

        // Generate a CAPTCHA when the page loads
        generateCaptcha();
    </script>
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
    <!-- Inclusion des fichiers JS de Bootstrap -->

</body>
<p>Translate:</p>
    <div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element');}</script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>