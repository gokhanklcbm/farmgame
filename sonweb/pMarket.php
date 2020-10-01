<?php
	include_once "pAssetConfig.php";
?>
<!-- page content -->
<div class="right_col" role="main">

	<?php
		if(isset($_POST["sellMilk"])){
			if($_POST["milk"] <= $assets["milk"] && $_POST["milk"] > 0){
				// TODO - Points
				$milkMessage = "<center><font color='green'>".$_POST["milk"]." Litre Süt ".($_POST["milk"] * 4)." Akçeye Satılmıştır! ".($_POST["milk"] * MILK_TO_POINTS)." Puan kazanılmıştır.</font></center>";
				$conn->query("UPDATE assets SET milk='".($assets["milk"] - $_POST["milk"])."', gold=".($assets["gold"] + $_POST["milk"] * 4)." WHERE userid='".$_SESSION["id"]."'");
				$conn->query("UPDATE users SET points=points+'".$_POST["milk"] * MILK_TO_POINTS."' WHERE id='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$milkMessage = "<center><font color='red'>Geçersiz Giriş!</font></center>";
			}
		}else if(isset($_POST["sellEgg"])){
			if($_POST["egg"] <= $assets["egg"] && $_POST["egg"] > 0){
				// TODO - Points
				$eggMessage = "<center><font color='green'>".$_POST["egg"]." Adet Yumurta ".($_POST["egg"] * 1)." Akçeye Satılmıştır! ".($_POST["egg"] * EGG_TO_POINTS)." Puan kazanılmıştır.</font></center>";
				$conn->query("UPDATE assets SET egg='".($assets["egg"] - $_POST["egg"])."', gold=".($assets["gold"] + $_POST["egg"] * 1)." WHERE userid='".$_SESSION["id"]."'");
				$conn->query("UPDATE users SET points=points+'".$_POST["egg"] * EGG_TO_POINTS."' WHERE id='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$eggMessage = "<center><font color='red'>Geçersiz Giriş!</font></center>";
			}
		}
		include "pOwns.php";
	?>
	
	<div class="x_panel">
                  <div class="x_title">
                    <h2>Satış Yap</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="" method="POST" class="form-horizontal form-label-left">
					  <?php
						if(isset($milkMessage))
							echo $milkMessage;
						else if(isset($eggMessage))
							echo $eggMessage;
					  ?>
					  <h3><center>1L Süt = 4 Akçe</center></h3>
                      <div class="form-group">

                        <label class="col-sm-5 control-label">Sahip Olunan Süt: <?php echo $assets["milk"]; ?> Litre </label>

                        <div class="col-sm-4">
                          <div class="input-group">
                            <input type="number" class="form-control" name="milk">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary" name="sellMilk">Sat!</button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="divider-dashed"></div>
					  <h3><center>1 Adet Yumurta = 1 Akçe</center></h3>
					  </form>
					  <form action="" method="POST" class="form-horizontal form-label-left">
					  <div class="form-group">
                        <label class="col-sm-5 control-label">Sahip Olunan Yumurta: <?php echo $assets["egg"]; ?> Adet </label>

                        <div class="col-sm-4">
                          <div class="input-group">
                            <input type="number" class="form-control" name="egg">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary" name="sellEgg">Sat!</button>
                            </span>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
		
    <div class="row"> </div>
</div>
<!-- /page content -->