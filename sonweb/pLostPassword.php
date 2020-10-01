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
              <h1>Parolamı Unuttum</h1>
			  <?php
				
				if(isset($_POST["lostPassword"])){
					if($conn->query("SELECT * FROM users WHERE username='".$_POST["username"]."' AND secretToken='".$_POST["secret"]."' LIMIT 1")->num_rows != 0){
						$newPsw = generateRandomString();
						echo "<font color='green'><center>Şifreniz <b>".($newPsw)."</b> olarak değiştirilmiştir.</center></font>";
						$conn->query("UPDATE users SET password='".md5($newPsw)."' WHERE username='".$_POST["username"]."'");
					}else if($conn->query("SELECT * FROM users WHERE username='".$_POST["username"]."' LIMIT 1")->num_rows == 0){
						echo "<font color='red'><center>Kullanıcı adı bulunamadı!</center></font>";
					}else{
						echo "<font color='red'><center>Gizli soru cevabı yanlış!</center></font>";
					}
				}
				
				function generateRandomString($length = 6) {
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, $charactersLength - 1)];
					}
					return $randomString;
				}
			  
			  ?>
			  <div>
                <input type="text" class="form-control" placeholder="Kullanıcı Adı" required="" name="username" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="İlk Evcil Hayvanınız" required="" name="secret" />
              </div>
              <div>
                <button type="submit" name="lostPassword" class="btn btn-default submit">Onayla</button>
              </div>
              <div>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <a href="pLogin.php" class="to_register"> Giriş Yap </a>

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
