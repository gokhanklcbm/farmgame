<?php
	include_once "pAssetConfig.php";
	
	$rankings = $conn->query("SELECT * FROM users WHERE points ORDER BY points DESC");
	$userPoint = $conn->query("SELECT * FROM users WHERE id='".$_SESSION["id"]."'")->fetch_assoc();
	$rankk = 1;
	while($row = $rankings->fetch_assoc()){
		if($row["id"] == $_SESSION["id"])
			break;
		$rankk++;
	}
?>
<!-- page content -->
<div class="right_col" role="main">

	<?php
		if(isset($_POST["buyStandartFood"])){
			$standartFood = $_POST["standartFood"];
			if($standartFood > 0 && $assets["gold"] >= $standartFood * STANDART_FOOD_COST){
				$foodMessage = "<font color='green'>".$_POST["standartFood"]." (Standart Yem x".STANDART_FOOD_CAP.") ".($_POST["standartFood"] * STANDART_FOOD_COST)." Akçeye Alınmıştır!</font></>";
				$conn->query("UPDATE assets SET gold='".($assets["gold"] - $_POST["standartFood"] * STANDART_FOOD_COST)."', food=".($assets["food"] + $_POST["standartFood"] * STANDART_FOOD_CAP)." WHERE userid='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$foodMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}	
		}else if(isset($_POST["buyKartopu"])){						
			$kartopu = $_POST["kartopu"];
			if($assets["kartopu"] + $kartopu > KARTOPU_MAX_CNT){
				$cowMessage = "<small><font color='red'>Maksimum ".KARTOPU_MAX_CNT." Kartopuna sahip olabilirsiniz!</font></small>";
			}else if($kartopu > 0 && $assets["gold"] >= $kartopu * KARTOPU_COST){
				$cowMessage = "<font color='green'>".$_POST["kartopu"]." Kartopu ".($_POST["kartopu"] * KARTOPU_COST)." Akçeye Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newKartopuDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $kartopu ; $i++)
					$newKartopuDetails = $newKartopuDetails.$milliseconds.".0;";
				$conn->query("UPDATE assets SET gold='".($assets["gold"] - $_POST["kartopu"] * KARTOPU_COST)."', kartopu=".($assets["kartopu"] + $_POST["kartopu"]).", kartopuDetails='".$assets["kartopuDetails"].$newKartopuDetails."' WHERE userid='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$cowMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}else if(isset($_POST["buyBoncuk"])){						
			$boncuk = $_POST["boncuk"];
			if($assets["boncuk"] + $boncuk > BONCUK_MAX_CNT){
				$cowMessage = "<small><font color='red'>Maksimum ".BONCUK_MAX_CNT." Boncuğa sahip olabilirsiniz!</font></small>";
			}else if($boncuk > 0 && $assets["gold"] >= $boncuk * BONCUK_COST){
				$cowMessage = "<font color='green'>".$_POST["boncuk"]." Boncuk ".($_POST["boncuk"] * BONCUK_COST)." Akçeye Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newBoncukDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $boncuk ; $i++)
					$newBoncukDetails = $newBoncukDetails.$milliseconds.".0;";
				for($i = 0 ; $i < $boncuk ; $i++)
					$newBoncukDetails = $newBoncukDetails.$milliseconds.".1;";
				$conn->query("UPDATE assets SET gold='".($assets["gold"] - $_POST["boncuk"] * BONCUK_COST)."', boncuk=".($assets["boncuk"] + $_POST["boncuk"]).", boncukDetails='".$assets["boncukDetails"].$newBoncukDetails."' WHERE userid='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$cowMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}else if(isset($_POST["buySarikiz"])){						
			$sarikiz = $_POST["sarikiz"];
			if($assets["sarikiz"] + $sarikiz > SARIKIZ_MAX_CNT){
				$cowMessage = "<small><font color='red'>Maksimum ".SARIKIZ_MAX_CNT." Sarıkıza sahip olabilirsiniz!</font></small>";
			}else if($sarikiz > 0 && $assets["gold"] >= $sarikiz * SARIKIZ_COST){
				$cowMessage = "<font color='green'>".$_POST["sarikiz"]." Sarıkız ".($_POST["sarikiz"] * SARIKIZ_COST)." Akçeye Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newSarikizDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $sarikiz ; $i++)
					$newSarikizDetails = $newSarikizDetails.$milliseconds.".0;";
				for($i = 0 ; $i < $sarikiz ; $i++)
					$newSarikizDetails = $newSarikizDetails.$milliseconds.".1;";
				$conn->query("UPDATE assets SET gold='".($assets["gold"] - $_POST["sarikiz"] * SARIKIZ_COST)."', sarikiz=".($assets["sarikiz"] + $_POST["sarikiz"]).", sarikizDetails='".$assets["sarikizDetails"].$newSarikizDetails."' WHERE userid='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$cowMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}else if(isset($_POST["buySimental"])){						
			$simental = $_POST["simental"];
			if($assets["simental"] + $simental > SIMENTAL_MAX_CNT){
				$cowMessage = "<small><font color='red'>Maksimum ".SIMENTAL_MAX_CNT." Simantale sahip olabilirsiniz!</font></small>";
			}else if($rankk > SIMENTAL_MIN_POS){
				$cowMessage = "<small><font color='red'>Sıralamanız yetersiz!</font></small>";
			}else if($simental > 0 && $user["points"] >= $simental * SIMENTAL_COST){
				$cowMessage = "<font color='green'>".$_POST["simental"]." Simental ".($_POST["simental"] * SIMENTAL_COST)." Puana Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newSimentalDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $simental ; $i++)
					$newSimentalDetails = $newSimentalDetails.$milliseconds.".0;";
				for($i = 0 ; $i < $simental ; $i++)
					$newSimentalDetails = $newSimentalDetails.$milliseconds.".1;";
				$conn->query("UPDATE assets SET simental=".($assets["simental"] + $_POST["simental"]).", simentalDetails='".$assets["simentalDetails"].$newSimentalDetails."' WHERE userid='".$_SESSION["id"]."'");
				$conn->query("UPDATE users SET points='".($user["points"] - $_POST["simental"] * SIMENTAL_COST)."' WHERE id='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$cowMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}else if(isset($_POST["buyDudu"])){						
			$dudu = $_POST["dudu"];
			if($assets["dudu"] + $dudu > DUDU_MAX_CNT){
				$cowMessage = "<small><font color='red'>Maksimum ".DUDU_MAX_CNT." Duduya sahip olabilirsiniz!</font></small>";
			}else if($dudu > 0 && $assets["gold"] >= $dudu * 50){
				$chickenMessage = "<font color='green'>".$_POST["dudu"]." Dudu ".($_POST["dudu"] * 50)." Akçeye Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newDuduDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $dudu ; $i++)
					$newDuduDetails = $newDuduDetails.$milliseconds.".0;";
				$conn->query("UPDATE assets SET gold='".($assets["gold"] - $_POST["dudu"] * 50)."', dudu=".($assets["dudu"] + $_POST["dudu"]).", duduDetails='".$assets["duduDetails"].$newDuduDetails."' WHERE userid='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$chickenMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}else if(isset($_POST["buyPamuk"])){						
			$pamuk = $_POST["pamuk"];
			if($assets["pamuk"] + $pamuk > PAMUK_MAX_CNT){
				$cowMessage = "<small><font color='red'>Maksimum ".PAMUK_MAX_CNT." Pamuğa sahip olabilirsiniz!</font></small>";
			}else if($pamuk > 0 && $assets["gold"] >= $pamuk * 200){
				$chickenMessage = "<font color='green'>".$_POST["pamuk"]." Pamuk ".($_POST["pamuk"] * 200)." Akçeye Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newPamukDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $pamuk ; $i++)
					$newPamukDetails = $newPamukDetails.$milliseconds.".0;";
				for($i = 0 ; $i < $pamuk ; $i++)
					$newPamukDetails = $newPamukDetails.$milliseconds.".1;";
				$conn->query("UPDATE assets SET gold='".($assets["gold"] - $_POST["pamuk"] * 200)."', pamuk=".($assets["pamuk"] + $_POST["pamuk"]).", pamukDetails='".$assets["pamukDetails"].$newPamukDetails."' WHERE userid='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$chickenMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}else if(isset($_POST["buyPofuduk"])){						
			$pofuduk = $_POST["pofuduk"];
			if($assets["pofuduk"] + $pofuduk > POFUDUK_MAX_CNT){
				$cowMessage = "<small><font color='red'>Maksimum ".POFUDUK_MAX_CNT." Pofuduğa sahip olabilirsiniz!</font></small>";
			}else if($pofuduk > 0 && $assets["gold"] >= $pofuduk * 600){
				$chickenMessage = "<font color='green'>".$_POST["pofuduk"]." Pofuduk ".($_POST["pofuduk"] * 600)." Akçeye Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newPofudukDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $pofuduk ; $i++)
					$newPofudukDetails = $newPofudukDetails.$milliseconds.".0;";
				for($i = 0 ; $i < $pofuduk ; $i++)
					$newPofudukDetails = $newPofudukDetails.$milliseconds.".1;";
				$conn->query("UPDATE assets SET gold='".($assets["gold"] - $_POST["pofuduk"] * 600)."', pofuduk=".($assets["pofuduk"] + $_POST["pofuduk"]).", pofudukDetails='".$assets["pofudukDetails"].$newPofudukDetails."' WHERE userid='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$chickenMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}else if(isset($_POST["buySuslu"])){						
			$suslu = $_POST["suslu"];
			if($assets["suslu"] + $suslu > SUSLU_MAX_CNT){
				$chickenMessage = "<small><font color='red'>Maksimum ".SUSLU_MAX_CNT." Süslüye sahip olabilirsiniz!</font></small>";
			}else if($rankk > SUSLU_MIN_POS){
				$chickenMessage = "<small><font color='red'>Sıralamanız yetersiz!</font></small>";
			}else if($suslu > 0 && $user["points"] >= $suslu * SUSLU_COST){
				$chickenMessage = "<font color='green'>".$_POST["suslu"]." Süslü ".($_POST["suslu"] * SUSLU_COST)." Puana Alınmıştır!</font></>";
				
				$milliseconds = round(microtime(true));
				$newSusluDetails = $milliseconds.".0;";
				for($i = 1 ; $i < $suslu ; $i++)
					$newSusluDetails = $newSusluDetails.$milliseconds.".0;";
				for($i = 0 ; $i < $suslu ; $i++)
					$newSusluDetails = $newSusluDetails.$milliseconds.".1;";
				$conn->query("UPDATE assets SET suslu=".($assets["suslu"] + $_POST["suslu"]).", susluDetails='".$assets["susluDetails"].$newSusluDetails."' WHERE id='".$_SESSION["id"]."'");
				$conn->query("UPDATE users SET points='".($user["points"] - $_POST["suslu"] * SUSLU_COST)."' WHERE id='".$_SESSION["id"]."'");
				$assets = $conn->query("SELECT * FROM assets WHERE userid='".$_SESSION["id"]."' LIMIT 1")->fetch_assoc();
			}else{
				$chickenMessage = "<small><font color='red'>Geçersiz giriş!</font></small>";
			}						
		}
		include "pOwns.php";
	?>
	
	<div class="col-md-12 col-sm-6 col-xs-6">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>İnekler</h3>
						<?php
							
							if(isset($cowMessage))
								echo $cowMessage;
						?>
					</div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Kartopu</h3>
										<img src="images/kartopu.png">
                                        <h2 class="text-center">Fiyat : <?php echo KARTOPU_COST; ?> Akçe</h2><br>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="kartopu">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buyKartopu">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Boncuk</h3>
										<img src="images/boncuk.png">
                                        <h2 class="text-center">Fiyat : <?php echo BONCUK_COST; ?> Akçe</h2><br>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="boncuk">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buyBoncuk">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Sarıkız</h3>
										<img src="images/sarikiz.png">
                                        <h2 class="text-center">Fiyat : <?php echo SARIKIZ_COST; ?> Akçe</h2><br>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="sarikiz">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buySarikiz">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Simental</h3>
										<img src="images/simental.png">
                                        <h2 class="text-center">Sıralama : 1-<?php echo SIMENTAL_MIN_POS; ?></h2>
                                        <h2 class="text-center">Fiyat : <?php echo SIMENTAL_COST; ?> Puan</h2>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="simental">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buySimental">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
                                
                    </div>
                </div>
				
				<div class="row x_title">
                    <div class="col-md-6">
                        <h3>Tavuklar</h3>
						<?php
							if(isset($chickenMessage))
								echo $chickenMessage;
						?>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Dudu</h3>
										<img src="images/dudu.jpg">
                                        <h2 class="text-center">Fiyat : <?php echo DUDU_COST; ?> Akçe</h2><br>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="dudu">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buyDudu">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Pamuk</h3>
										<img src="images/pamuk.png">
                                        <h2 class="text-center">Fiyat : <?php echo PAMUK_COST; ?> Akçe</h2><br>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="pamuk">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buyPamuk">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Pofuduk</h3>
										<img src="images/pofuduk.jpg">
                                        <h2 class="text-center">Fiyat : <?php echo POFUDUK_COST; ?> Akçe</h2><br>
										<form action="" method="POST">
											<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="pofuduk">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buyPofuduk">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Süslü</h3>
										<img src="images/suslu.jpg">
										<h2 class="text-center">Sıralama : 1-<?php echo SUSLU_MIN_POS; ?></h2>
                                        <h2 class="text-center">Fiyat : <?php echo SUSLU_COST; ?> Puan</h2>
										<form action="" method="POST">
											<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="suslu">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buySuslu">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
                                
                    </div>
                </div>
				
				<div class="row x_title">
                    <div class="col-md-6">
                        <h3>Yemler</h3>
						<?php
							if(isset($foodMessage))
								echo $foodMessage;
						?>
                    </div>
                </div>
				<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Standart Yem x<?php echo STANDART_FOOD_CAP; ?></h3>
										<img src="images/yem.jpg">
                                        <h2 class="text-center">Fiyat : <?php echo STANDART_FOOD_COST; ?> Akçe</h2><br>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
											  <div class="input-group">
												<input type="number" class="form-control" name="standartFood">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary" name="buyStandartFood">Satın Al!</button>
												</span>
											  </div>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
                                
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
		
    <div class="row"> </div>
</div>
<!-- /page content -->