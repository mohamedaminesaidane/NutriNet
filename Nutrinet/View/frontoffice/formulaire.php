<?php

include '../../Controller/Items.php';
include '../../Model/Items.php';
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
// create an instance of the controller
$ItemsC = new ItemsC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    if (
        isset($_POST["nom"]) &&
        isset($_POST["description"]) &&
        isset($_POST["prix"]) &&
        isset($_POST["stock"])
    ) {
        if (
            !empty($_POST['nom']) &&
            !empty($_POST["description"]) &&
            !empty($_POST["prix"]) &&
            !empty($_POST["stock"])
        ) {
            // Create a new Items object
            $Items = new Items(
                null,
                $_POST['nom'],
                $_POST['description'],
                $_POST['prix'],
                $_POST['stock']
            );

            // Add the Items using the controller
            $ItemsC->addItems($Items);
            //mail
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
                $mail->SMTPAuth   = true;
                $mail->Username   = 'mohamadrayen.jbili@esprit.tn';    // Your SMTP username
                $mail->Password   = '221JMT4222';    // Your SMTP password
                $mail->SMTPSecure = 'tls';              // Enable TLS encryption
                $mail->Port       = 587;                // TCP port to connect to
            
                //Recipients
                $mail->setFrom('mohamadrayen.jbili@esprit.tn');
                $mail->addAddress('mohamadrayen.jbili@esprit.tn');
            
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Ajout d une commande';
                $mail->Body    = 'Commande Effectuer';
            
                $mail->send();
                echo 'Email has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            // Redirect to the desired page after adding the Items
            header('Location: formulaire.php');
            exit(); // Make sure to exit after header redirect to prevent further execution
        } else {
            echo "All fields are required.";
        }
    }
}
?>


<html lang="en">
   <head>
	      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier avec JavaScript</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
		button1
		{
			margin: 500px;
		}
    </style>
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


<hr>

     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<h4 class="reclam_title"style="text-align : center;">Formulaire de Contact</h4>

    <form id="contactForm" action="" method="POST">

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
            <span class="error-message" id="errorNom"></span>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <input type="text" id="description" name="description" class="form-control" required>
            <span class="error-message" id="errordescription"></span>
        </div>

        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" class="form-control" step="0.01" required>
            <span class="error-message" id="errorprix"></span>
        </div>

        <div class="form-group">
            <label for="stock">Stock :</label>
            <input type="number" id="stock" name="stock" class="form-control" placeholder="" required>
            <span class="error-message" id="errorstock"></span>
        </div>

        <button class="btn btn-secondary" type="submit" onclick="validerFormulaire()" style="background-color: #CEE452; color: white; width: 100px">Envoyer</button>
    </form>

    <script>
        function validerFormulaire(event) {
            // Réinitialiser les messages d'erreur
            document.getElementById('errorNom').innerHTML = '';
            document.getElementById('errordescription').innerHTML = '';
            document.getElementById('errorprix').innerHTML = '';
            document.getElementById('errorstock').innerHTML = '';

            // Récupérer les valeurs des champs
            var nom = document.getElementById('nom').value;
            var description = document.getElementById('description').value;
            var prix = document.getElementById('prix').value;
            var stock = document.getElementById('stock').value;

            // Validation simple côté client
            var erreurs = false;

            if (nom.trim() === '') {
                document.getElementById('errorNom').innerHTML = 'Veuillez saisir votre nom.';
                erreurs = true;
            } else if (!/^[a-zA-Z]+$/.test(nom)) {
                document.getElementById('errorNom').innerHTML = 'Le nom doit contenir uniquement des lettres.';
                erreurs = true;
            }

            if (description.trim() === '') {
                document.getElementById('errordescription').innerHTML = 'Veuillez saisir votre description.';
                erreurs = true;
            } else if (!/^[a-zA-Z]+$/.test(description)) {
                document.getElementById('errordescription').innerHTML = 'La description doit contenir uniquement des lettres.';
                erreurs = true;
            }

            if (prix.trim() === '' || isNaN(parseFloat(prix)) || !isFinite(prix)) {
                document.getElementById('errorprix').innerHTML = 'Veuillez saisir un prix valide.';
                erreurs = true;
            }

            if (stock.trim() === '' || !/^\d+$/.test(stock) || parseInt(stock) <= 0) {
                document.getElementById('errorstock').innerHTML = 'Veuillez saisir un stock valide (entier positif supérieur à zéro).';
                erreurs = true;
            }

            // Annuler la soumission du formulaire s'il y a des erreurs
            if (erreurs) {
                event.preventDefault(); // Annuler la soumission du formulaire
            } else {
                // Envoyer le formulaire si aucune erreur n'est détectée
                // Vous pouvez ajouter ici le code pour envoyer les données à votre serveur
                alert('Formulaire soumis avec succès !');
            }
        }

        // Ajouter un écouteur d'événement sur le formulaire
        var contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', validerFormulaire);
    </script>
</body>




    <script>
    function validerFormulaire(event) {
        // Réinitialiser les messages d'erreur
        document.getElementById('errorNom').innerHTML = '';
        document.getElementById('errordescription').innerHTML = '';
        document.getElementById('errorprix').innerHTML = '';
        document.getElementById('errorstock').innerHTML = '';

        // Récupérer les valeurs des champs
        var nom = document.getElementById('nom').value;
        var description = document.getElementById('description').value;
        var prix = document.getElementById('prix').value;
        var stock = document.getElementById('stock').value;

        // Validation simple côté client
        var erreurs = false;

        if (nom.trim() === '') {
            document.getElementById('errorNom').innerHTML = 'Veuillez saisir votre nom.';
            erreurs = true;
        } else if (!/^[a-zA-Z]+$/.test(nom)) {
            document.getElementById('errorNom').innerHTML = 'Le nom doit contenir uniquement des lettres.';
            erreurs = true;
        }

        if (description.trim() === '') {
            document.getElementById('errordescription').innerHTML = 'Veuillez saisir votre description.';
            erreurs = true;
        } else if (!/^[a-zA-Z]+$/.test(description)) {
            document.getElementById('errordescription').innerHTML = 'La description doit contenir uniquement des lettres.';
            erreurs = true;
        }

        if (prix.trim() === '' || isNaN(parseFloat(prix)) || !isFinite(prix)) {
            document.getElementById('errorprix').innerHTML = 'Veuillez saisir un prix valide.';
            erreurs = true;
        }

        if (stock.trim() === '' || !/^\d+$/.test(stock) || parseInt(stock) <= 0) {
            document.getElementById('errorstock').innerHTML = 'Veuillez saisir un stock valide (entier positif supérieur à zéro).';
            erreurs = true;
        }

        // Annuler la soumission du formulaire s'il y a des erreurs
        if (erreurs) {
            event.preventDefault(); // Annuler la soumission du formulaire
        } else {
            // Envoyer le formulaire si aucune erreur n'est détectée
            // Vous pouvez ajouter ici le code pour envoyer les données à votre serveur
            alert('Formulaire soumis avec succès !');
        }
    }

    // Ajouter un écouteur d'événement sur le formulaire
    var contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit', validerFormulaire);
</script>
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
   </body>
   <p>Translate:</p>
    <div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element');}</script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>