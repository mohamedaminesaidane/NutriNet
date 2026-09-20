
<?php
include_once "../../controller/userC.php";
include_once "../../model/user.php";

$userC = new UserC();

session_start();

$error = null;




if (
  isset($_POST['name']) &&
  isset($_POST['phone']) &&
  isset($_POST['email']) &&
  isset($_POST['password']) &&
  isset($_POST['address']) &&
  isset($_POST['role'])
) {
  
  if(empty($_POST['name'] )||empty($_POST['phone'] )||empty($_POST['email'] )||empty($_POST['password'] )||empty($_POST['address'] )||empty($_POST['role'] ))
  {
    $error = "field are empty";
  }
  else
  {
    if (strlen($_POST['name']) > 3){
      
    if (strlen($_POST['password']) > 8){
      if (preg_match('/^\d{8}$/', $_POST['phone'] )) {  
        $user = new User(null , $_POST['name'], $_POST['phone'],$_POST['email'],$_POST['password'],$_POST['address'],$_POST['role'],null);
    
      $userC->adduser($user);
      $_SESSION['name'] = $_POST['name'];
      setcookie('name', $_POST['name'], time() + (86400 * 30), "/");
      //header('Location: sign-in.php');
      } else {
        $error =  'Input is not a number with 8 digits';
      }
    }
    else{
      $error = "password must be > 8";
    }
      
    }
    else{
      $error = "name must be > 5";
    }
    
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





 <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="css/nice-select.css" type="text/css">
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="css/stylee.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="../../view/backoffice/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../../view/backoffice/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="../../view/backoffice/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="../../view/backoffice/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />


<script src="https://www.google.com/recaptcha/api.js" async defer></script>


    </head>

<body>
   
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
                     <div class="logo" ><a href="indexx.html"><img src="images/nnn.png" width="250px"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
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
         <div>
         <div class="container">
            <main class="main-content  mt-0">
        <section>
        <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient" align="center">REGISTER</h3>
        
                  <div class="card-body">
                <form  role="form text-left" method="post" enctype="multipart/form-data" autocomplete="on">
                 
                <div class="mb-3">
  <label for="photo" class="form-label">Upload a photo:</label>
  <input type="file" class="form-control" id="photo" name="photo">
</div>
                  <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                  </div>
                  <div class="mb-3">
                    <input type="number" name="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="Phone-addon">
                  </div>
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="address" class="form-control" placeholder="address" aria-label="address" aria-describedby="address-addon">
                  </div>
                  <div class="mb-3">
                  <select name="role" class="form-control" aria-label="role" aria-describedby="role-addon">
                  <option value="User" selected>User</option>
                  <option value="Admin">Admin</option>
                  </select>
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="confirmpassword" class="form-control" placeholder="confirm Password" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <div align="center" class="g-recaptcha" data-sitekey="6Leet7klAAAAAOdZ8YQQcd1bThY7R9piJCFbUgXA"></div>
                             <br>   
                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree the <a href="javascript:;" class="text-info text-gradient font-weight-bold">Terms and Conditions</a>
                    </label>
                  </div>
                  <div class="text-center">
                    <button name="signup" type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign up</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Already have an account? <a href="sign-in.php" class="text-info text-gradient font-weight-bold">Sign in</a></p>
                </form>
              </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

                </section>
</main>
            </div>
</div>







         
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"> Get Started  <br>Your favorite shopping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item ">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"><img src="images/ppp.png" width="250px">
                              <div class="buynow_bt"><a href="product-details.html">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"><img src="images/p.png" width="250px">
                              <div class="buynow_bt"><a href="product.html">Buy Now</a></div>
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
      </div>





















      
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Creatine</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 130DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre1.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 110DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre2.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 180DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre3.jpg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital"> Vitamines</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit1.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit2.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit3.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Whey Protein</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro1.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro2.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro3.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- fashion section end -->
      <!-- electronic section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Creatine</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 130DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre1.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 110DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre2.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 180DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre3.jpg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
   









































<div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital"> Vitamines</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit1.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit2.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit3.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Whey Protein</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro1.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro2.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro3.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- electronic section end -->
      <!-- jewellery  section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Creatine</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 130DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre1.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 110DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre2.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">cre3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 180DT </span></p>
                                 <div class="tshirt_img"><img src="images/cre3.jpg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital"> Vitamines</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit1.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit2.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">vit3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/vit3.jpeg"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Whey Protein</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro1</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro1.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro2</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro2.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">pro3</h4>
                                 <p class="price_text">Price  <span style="color: #262626;"> 100 DT </span></p>
                                 <div class="tshirt_img"><img src="images/pro3.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- jewellery  section end -->
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
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="../view/js/jquery-3.3.1.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/js/jquery.nice-select.min.js"></script>
    <script src="../view/js/jquery-ui.min.js"></script>
    <script src="../view/js/jquery.magnific-popup.min.js"></script>
    <script src="../view/js/mixitup.min.js"></script>
    <script src="../view/js/jquery.slicknav.js"></script>
    <script src="../view/js/owl.carousel.min.js"></script>
    <script src="../view/js/main.js"></script>


     <!--   Core JS Files   -->
  <script src="../../view/backoffice/assets/js/core/popper.min.js"></script>
  <script src="../../view/backoffice/assets/js/core/bootstrap.min.js"></script>
  <script src="../../view/backoffice/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../view/backoffice/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win || document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../view/backoffice/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>
<p>Translate:</p>
    <div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element');}</script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>








