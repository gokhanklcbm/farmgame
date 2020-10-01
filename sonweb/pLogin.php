<?php
session_start();
include_once "pConnect.php";

if(isset($_SESSION["login"]) && $_SESSION["login"] == true)
	header("Location:index.php");

$milliseconds = round(microtime(true));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Giriş </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login" background="images/login.jpg">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
	  <br><br><br><br><br><br><br>
      <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <form action="" method="POST">
                    <h1>Giriş</h1>
                    <?php
                    if(isset($_POST["login"])){

                        if($conn->query("SELECT * FROM users WHERE username='".$_POST["username"]."' AND password='".md5($_POST["password"])."' LIMIT 1")->num_rows != 0){
                            $userRow = $conn->query("SELECT * FROM users WHERE username='".$_POST["username"]."' LIMIT 1")->fetch_assoc();
                            $_SESSION["login"] = true;
                            $_SESSION["id"] = $userRow["id"];
                            $_SESSION["username"] = $userRow["username"];
                            $_SESSION["email"] = $userRow["email"];
                            header("Location:index.php");
                        }else{
                            echo "<font color='red'>Kullanıcı Adı ve/veya Şifre Hatalı</font>";
                        }

                    }
                    ?>
                    <div>
                        <input type="text" class="form-control" placeholder="Kullanıcı Adı" required="" name="username" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Parola" required="" name="password" />
                    </div>
                    <div>
                        <button type="submit" name="login" class="btn btn-default submit">Giriş Yap</button>
                        <a href="pLostPassword.php" class="to_register"> Parolamı Unuttum </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link"> Hesabınız Yok Mu?
                            <a href="#signup" class="to_register"> Kayıt Ol </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" method="POST">
              <h1>Kayıt Ol</h1>
			  <?php
				if(isset($_POST["register"])){
					if($conn->query("SELECT * FROM users WHERE username='".$_POST["username"]."' OR email='".$_POST["email"]."' LIMIT 1")->num_rows == 0){
						$failed = false;
						if(strlen($_POST["username"]) < 5){
							echo "<font color='red'>Kullanıcı Adı 5 Karakterden Küçük Olamaz!</font><br>";
							$failed = true;
						}
						if(strlen($_POST["password"]) < 6){
							echo "<font color='red'>Şifre 6 Karakterden Küçük Olamaz!</font><br>";
							$failed = true;
						}
						if(strlen($_POST["email"]) < 6){
							echo "<font color='red'>Email 6 Karakterden Küçük Olamaz!</font><br>";
							$failed = true;
						}
						if(strlen($_POST["secret"]) < 6){
							echo "<font color='red'>Gizli Soru 6 Karakterden Küçük Olamaz!</font><br>";
							$failed = true;
						}
						if(!$failed){
							$conn->query("INSERT INTO users (username, email, password, secretToken) VALUES ('".$_POST["username"]."', '".$_POST["email"]."', '".md5($_POST["password"])."', '".$_POST["secret"]."')");
							$userRow = $conn->query("SELECT * FROM users WHERE username='".$_POST["username"]."' LIMIT 1")->fetch_assoc();
							
							$startFood = 30000;
							$startGold = 2000;
							
							$kartopuCntForNewUsers = 7;
							$kartopuDetails = "";
							for($i = 0 ; $i < $kartopuCntForNewUsers ; $i++ )
								$kartopuDetails = $kartopuDetails.$milliseconds.".0;";
							
							$boncukCntForNewUsers = 1;
							$boncukDetails = "";
							for($i = 0 ; $i < $boncukCntForNewUsers ; $i++ )
								$boncukDetails = $boncukDetails.$milliseconds.".0;";
							for($i = 0 ; $i < $boncukCntForNewUsers ; $i++ )
								$boncukDetails = $boncukDetails.$milliseconds.".1;";
							
							$duduCntForNewUsers = 30;
							$duduDetails = "";
							for($i = 0 ; $i < $duduCntForNewUsers ; $i++ )
								$duduDetails = $duduDetails.$milliseconds.".0;";
							
							$pamukCntForNewUsers = 7;
							$pamukDetails = "";
							for($i = 0 ; $i < $pamukCntForNewUsers ; $i++ )
								$pamukDetails = $pamukDetails.$milliseconds.".0;";
							for($i = 0 ; $i < $pamukCntForNewUsers ; $i++ )
								$pamukDetails = $pamukDetails.$milliseconds.".1;";
							
							$conn->query("INSERT INTO assets (userid,gold,food,foodTimer,kartopu,kartopuDetails,boncuk,boncukDetails,dudu,duduDetails,pamuk,pamukDetails) VALUES (
										  '".$userRow["id"]."', '".$startGold."', '".$startFood."', '".$milliseconds."',
										  '".$kartopuCntForNewUsers."', '".$kartopuDetails."',
										  '".$boncukCntForNewUsers."', '".$boncukDetails."',
										  '".$duduCntForNewUsers."', '".$duduDetails."',
										  '".$pamukCntForNewUsers."', '".$pamukDetails."'
										  )");
							$_SESSION["login"] = true;
							$_SESSION["id"] = $userRow["id"];
							$_SESSION["username"] = $userRow["username"];
							$_SESSION["email"] = $userRow["email"];
							header("Location:index.php");
						}
						
					}else{
						echo "<font color='red'>Kullanıcı Adı ve/veya Email Kullanımda!</font><br>";
						echo "<font color='green'><a href='#signup'>Şifrenizi mi unuttunuz?</a></font>";
					}
				}
			?>
              <div>
                <input type="text" class="form-control" placeholder="Kullanıcı Adı" required="" name="username" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Parola" required="" name="password" />
              </div>
			  <div>
                <input type="text" class="form-control" placeholder="İlk Evcil Hayvanınız" required="" name="secret" />
              </div>
              <div>
                <button type="submit" name="register" class="btn btn-default submit">Kaydı Tamamla</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Zaten Üye Misiniz ?
                  <a href="#signin" class="to_register"> Giriş Yap </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>
		
      </div>
    </div>
  </body>
</html>
