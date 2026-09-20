<?php
include "../../Controller/ratingConx.php";
include "../../Controller/recetteC.php";
include '../../Model/rating.php';
$conx = new recetteC();

$liste = new ratingConx();
//create rating
$rating = null;
$url=$_SERVER['REQUEST_URI'];

$url_components = parse_url($url);
parse_str($url_components['query'], $params);
var_dump($params);
echo $_GET['name'];
//echo '<script>alert("Welcome to Geeks for Geeks")</script>'.$params['name'];  



$tableau=$conx->recherche($_GET['name']);
                     
if(count($tableau)>0)
{

?>                        
                        <!DOCTYPE html>

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
                           <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            margin: 0 ;
            /* Center website */
            max-width: 800px;
            /* Max width */
            padding: 20px;
        }

        .heading {
            font-size: 25px;
            margin-right: 25px;
        }

        .fa {
            font-size: 25px;
        }

        .checked {
            color: orange;
        }

        /* Three column layout */
        .side {
            float: left;
            width: 15%;
            margin-top: 10px;
        }

        .middle {
            float: left;
            width: 70%;
            margin-top: 10px;
        }

        /* Place text to the right */
        .right {
            text-align: right;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The bar container */
        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
        }

        /* Individual bars */
        .bar-5 {
            width: <?php echo round(($n5 / $n) * 100); ?>%;
            height: 18px;
            background-color: #04AA6D;
        }

        .bar-4 {
            width: <?php echo round(($n4 / $n) * 100); ?>%;
            height: 18px;
            background-color: #2196F3;
        }

        .bar-3 {
            width: <?php echo round(($n3 / $n) * 100); ?>%;
            height: 18px;
            background-color: #00bcd4;
        }

        .bar-2 {
            width: <?php echo round(($n2 / $n) * 100); ?>%;
            height: 18px;
            background-color: #ff9800;
        }

        .bar-1 {
            width: <?php echo round(($n1 / $n) * 100); ?>%;
            height: 18px;
            background-color: #f44336;
        }

        /* Responsive layout - make the columns stack on top of each other instead of next to each other */
        @media (max-width: 400px) {
            .side,
            .middle {
                width: 100%;
            }

            /* Hide the right column on small screens */
            .right {
                display: none;
            }
        }

        .fixed-scroll {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #f1f1f1;
            z-index: 1000;
        }

        h1,
        h2 {
            color: #ffcc00;
            /* Yellow color */
            text-align: center;
            margin-top: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        li {
            display: inline-block;
            margin: 10px;
            padding: 15px;
            border: 2px solid #ffcc00;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(0.9);
            transition: transform 0.3s ease-in-out;
            background-color: #fff;
            text-align: center;
        }

        li:hover {
            transform: scale(1.1);
        }

        .ingredient-icon {
            font-size: 36px;
            color: #ffcc00;
            transition: transform 0.3s ease-in-out;
        }

        .ingredient-icon:hover {
            transform: rotate(360deg);
        }

        .video-container {
            max-width: 1000px;
            margin: 20px auto;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #ffcc00;
            /* Yellow color */
        }

        video {
            width: 100%;
            height: 600px;
            /* Ajustez la hauteur selon vos besoins */
            display: block;
        }

        <!-- Ajoutez cette partie à la section de styles -->

    .comment-container {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 15px;
    }

    .comment-bubble {
        position: relative;
        background-color: #f1f1f1;
        border-radius: 10px;
        padding: 10px;
        max-width: 70%;
        margin-left: 10px; /* Ajoutez une marge à gauche pour l'écart par rapport aux autres éléments */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .comment-bubble:before {
        content: '';
        position: absolute;
        top: 50%;
        left: -20px; /* Ajustez la position par rapport à la gauche */
        border: 10px solid transparent;
        border-right-color: #f1f1f1;
        border-left: 0;
        margin-top: -10px;
        margin-left: -10px;
    }

    .comment-text {
        margin: 0;
    }
</style>
                     <html lang="en">
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower">
                        <style>
                           p {
                                 font-family: 'Indie Flower', cursive;
                           }
                           table {
                           background-color: #CEE452; 
                              }

                              /* Centrer le texte dans les cellules du tableau */
                              table td {
                                 text-align: center;
                              }
                        </style>
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
                           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
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
                                          <div class="logo"><a href="index.html"><img src="images/nnn.png" width="250px"></a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                                          <!-- logo section end -->
                                          <div class="page-heading header-text">
                                             <div class="container">
                                                <div class="row">
                                                   <div class="col-lg-12" align="center">
                                                      <span class="buy_bt"><a href="index.html">Home</a>  >  <a href="#">Shop</a>  > <a href="#">Reclamation</a> </span>
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
                                                      <a href="index.html">Home</a>
                                                      <a href="fashion.html">Fashion</a>
                                                      <a href="electronic.html">Electronic</a>
                                                      <a href="jewellery.html">Jewellery</a>
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




                                       

                                       <!--houneee-->
                                       <center>
                                          <h1><i>Liste de recettes </i></h1>
                                       </center>
                                       <table border="1" align="center" width="70%">
                                             <?php    
                                                foreach ($tableau as $recette) {
                                             ?>
                                                
                                                <tr>
                                                      <td> 
                                                         <img src= "<?= $recette['url']; ?>"  alt='image recette' width ="300",height="300",align ="center" >
                                                            <br>
                                                               <p><?= $recette['description']; ?></p>
                                                            </br>
                                                            <!-- Ajoutez un champ caché pour la note -->
                                                            <input type="hidden" name="note" value="0" id="ratingInput">
                                                            
                                                            
                                                            <form action="" method="POST">
                                                               
                                                               <div class="rating" data-recette-id="<?= $recette['id']; ?>">
                                                               <div class="stars">
                                                                  <i class="fa fa-star star" data-star-value="1"></i>
                                                                  <i class="fa fa-star star" data-star-value="2"></i>
                                                                  <i class="fa fa-star star" data-star-value="3"></i>
                                                                  <i class="fa fa-star star" data-star-value="4"></i>
                                                                  <i class="fa fa-star star" data-star-value="5"></i>
                                                               </div>
                                                               
                                                               <a href="#">Voir les avis.</a>
                                                               
                                                   
                                                               
                                                               
                                                                  


                                                               </script>   
                                                               <!-- Barre de commentaires -->
                                                               <div class="comment-bar">
                                                               <label for="comment">Laissez un commentaire :</label>
                                                               <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
                                                               <button type="submit">Envoyer</button>
                                                               </div>
                                                                
                                                                        <?php foreach ($recette['ingredients'] as $ingredient) : ?>
                                                                        <li>
                                                                           <p><?= $ingredient; ?></p>
                                                                           
                                                                        </li>
                                                                        <?php endforeach; ?>
                                                                        <br>
                                                                           <video controls style="width: 100%; height: 800px;">
                                                                              <source src="images/recette/<?php echo $recette['video_id']; ?>" type="video/mp4">
                                                                           </video>
                                                                        </br>
                                                                     
                                                                  
                                                               </div>
                                                         </form>
                                                         </td>
                                                         <?php
                                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                               // Récupérer les données du formulaire
                                                               if (isset($_POST['comment'], $_POST['note'], $_POST['fk'])) {
                                                                  // Traitement du tableau des clés étrangères
                                                                  foreach ($_POST['fk'] as $idRecette => $fkValue) {
                                                                        $comment = $_POST['comment'][$idRecette] ?? '';
                                                                        $note = $_POST['note'][$idRecette] ?? '';

                                                                        // Créer une instance de la classe Rating avec les valeurs récupérées
                                                                        $rating = new Rating(
                                                                           null,
                                                                           $comment,
                                                                           $note,
                                                                           $fkValue
                                                                        );

                                                                                    
                                                                                    var_dump($rating);
                                                                        $new = $liste->addrating($rating);
                                                                  }

                                                                  // Redirection vers la page d'accueil après le traitement du formulaire
                                                                  header('Location: acceuil.php');
                                                                  exit; // Assurez-vous de quitter le script après la redirection
                                                               }
                                                            }
                                                         ?>



                                                   <td>

                                                      <div class="scrollable-section" style="height: 150px; overflow: auto;">

                                                   </td>

                                                </tr>
                                             <?php
                                             }
                                             ?>
                                                
                                       </table>
                                    









                                       <!-- footer section start -->
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
                                       <!-- footer section end -->
                                       <!-- copyright section start -->
                                       <div class="copyright_section">
                                          <div class="container">
                                             <p class="copyright_text">© 2023 All Rights Reserved. Design by <a href="https://html.design">TechTitans</a></p>
                                          </div>
                                       </div>
                                       <!-- copyright section end -->
                                       <!-- JavaScript files-->
                                       <script src="js/jquery.min.js"></script>
                                       <script src="js/popper.min.js"></script>
                                       <script src="js/bootstrap.bundle.min.js"></script>
                                       <script src="js/jquery-3.0.0.min.js"></script>
                                       <script src="js/plugin.js"></script>
                                       <!-- Scripts -->
                                       <script src="vendor/jquery/jquery.min.js"></script>
                                       <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                                       <script src="js/isotope.min.js"></script>
                                       <script src="js/owl-carousel.js"></script>
                                       <script src="js/counter.js"></script>
                                       <script src="js/custom.js"></script>
                                       <!-- sidebar -->
                                       <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
                                       <script src="js/custom.js"></script>
                                       <script src="./js/script.js"></script>
                                    </body>
                                 </html>
<?php
                        
                                 }
                  
               
            


?>


