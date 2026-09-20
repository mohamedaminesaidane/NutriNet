<?php 
	include "../../Controller/produitc.php";
    include '../../Model/produit.php';
include '../../Model/categorie.php';
$catc = new CategorieC();
$c = new ProduitC();
$cats = $catc->affichcat();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_cat"])) {
        $id_cat = $_POST["id_cat"];
        $list = $catc->affichprod($id_cat);
    }
}else {
   // If the form is not submitted, get and display all products
   $list = $c->listProduits();
}
   // Utilisez la classe ProduitC

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


      <style>
        body, ::backdrop {
            background: #fff;
        }
        #fullscreen-button {
            position: absolute;
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
<link rel="stylesheet" href="css/product.css">
<style>

        .product {
          border: 8px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin: 40px;
            background-color: #fff;
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product img {
          width: 100%;
            height: 300px; /* Set a fixed height for better aesthetics */
            object-fit: cover;
            border-bottom: 1px solid #ddd;

        }

        .product-content {
            padding: 20px;
            
        }

        h2 {
            color: #CEE452;
            margin-top: 0;
        }

        p {
            margin-bottom: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color:red;
        }
        .date {
          font-weight: bold;

            color: #0000FF ;
        }



    </style>
   </head>
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
                           <li><a href="#">Customer Service</a></li>
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
            
    
         <!-- header section end -->
         <!-- banner section start -->
         <!-- banner section end -->
	   <div>&nbsp;</div>
   </div>
      <!-- banner bg main end -->
      <div>&nbsp;</div>
      <div>&nbsp;</div>
 </div>
 <h1 align="center">Recherche par categorie:</h1>
<div class="input-box" align="center">
	<form method="POST" action="">
		<select name="id_cat" id="cat">
			<?php foreach ($cats as $cat) { ?>
				<option value="<?= $cat['id_cat']; ?>"><?= $cat['nom']; ?></option>
			<?php } ?>
		</select>
		<input type="submit" value="Recherche" name="search">
	</form>		
</div>
<br>
<?php if (isset($list)) { ?>
<div class="container">
    <div class="row">
        <?php foreach ($list as $produit): ?>
            <div class="col-md-4 mb-4">
                <div class="product">
             
                <?php
                        $imagePath = '../backoffice/pages/image/' . $produit['image'];
                        echo '<img src="' . $imagePath . '" class="card-img-top" alt="Product Image">';
                    ?>

                    <div class="card-body">
                        <h2 class="card-title"><?PHP echo $produit['nom']; ?></h2>
                        <p class="date">description: <?PHP echo $produit['description']; ?></p>

                        <p class="date">Quantite: <?PHP echo $produit['nombre']; ?></p>
                        <p class="price">Prix:  <?PHP echo $produit['prixVente']; ?> TND</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php } ?>










<div>&nbsp;</div>
      <div>&nbsp;</div>
<div>&nbsp;</div>
      <div>&nbsp;</div>
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
                  <li><a href="#">Customer Service</a></li>
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
      <p>Translate:</p>
    <div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element');}</script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   </body>
</html>