<?php
session_start();
include_once "pConnect.php";
include_once "pAssetConfig.php";

if(!isset($_SESSION["login"]))
	header("Location:pLogin.php");

$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
$user = $conn->query("SELECT * FROM users WHERE id='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
$milliseconds = round(microtime(true));
$food24 = ($assets["kartopu"] + $assets["boncuk"] + $assets["sarikiz"] + $assets["simental"]) * COW_DAY_FOOD + ($assets["dudu"] + $assets["pamuk"] + $assets["pofuduk"] + $assets["suslu"]) * CHICKEN_DAY_FOOD;
$timeDiff = $milliseconds - $assets["foodTimer"];
$foodLost = ($timeDiff / (24 * 60 * 60)) * $food24;
$conn->query("UPDATE assets SET food=food-'".$foodLost."', foodTimer='".$milliseconds."' WHERE userid='".$_SESSION["id"]."'");

$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();

if($assets["food"] < 0){
	$conn->query("UPDATE assets SET food='".(0)."', kartopu='".(0)."', kartopuDetails='', boncuk='".(0)."', boncukDetails='', sarikiz='".(0)."', sarikizDetails='', simental='".(0)."', simentalDetails='', dudu='".(0)."', duduDetails='', pamuk='".(0)."', pamukDetails='', pofuduk='".(0)."', pofudukDetails='', suslu='".(0)."', susluDetails='' WHERE userid='".$_SESSION["id"]."'");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Ana Sayfa</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/green.css" rel="stylesheet">
    <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="css/jqvmap.min.css" rel="stylesheet"/>
    <link href="css/daterangepicker.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	  
        <?php
			include "pLeftPane.php";
		?>

		<?php
			include "pTopPane.php";
		?>
		
		<?php
			if(isset($_GET["tab"])){
				switch($_GET["tab"]){
					
					case "market":
						include "pMarket.php";
					break;
					
					case "store":
						include "pStore.php";
					break;
					
					case "ranking":
						include "pRanking.php";
					break;
					
					case "animals":
						include "pAnimals.php";
					break;
					
					case "profile":
						include "pProfile.php";
					break;

                    case "chat":
                        include "pChat.php";
                    break;

					default:
						include "pMainPage.php";
					break;
					
				}
			}else{
				include "pMainPage.php";
			}

		?>
		
        <?php
			include "pFooterPane.php";
		?>

      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/custom.min.js"></script>
	
  </body>
</html>
