<!-- page content -->
<div class="right_col" role="main">

	<?php
		include "pOwns.php";
	?>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <?php
					
					if(isset($_POST["changePassword"])){
						if(strlen($_POST["password"]) < 6){
							echo "<font color='red'>Şifre 6 Karakterden Küçük Olamaz!</font><br>";
							$failed = true;
						}else if($_POST["password"] != $_POST["password2"]){
							echo "<font color='red'>Şifreler Eşleşmedi!</font><br>";
							$failed = true;
						}
						if(!isset($failed)){
							echo "<font color='green'>Şifre Başarıyla Değiştirildi!</font><br>";
							$conn->query("UPDATE users SET password='".md5($_POST["password"])."' WHERE id='".$_SESSION["id"]."'");
						}
					}
					
				  ?>
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="" method="POST">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kullanıcı Adı: <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" disabled="disabled" placeholder="<?php echo $_SESSION["username"];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" disabled="disabled" placeholder="<?php echo $_SESSION["email"];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Yeni Şifre: <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" class="form-control" placeholder="Parola" required="" name="password">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Yeni Şifre Tekrarı: <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" class="form-control" placeholder="Parola" required="" name="password2">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="changePassword">Şifre Değiştir</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
		
    <div class="row"> </div>
</div>
<!-- /page content -->