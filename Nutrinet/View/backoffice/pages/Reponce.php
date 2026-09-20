<?php
include '../../../Controller/ReclamController.php';
include '../../../Model/ReclamM.php';

$reclamController = new ReclamController();
$reclams = $reclamController->listReclams();

$reclamC = new ReclamController();
$reclamSE = $reclamC->listReclams();

$order = isset($_GET['order']) ? $_GET['order'] : 'asc';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';


?>

<?php
 
//include '../../../Controller/ResponseC.php';
include '../../../Model/ResponseM.php';

$error = "";
$responseC = new ResponseController();

if (
    isset($_POST["title"]) &&
    isset($_POST["mail"]) &&
    isset($_POST["message"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["id_reclam"])
) {
    if (
        !empty($_POST["title"]) &&
        !empty($_POST["mail"]) &&
        !empty($_POST["message"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["id_reclam"])
    ) {
        $response = new Response(
            null,
            $_POST["title"],
            $_POST["mail"],
            $_POST["message"],
            null,
            $_POST["nom"],
            $_POST["id_reclam"],
        );
        $currentDate = date("Y-m-d");

        $response->setdate($currentDate);

        $responseC->addResponse($response);


       /* -------------------M5-----------
        $to = $_POST['clientmail'];
        $subject = $_POST['title'];
        $message = $_POST['message'];
        $from = "nagati.najd@esprit.tn";
    
        $headers = "From: $from\r\n";
        $headers .= "Reply-To: $from\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        mail($to, $subject, $message, $headers);
                    <div style='display: block; margin-left: auto; margin-right: auto; width: 45%;'>
                <a href='http://localhost/najd/View/frontoffice/reclam.php'><img src='../../frontoffice/images/nnn.png' width='250px'></a>
            </div>
        //-----------------------------------------------*/
    $customerName = $_POST['clientnom'];
    $yourName = $_POST['nom'];
    $orderReclamation = encryptId($_POST["id_reclam"]);
    $clientMail = $_POST['clientmail'];
    $title = "Respond: " . $_POST['title'] . " Reclamation - Ref #$orderReclamation";
    $message=$_POST["message"];
    $mail = "
    <html>
    <body style =' font-family: 'Arial', sans-serif; background-color: #ffffff; color: #ffffff; margin: 20px;'>
    
    <div  style=' max-width: 600px; margin: 0 auto; padding: 20px; background-color: #6bc743; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
    <div class='logo' style='  display: block; margin-left: auto; margin-right: auto; width: 40%;'><a href='index.html'><img src='https://lh3.googleusercontent.com/drive-viewer/AK7aPaCwgmI5_VhmJmBca8Jb0EwWMF8qhYkHWp6DaQKzCkDFz_8mdOeKX1HBtHRXxvGaTZR_btQAcnwn3MC5bw6pnPOHi-Ex=s2560' alt='Logo' width='250px'></a></div>

            <div  style='color: #ffffff;' >
            <b>
                <h2>Dear $customerName,</h2>
                <p  style='line-height: 1.5;'>I hope this message finds you well. I'm $yourName from Nutrinet's Customer Support.</p>
                <p  style='line-height: 1.5;'>Apologies for any inconvenience. We're actively investigating and resolving your #$orderReclamation.</p>
                <p  style='line-height: 1.5;'>$message</p>
                <p  style='line-height: 1.5;'>Your patience is highly appreciated. If you have additional details to share, please feel free to reply
                    to this email.</p>
                <br>
            </b>
            </div>
            <div style=' margin-top: 10px; font-style: italic; color: #000000;'>
                <p style='line-height: 1.5;'>Best regards,<br>
                    $yourName<br>
                    Nutrinet Support Team</p>
            </div>
        </div>
    </body>
    
    </html>
";

    $from = "nagati.najd@esprit.tn";

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($clientMail, $title, $mail, $headers);


//----------------------
       //  header('Location: Reponce.php?order=asc&sort=ID_reclam&tab=tab1');
    } else {
        $error = "Missing input";
    }
}
?>
<?php
$responseController = new ResponseController();
$responseL = $responseController->listResponses();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    NutriNet Admin section
  </title>
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <script src="../../frontoffice/js/script.js"></script>
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

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
        target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">NutriNet Admin section</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link text-white " href="../pages/chart_data.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/ajoutprod.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Ajout produit</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/produit.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Produit</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/categories.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/ajoutcat.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Ajouter Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary"
            href="../pages/Reponce.php?order=asc&sort=ID_reclam&tab=tab1">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Reclamation</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="../pages/tables.PHP">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="../pages/billing.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
              </div>
              <span class="nav-link-text ms-1">Commandes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="../pages/listCoach.PHP">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Coach</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="../pages/listSC.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
              </div>
              <span class="nav-link-text ms-1">Seanse de coaching</span>
            </a>
          </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-primary mt-4 w-100"
          href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree"
          type="button">Documentation</a>
        <a class="btn bg-gradient-primary w-100"
          href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to
          pro</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Reclamation</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Reclamation</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline"> </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center"> </li>

            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg"
                          class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                          xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background"
                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                    opacity="0.593633743"></path>
                                  <path class="color-background"
                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                  </path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl">
                  <img src="../assets/img/illustrations/pattern-tree.svg"
                    class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                  <span class="mask bg-gradient-dark opacity-10"></span>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="card"> </div>
                </div>
                <div class="col-md-6 col-6">
                  <div class="card"> </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row align-items-left">
                    <!-- Title: Reclamation -->
                    <div class="col-md-1">
                      <h6 class="mb-0">Reclamation</h6>
                    </div>

                    <!-- Search input -->
                    <div class="col-md-9 text-center">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                        <button class="btn bg-gradient-dark mb-0" onclick="searchTable()">Search</button>
                      </div>
                    </div>

                    <!-- Ajouter Reclamation button -->
                    <div class="col-md-2 text-right">
                      <a class="btn bg-gradient-dark mb-0" href="../../frontoffice/reclam.php" target="_blank">
                        <em class="material-icons text-sm">add</em> Ajouter Reclamation
                      </a>
                    </div>
                  </div>

                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4"> </div>
                    <div class="col-md-6"> </div>
                  </div>
                </div>



                <!------------------------------------------------------------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------------------------------------------------------->



                <div class="card-header pb-0 px-3">
                  <div class="card-body pt-4 p-3">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <tr>
                          <th><a href="<?= generateR('ID_reclam', 'tab1'); ?>" style="color: black;">Id Reclam
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'ID_reclam') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Nom', 'tab1'); ?>" style="color: black;">Nom
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'Nom') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('title', 'tab1'); ?>" style="color: black;">Title
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'title') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('description', 'tab1'); ?>" style="color: black;">Description
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'description') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Mail', 'tab1'); ?>" style="color: black;">Email
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'Mail') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Category', 'tab1'); ?>" style="color: black;">Category
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'Category') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('date', 'tab1'); ?>" style="color: black;">Date Response
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'date') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Status', 'tab1'); ?>" style="color: black;">Status
                              <?php if (($_GET['tab']=='tab1')&& $sort === 'Status') {
                echo (($order === 'asc')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th>Respond</th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>

                        <?php foreach (sortR($reclams, 'tab1')  as $reclam) {?>
                        <tr>
                          <td>
                            <div>
                              <?= $reclam['ID_reclam'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $reclam['Nom'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $reclam['title'];?>
                            </div>
                          </td>
                          <td>
                            <div class="ReclamD">
                              <?= $reclam['description'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $reclam['Mail'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $reclam['Category'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $reclam['date'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $reclam['Status'];?>
                            </div>
                          </td>
                          <td>
                            <div>


                              <div style="display: flex;  justify-content: center;">
                                <button class="btn bg-gradient-dark mb-0  "
                                  onclick="showResponseForm('responseForm<?= $reclam['ID_reclam'];?>')">
                                  <i class="material-icons text-sm me-2">mail</i>Message
                                </button>
                              </div>
                              <div>
                                <div id="responseForm<?= $reclam['ID_reclam'];?>" style="display:none;"
                                  class="container mt-4 response-form">

                                  <form id="form<?= $reclam['ID_reclam'];?>" method="post">
                                    <div class="form-group">
                                      <label for="form<?= $reclam['ID_reclam'];?>_title">Title:</label>
                                      <input type="text" class="form-control" id="form<?= $reclam['ID_reclam'];?>_title"
                                        name="title">
                                    </div>
                                    <div class="form-group">
                                      <label for="form<?= $reclam['ID_reclam'];?>_mail">Email:</label>
                                      <select class="form-control" id="form<?= $reclam['ID_reclam'];?>_mail"
                                        name="mail">
                                        <option value="nagati.najd@esprit.tn">nagati.najd@esprit.tn</option>
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="form<?= $reclam['ID_reclam'];?>_message">Message:</label>
                                      <textarea class="form-control" id="form<?= $reclam['ID_reclam'];?>_message"
                                        name="message"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="form<?= $reclam['ID_reclam'];?>_nom">Nom:</label>
                                      <input type="text" class="form-control" id="form<?= $reclam['ID_reclam'];?>_nom"
                                        name="nom">
                                    </div>
                                    <div class="form-group">
                                      <label for="form<?= $reclam['ID_reclam'];?>_id_reclam">ID Reclam:</label>
                                      <input type="text" class="form-control"
                                        id="form<?= $reclam['ID_reclam'];?>_id_reclam" name="id_reclam"
                                        value="<?= $reclam['ID_reclam'];?>" readonly>
                                    </div>
                                    <div class="form-group" hidden>
                                      <input type="text" class="form-control" id="clientmail" name="clientmail"
                                        value="<?= $reclam['Mail'];?>" readonly>
                                    </div>
                                    <div class="form-group" hidden>
                                      <input type="text" class="form-control" id="clientnom" name="clientnom"
                                        value="<?= $reclam['Nom'];?>" readonly>
                                    </div>

                                    <button type="submit" class="btn bg-gradient-primary"
                                      onclick="return validateResponseForm('form<?= $reclam['ID_reclam'];?>')">Send
                                      Message</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div>
                              <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                href="../../../Controller/deletereclam.php?ID_reclam=<?= encryptId($reclam['ID_reclam']);?>">
                                <i class="material-icons text-sm me-2">delete</i>Delete
                              </a>
                            </div>
                          </td>
                          <td>
                            <div>
                              <a class="btn btn-link text-warning text-gradient px-3 mb-0"
                                href="UpdateReclam.php?ID_reclam=<?= encryptId($reclam['ID_reclam']);?>">
                                <i class="material-icons text-sm me-2">update</i>Update
                              </a>

                            </div>
                          </td>
                        </tr>
                        <?php }?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row align-items-left">
                    <!-- Title: Reclamation -->
                    <div class="col-md-1">
                      <h6 class="mb-0">Responses</h6>
                    </div>

                    <!-- Search input -->
                    <div class="col-md-9 text-center">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." id="searchInput2">
                        <button class="btn bg-gradient-dark mb-0" onclick="searchTable2()">Search</button>
                      </div>
                    </div>
                    <div class="col-md-2 text-right">
                      <button class="btn bg-gradient-dark mb-0" onclick="showResponseForm('responseForm')">
                        <!-- Removed dynamic ID -->
                        <i class="material-icons text-sm me-2">mail</i>Message
                      </button>



                    </div>
                  </div>
                  <div id="responseForm" style="display:none;" class="container mt-4 response-form">
                    <form id="responseForm" method="post">
                      <div class="form-group">
                        <label for="responseForm_id_reclam">Select ID Reclam:</label>
                        <select class="form-control" id="responseForm_id_reclam" name="id_reclam">
                          <?php foreach ($reclamSE as $reclam2) { ?>
                          <option value="<?= $reclam2['ID_reclam']; ?>">
                            <?= $reclam2['ID_reclam']; ?>
                          </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="responseForm_title">Title:</label>
                        <input type="text" class="form-control" id="responseForm_title" name="title">
                      </div>
                      <div class="form-group">
                        <label for="responseForm_mail">Email:</label>
                        <select class="form-control" id="responseForm_mail" name="mail">
                          <option value="nagati.najd@esprit.tn">nagati.najd@esprit.tn</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="responseForm_message">Message:</label>
                        <textarea class="form-control" id="responseForm_message" name="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="responseForm_nom">Nom:</label>
                        <input type="text" class="form-control" id="responseForm_nom" name="nom">
                      </div>
                      <button type="submit" class="btn bg-gradient-primary"
                        onclick="return validateResponseForm('responseForm')">Send Message</button>
                    </form>
                  </div>

                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4"> </div>
                    <div class="col-md-6"> </div>
                  </div>
                </div>

                <div class="card-header pb-0 px-3">
                  <div class="card-body pt-4 p-3">
                    <div class="table-responsive custom-table">
                      <table class="table table-bordered table-hover">
                        <tr>
                          <th><a href="<?= generateR('ID_Response', 'tab2'); ?>" style="color: black;">Id
                              Response
                              <?php if (($_GET['tab']=='tab2')&& $sort === 'ID_Response') {
                echo (($order === 'asc')&&($_GET['tab']=='tab2')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Title', 'tab2'); ?>" style="color: black;">Title
                              <?php if (($_GET['tab']=='tab2')&& $sort === 'Title') {
                echo (($order === 'asc')&&($_GET['tab']=='tab2')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Message', 'tab2'); ?>" style="color: black;">Message
                              <?php if (($_GET['tab']=='tab2')&& $sort === 'Message') {
                echo (($order === 'asc')&&($_GET['tab']=='tab2')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Date', 'tab2'); ?>" style="color: black;">Date
                              Response
                              <?php if (($_GET['tab']=='tab2')&& $sort === 'Date') {
                echo (($order === 'asc')&&($_GET['tab']=='tab2')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Mail', 'tab2'); ?>" style="color: black;">Mail
                              <?php if (($_GET['tab']=='tab2')&& $sort === 'Mail') {
                echo (($order === 'asc')&&($_GET['tab']=='tab2')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('Nom', 'tab2'); ?>" style="color: black;">Nom
                              <?php if (($_GET['tab']=='tab2')&& $sort === 'Nom') {
                echo (($order === 'asc')&&($_GET['tab']=='tab2')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th><a href="<?= generateR('ID_reclam', 'tab2'); ?>" style="color: black;">Id Reclam
                              <?php if (($_GET['tab']=='tab2')&& $sort === 'ID_reclam') {
                echo (($order === 'asc')&&($_GET['tab']=='tab2')) ? '<i class="material-icons text-sm me-2">keyboard_arrow_up</i>' : '<i class="material-icons text-sm me-2">keyboard_arrow_down</i>';
            } else {
                echo '<i class="material-icons text-sm me-2">unfold_more</i>';
            } ?>
                            </a></th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>
                        <?php foreach (sortR($responseL, 'tab2') as $response) {?>
                        <tr>
                          <td>
                            <div>
                              <?= $response['ID_Response'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $response['Title'];?>
                            </div>
                          </td>
                          <td>
                            <div class="ReclamD">
                              <?= $response['Message'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $response['Date'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $response['Mail'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $response['Nom'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <?= $response['ID_reclam'];?>
                            </div>
                          </td>
                          <td>
                            <div>
                              <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                href="../../../Controller/deleteresponse.php?ID_Response=<?= encryptId($response['ID_Response']);?>">
                                <i class="material-icons text-sm me-2">delete</i>Delete
                              </a>
                            </div>
                          </td>
                          <td>
                            <div>
                              <a class="btn btn-link text-warning text-gradient px-3 mb-0"
                                href="UpdateResponse.php?ID_Response=<?= encryptId($response['ID_Response']);?>">
                                <i class="material-icons text-sm me-2">update</i>Update
                              </a>
                            </div>
                          </td>
                        </tr>
                        <?php }?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>

        <footer class="footer py-4  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4"> </div>
              <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                  <li class="nav-item"> </li>
                  <li class="nav-item"> </li>
                  <li class="nav-item"> </li>
                  <li class="nav-item"> </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary"
              onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
            onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
            onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
            onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free
          Download</a>
        <a class="btn btn-outline-dark w-100"
          href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
            data-icon="octicon-star" data-size="large" data-show-count="true"
            aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
            class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
            class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>