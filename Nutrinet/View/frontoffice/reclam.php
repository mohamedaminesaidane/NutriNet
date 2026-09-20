<?php
include '../../Model/ReclamM.php';
include '../../Controller/ReclamController.php';
$error = "";

$reclamC = new ReclamController();

$captchaController = new CaptchaController();
$captchas = $captchaController->listCaptchas();

$randomCaptcha = getRandomCaptcha($captchas);

if (
    isset($_POST["nom"]) &&
    isset($_POST["title"]) &&
    isset($_POST["description"]) &&
    isset($_POST["email"]) &&
    isset($_POST["category"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["title"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["category"])
    ) {
        $reclam = new Reclam(
            null,
            $_POST["nom"],
            $_POST["title"],
            $_POST["description"],
            $_POST["email"],
            $_POST["category"],
        );

        $currentDate = date("Y-m-d");
        $reclam->setDateResponse($currentDate);

        $reclam->setStatus("New");

        $reclamC->addReclam($reclam);

        header('Location: UserReclam.php');
    } else {
        $error = "Missing input";
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
      <link rel="stylesheet" href="css/product.css">
<!--------------------------------------------------------------------->
      <script>
  var audio = new Audio();

  function playRandomMusic() {
    <?php
      $musicFolder = './music/';
      $musicFiles = glob($musicFolder . '*.mp3');
      $randomMusic = $musicFiles[array_rand($musicFiles)];
    ?>
     audio = new Audio('<?php echo $randomMusic; ?>');
    audio.play();
  }

  function toggleMusic() {
    if (audio.paused) {
      audio.play();
      document.getElementById('volumeUpIcon').style.display = 'inline-block';
      document.getElementById('volumeMuteIcon').style.display = 'none';
    } else {
      audio.pause();
      document.getElementById('volumeUpIcon').style.display = 'none';
      document.getElementById('volumeMuteIcon').style.display = 'inline-block';
    }
  }

  playRandomMusic();
</script>

<style>
#musicButton {
  position: fixed;
  top: 10px;
  left: 10px;
  width: 73px; 
  height: 76px;
  background-color: #CEE452;
  color: #fff;
  border: 1px solid #000;
  cursor: pointer;
  border-radius: 50%;
  overflow: hidden;
}
#volumeMuteIcon {
  display: none;
}

#musicButton:hover {
  background-color: #9CAE2D;
}

</style>
<!--------------------------------------->


<style>
        body, ::backdrop {
            background: #fff;
        }
        #fullscreen-button {
            position: fixed;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.05);
            border: 0;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-sizing: border-box;
            transition: transform .3s;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #fullscreen-button:hover {
            transform: scale(1.125);
        }
        #fullscreen-button svg:nth-child(2) {
            display: none;
        }
        [fullscreen] #fullscreen-button svg:nth-child(1) {
            display: none;
        }
        [fullscreen] #fullscreen-button svg:nth-child(2) {
            display: inline-block;
        }
    </style>
    <button id="fullscreen-button">
    <svg viewBox="0 0 24 24">
        <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
    </svg>
    <svg viewBox="0 0 24 24">
        <path d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
    </svg>
</button>
<script>
  if (document.fullscreenEnabled) {
      const fullscreen_button = document.createElement("button");
      fullscreen_button.setAttribute('id','fullscreen-button');
      fullscreen_button.addEventListener("click", toggle_fullscreen);
      fullscreen_button.innerHTML  = `
          <svg viewBox="0 0 24 24">
              <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 
            7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
          </svg>
          <svg viewBox="0 0 24 24">
              <path d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 
            11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
          </svg>
      `;
      document.body.appendChild(fullscreen_button);
  }

  function toggle_fullscreen() {
      if (!document.fullscreenElement) {
          document.body.requestFullscreen();
          document.body.setAttribute("fullscreen","");
      } else {
          document.exitFullscreen();
          document.body.removeAttribute("fullscreen");
      }
  }
</script>

<!------------------------------------------------>
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
         <!-- banner section start -->
         <!-- banner section end -->
         <div>&nbsp;</div>
      </div>
      <!-- banner bg main end -->
      <div>&nbsp;</div>
      <div>&nbsp;</div>






<button id="musicButton" onclick="toggleMusic()">
   <i id="volumeMuteIcon" class="fa fa-volume-off fa-4x" aria-hidden="true"></i>
  <i id="volumeUpIcon" class="fa fa-volume-up fa-4x" aria-hidden="true"></i>
</button>












      <!-- Reclamation here -->
      <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-8">
            <h4 class="reclam_title">SERVICE CLIENT</h4>
            <h2 class="">ENVOYEZ UN MESSAGE</h2>
            <form  method="POST" class="form" >
                <div class="form-group">
                    <label for="nom">Your Name:</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="title">Reclamation Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="category">Choose Category:</label>
                    <select class="form-control" id="category" name="category">
                        <option value="seances_coaching">Séances de coaching</option>
                        <option value="seances_recette">Les recette</option>
                        <option value="produits">Produits</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Reclamation Description:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">Please enter a valid email address.</small>
                </div>
                <div class="form-group">
    <img src="<?php echo $randomCaptcha['img']; ?>" alt="Captcha Image"><br><br>
    <input type="text" id="captcha_input" name="captcha_input" >
   <!-- <button type="button" id="refresh_captcha" onclick="">-->
    <i class="fa fa-refresh"></i></button><br></a>
    <label for="captcha_input">Enter the text from the image</label>
    <br>
    <button type="submit" class="btn btn-primary" style="background-color: #CEE452; color: #fff;" onclick="return validateReclamationForm('<?php echo $randomCaptcha['captcha']; ?>')">Envoyer Reclamation</button>
   </div> 
            </form>
        </div>
    </div>
</div>
      <!-- End of Reclamation Form -->

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
   <p>Translate:</p>
    <div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element');}</script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>
