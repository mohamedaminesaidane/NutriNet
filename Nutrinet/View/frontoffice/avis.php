<?php
include '../../Controller/recetteC.php';
include '../../Model/recette.php';
include "../../Controller/ratingConx.php";

$conx = new recetteC();
$liste = new ratingConx();

$n5 = $n4 = $n3 = $n2 = $n1 = 0;

if (isset($_GET['id'])) {
    $recette = $conx->showrecette($_GET['id']);
    $moyenne = $liste->MoyRecette($recette['id']);
    $ratings = $liste->recherche($recette['id']);
    $rs = $liste->recherche($recette['id']);

    $n = count($ratings);
    foreach ($ratings as $r) {

        switch ($r['note']) {

            case 5:
                $n5++;
                break;
            case 4:
                $n4++;
                break;
            case 3:
                $n3++;
                break;
            case 2:
                $n2++;
                break;
            case 1:
                $n1++;
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Autres balises meta et liens -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Vos autres balises de style -->
</head>

    
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
            display: table;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
        }

        li {
            display: inline-block;
            margin: 20px;
            padding: 25px;
            border: 8px solid #ffcc00;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(0.9);
            transition: transform 0.3s ease-in-out;
            background-color: #fff;
            /*text-align: center;*/
        }

        li:hover {
            transform: scale(1.1);
        }

        .ingredient-icon {
            font-size: 46px;
            color: #ffcc00;
            transition: transform 0.3s ease-in-out;
        }

        .ingredient-icon:hover {
            transform: rotate(360deg);
        }

        .video-container {
            width : 3000px;
            height :800px;
            margin: 20px auto;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #ffcc00;
            /* Yellow color */
        }

        video {
            width: 1800px;
            /*height: 800px;
            /* Ajustez la hauteur selon vos besoins */
            display: block;
            
            margin: 0 auto;

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
    ingred{
  text-align: center;
}
</style>


       
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>

    
        <span class="heading">User Rating</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p><?php echo ($moyenne); ?> average based on <?php echo ($n); ?> reviews.</p>
        <hr style="border:10px solid #f1f1f1">

        <div class="row" id="5">
            <div class="side">
                <div>5 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-5"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo ($n5); ?></div>
            </div>
        </div>

        <div class="row" id="4">
            <div class="side">
                <div>4 star</div>
            </div>

            <div class="middle">
                <div class="bar-container">
                    <div class="bar-4"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo ($n4); ?></div>
            </div>
        </div>

        <div class="row" id="4">
            <div class="side">
                <div>3 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-3"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo ($n3); ?></div>
            </div>
        </div>

        <div class="row" id="2">
            <div class="side">
                <div>2 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-2"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo ($n2); ?></div>
            </div>
        </div>

        <div class="row" id="1">
            <div class="side">
                <div>1 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-1"></div>
                </div>
            </div>
            <div class="side right">
                <div> <?php echo ($n1); ?> </div>
            </div>
        </div>

        <?php
          if (isset($_GET['id'])) {
              ?>
              <h1>les ingrédients</h1>
              
                <ul >
                    <?php foreach ($recette['ingredients'] as $ingredient) : ?>
                        <li>
                            <i class="fas fa-carrot ingredient-icon"></i>
                            <?= trim($ingredient) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
              

              <div class="video-container">
                  <video controls >
                      <source src="images/recette/<?php echo $recette['video_id']; ?>" type="video/mp4">
                  </video>
              </div>

              <?php
          }
          

foreach ($rs as $R) {
?>
    <div class="comment-container" style="display: flex; justify-content: flex-start; margin-bottom: 15px;">
        <div class="comment-bubble" style="position: relative; background-color: #ffd700; /* Fond jaune */ border-radius: 10px; padding: 10px; max-width: 70%; margin-left: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <p class="comment-text" style="margin: 0; color: #0000ff; /* Texte bleu */"><?= $R['commentaire']; ?></p>
        </div>
    </div>
<?php
}
?>

        

    

        
</body>

</html>
