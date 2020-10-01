<?php
	$milliseconds = round(microtime(true));
	
	include_once "pAssetConfig.php";

    $kartopuArr = explode(";", $assets["kartopuDetails"]);
    $kartopuSagAmt = calculateToCollect("kartopuDetails", KARTOPU_SAG_CDR);

    $boncukArr = explode(";", $assets["boncukDetails"]);
    $boncukSagAmt = calculateToCollect("boncukDetails", BONCUK_SAG_CDR);
    $boncukSevAmt =  calculateToLove("boncukDetails", BONCUK_SEV_CDR);

    $sarikizArr = explode(";", $assets["sarikizDetails"]);
    $sarikizSagAmt = calculateToCollect("sarikizDetails", SARIKIZ_SAG_CDR);
    $sarikizSevAmt = calculateToLove("sarikizDetails", SARIKIZ_SEV_CDR);

    $simentalArr = explode(";", $assets["simentalDetails"]);
    $simentalSagAmt = calculateToCollect("simentalDetails", SIMENTAL_SAG_CDR);
    $simentalSevAmt = calculateToLove("simentalDetails", SIMENTAL_SEV_CDR);

    $duduArr = explode(";", $assets["duduDetails"]);
    $duduToplaAmt = calculateToCollect("duduDetails", DUDU_TOPLA_CDR);

    $pamukArr = explode(";", $assets["pamukDetails"]);
    $pamukToplaAmt = calculateToCollect("pamukDetails", PAMUK_TOPLA_CDR);
    $pamukGezdirAmt = calculateToLove("pamukDetails", PAMUK_GEZDIR_CDR);

    $pofudukArr = explode(";", $assets["pofudukDetails"]);
    $pofudukToplaAmt = calculateToCollect("pofudukDetails", POFUDUK_TOPLA_CDR);
    $pofudukGezdirAmt = calculateToLove("pofudukDetails", POFUDUK_GEZDIR_CDR);

    $susluArr = explode(";", $assets["susluDetails"]);
    $susluToplaAmt = calculateToCollect("susluDetails", SUSLU_TOPLA_CDR);
    $susluGezdirAmt = calculateToLove("susluDetails", SUSLU_GEZDIR_CDR);

    if(isset($_POST["kartopuSag"])){
        collect("kartopuDetails", KARTOPU_SAG_CDR, $kartopuArr, KARTOPU_SAG_MIN_AMT, KARTOPU_SAG_MAX_AMT ,true, "Kartopu", "kartopuLiked", 0, 0);
        $kartopuSagAmt = calculateToCollect("kartopuDetails", KARTOPU_SAG_CDR);
    }else if(isset($_POST["boncukSag"])){
        collect("boncukDetails", BONCUK_SAG_CDR, $boncukArr, BONCUK_SAG_MIN_AMT , BONCUK_SAG_MIN_AMT ,true, "Boncuk", "boncukLiked", BONCUK_LIKE_MIN_AMT, BONCUK_LIKE_MAX_AMT);
        $boncukSagAmt = calculateToCollect("boncukDetails", BONCUK_SAG_CDR);
    }else if(isset($_POST["boncukSev"])){
        love("boncukDetails", BONCUK_SEV_CDR, $boncukArr, true, "Boncuk", "boncukLiked");
        $boncukSevAmt = calculateToLove("boncukDetails", BONCUK_SEV_CDR);
    }else if(isset($_POST["sarikizSag"])){
        collect("sarikizDetails", SARIKIZ_SAG_CDR, $sarikizArr, SARIKIZ_SAG_MIN_AMT , SARIKIZ_SAG_MAX_AMT ,true, "Sarıkız", "sarikizLiked", SARIKIZ_LIKE_MIN_AMT, SARIKIZ_LIKE_MAX_AMT);
        $sarikizSagAmt = calculateToCollect("sarikizDetails", SARIKIZ_SAG_CDR);
    }else if(isset($_POST["sarikizSev"])){
        love("sarikizDetails", SARIKIZ_SEV_CDR, $sarikizArr, true, "Sarıkız", "sarikizLiked");
        $sarikizSevAmt = calculateToLove("sarikizDetails", SARIKIZ_SEV_CDR);
    }if(isset($_POST["simentalSag"])){
        collect("simentalDetails", SIMENTAL_SAG_CDR, $simentalArr, SIMENTAL_SAG_MIN_AMT, SIMENTAL_SAG_MAX_AMT ,true, "Simental", "simentalLiked", SIMENTAL_LIKE_MIN_AMT, SIMENTAL_LIKE_MAX_AMT);
        $simentalSagAmt = calculateToCollect("simentalDetails", SARIKIZ_SAG_CDR);
    }else if(isset($_POST["simentalSev"])){
        love("simentalDetails", SIMENTAL_SEV_CDR, $simentalArr, true, "Simental", "simentalLiked");
        $simentalSevAmt = calculateToLove("simentalDetails", SIMENTAL_SEV_CDR);
    }else if(isset($_POST["duduTopla"])){
        collect("duduDetails", DUDU_TOPLA_CDR, $duduArr, DUDU_TOPLA_MIN_AMT, DUDU_TOPLA_MAX_AMT ,false, "Dudu", "duduLiked", 0, 0);
        $duduToplaAmt = calculateToCollect("duduDetails", DUDU_TOPLA_CDR);
    }else if(isset($_POST["pamukTopla"])){
        collect("pamukDetails", PAMUK_TOPLA_CDR, $pamukArr, PAMUK_TOPLA_MIN_AMT, PAMUK_TOPLA_MAX_AMT ,false, "Pamuk", "pamukLiked", PAMUK_LIKE_MIN_AMT, PAMUK_LIKE_MAX_AMT);
        $pamukToplaAmt = calculateToCollect("pamukDetails", PAMUK_TOPLA_CDR);
    }else if(isset($_POST["pamukGezdir"])){
        love("pamukDetails", PAMUK_GEZDIR_CDR, $pamukArr, false, "Pamuk", "pamukLiked");
        $pamukGezdirAmt = calculateToLove("pamukDetails", PAMUK_GEZDIR_CDR);
    }else if(isset($_POST["pofudukTopla"])){
        collect("pofudukDetails", POFUDUK_TOPLA_CDR, $pofudukArr, POFUDUK_TOPLA_MIN_AMT , POFUDUK_TOPLA_MAX_AMT ,false, "Pofuduk", "pofudukLiked", POFUDUK_LIKE_MIN_AMT, POFUDUK_LIKE_MAX_AMT);
        $pofudukToplaAmt = calculateToCollect("pofudukDetails", POFUDUK_TOPLA_CDR);
    }else if(isset($_POST["pofudukGezdir"])){
        love("pofudukDetails", POFUDUK_GEZDIR_CDR, $pofudukArr, false, "Pofuduk", "pofudukLiked");
        $pofudukGezdirAmt = calculateToLove("pofudukDetails", POFUDUK_GEZDIR_CDR);
    }else if(isset($_POST["susluTopla"])){
        collect("susluDetails", SUSLU_TOPLA_CDR, $susluArr, SUSLU_TOPLA_MIN_AMT, SUSLU_TOPLA_MAX_AMT ,false, "Süslü", "susluLiked", SUSLU_LIKE_MIN_AMT, SUSLU_LIKE_MAX_AMT);
        $susluToplaAmt = calculateToCollect("susluDetails", SUSLU_TOPLA_CDR);
    }else if(isset($_POST["susluGezdir"])){
        love("susluDetails", SUSLU_GEZDIR_CDR, $susluArr, false, "Süslü", "susluLiked");
        $susluGezdirAmt = calculateToLove("susluDetails", SUSLU_GEZDIR_CDR);
    }

    function love($typeDetails, $CDR, $typeArray, $isCow, $name , $dbLiked){
        global $assets, $cowMessage, $milliseconds, $conn, $chickenMessage;

        $cnt = calculateToLove($typeDetails, $CDR, $typeArray);
        if($cnt > 0){
            for($i = 0 ; $i < count($typeArray) - 1 ; $i++){
                $time = $typeArray[$i];
                if($time[strlen($time) - 1] == "1" && substr($time,0,strlen($time - 2)) + $CDR < round(microtime(true)))
                    $typeArray[$i] = $milliseconds.".1";
            }

            $newStr = "";
            for($i = 0 ; $i < count($typeArray) - 1 ; $i++)
                $newStr = $newStr."".$typeArray[$i].";";
            if($isCow)
                $cowMessage = "<font color='green'>".$cnt." ".$name." sevildi.</font>";
            else
                $chickenMessage = "<font color='green'>".$cnt." ".$name." gezdirildi.</font>";
            $conn->query("UPDATE assets SET ".$typeDetails."='".$newStr."', ".$dbLiked."=".$dbLiked." + '".$cnt."' WHERE userid='".$_SESSION["id"]."'");
            $assets = $conn->query("SELECT * FROM assets WHERE userid='" . $_SESSION["id"] . "' LIMIT 1")->fetch_assoc();
        }else
            if($isCow)
                $cowMessage = "<font color='red'>Sevilecek inek yok.</font>";
            else
                $chickenMessage = "<font color='red'>Gezdirilecek tavuk yok.</font>";
    }

    function collect($typeDetails, $CDR, $typeArray, $collectMinAmt, $collectMaxAmt, $isCow, $name, $dbLikedName, $minRand, $maxRand)
    {
        global $assets, $cowMessage, $milliseconds, $conn, $chickenMessage;

        $cnt = calculateToCollect($typeDetails, $CDR, $typeArray);
        $loveAmt = 0;
        if ($cnt > 0) {
            for ($i = 0; $i < count($typeArray) - 1; $i++) {
                $time = $typeArray[$i];
                if ($time[strlen($time) - 1] == "0" && substr($time, 0, strlen($time - 2)) + $CDR < round(microtime(true))){
                    $typeArray[$i] = $milliseconds . ".0";
                }
            }

            if(isset($assets[$dbLikedName])){
                for($i = 0 ; $i < $assets[$dbLikedName] ; $i++)
                    $loveAmt = rand($minRand, $maxRand);
                $conn->query("UPDATE assets SET ".$dbLikedName."=0 WHERE userid='".$_SESSION["id"]."'");
            }

            $newStr = "";
            for ($i = 0; $i < count($typeArray) - 1; $i++)
                $newStr = $newStr . "" . $typeArray[$i] . ";";
            if($isCow){
				$totalAmnt = 0;
				for($ii = 0 ; $ii < $cnt ; $ii++){
					$totalAmnt += rand($collectMinAmt, $collectMaxAmt);
				}
                $cowMessage = "<font color='green'>" . $cnt . " ".$name." Sağıldı. " . ($totalAmnt) . " Litre süt elde edildi.";
                if($loveAmt != 0)
                    $cowMessage = $cowMessage." Sevme sonucu fazladan ".$loveAmt." litre süt elde edildi.";
                $cowMessage = $cowMessage."</font>";
                $conn->query("UPDATE assets SET ".$typeDetails."='" . $newStr . "', milk= milk + '" . ($totalAmnt + $loveAmt) . "' WHERE userid='" . $_SESSION["id"] . "'");
            }else{
				$totalAmnt = 0;
				for($ii = 0 ; $ii < $cnt ; $ii++){
					$totalAmnt += rand($collectMinAmt, $collectMaxAmt);
				}
                $chickenMessage = "<font color='green'>" . $cnt . " ".$name." Toplandı. " . ($totalAmnt) . " Adet yumurta elde edildi.";
                if($loveAmt != 0)
                    $chickenMessage = $chickenMessage." Sevme sonucu fazladan ".$loveAmt." adet yumuta elde edildi.";
                $chickenMessage = $chickenMessage."</font>";
                $conn->query("UPDATE assets SET ".$typeDetails."='" . $newStr . "', egg= egg + '" . ($totalAmnt + $loveAmt) . "' WHERE userid='" . $_SESSION["id"] . "'");
            }
            $assets = $conn->query("SELECT * FROM assets WHERE userid='" . $_SESSION["id"] . "' LIMIT 1")->fetch_assoc();
        } else
            if($isCow)
                $cowMessage = "<font color='red'>Sağılacak inek yok.</font>";
            else
                $chickenMessage = "<font color='red'>Toplanacak tavuk yok.</font>";
    }

    function calculateToCollect($typeDetails, $CDR){
        global $assets;
        $cnt = 0;
        $cntArr = explode(";", $assets[$typeDetails]);
        for($i = 0 ; $i < count($cntArr) - 1 ; $i++){
            $time = $cntArr[$i];
            if($time[strlen($time) - 1] == "0")
                if(substr($time,0,strlen($time - 2)) + $CDR < round(microtime(true)))
                    $cnt++;
        }
        return $cnt;
    }

    function calculateToLove($typeDetails, $CDR){
        global $assets;
        $cnt = 0;
        $cntArr = explode(";", $assets[$typeDetails]);
        for($i = 0 ; $i < count($cntArr) - 1 ; $i++){
            $time = $cntArr[$i];
            if($time[strlen($time) - 1] == "1" && substr($time,0,strlen($time - 2)) + $CDR < round(microtime(true)))
                $cnt++;
        }
        return $cnt;
    }

?>

<!-- page content -->
<div class="right_col" role="main">
	
	<?php
		include "pOwns.php";
	?>
	
	<div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>İnekler</h3>
					</div>
                </div>
				<?php 
					if(isset($cowMessage))
						echo $cowMessage;
					
				?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Kartopu</h3>
										<img src="images/kartopu.png">
										<h5 class="text-center">
										<?php
											if($kartopuSagAmt > 0)
												echo "<font color='green'>".$assets["kartopu"]." / ".$kartopuSagAmt." sağılmaya hazır.</font><br>";
											else
												echo $assets["kartopu"]." / 0 Sağmaya hazır inek yok.<br>";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<br><center><button type="submit" class="btn btn-success" name="kartopuSag">Sağ</button></center><br>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Boncuk</h3>
										<img src="images/boncuk.png">
										<h5 class="text-center">
										<?php
											if($boncukSagAmt > 0)
												echo "<font color='green'>".$assets["boncuk"]." / ".$boncukSagAmt." sağılmaya hazır.</font><br>";
											else
												echo $assets["boncuk"]." / 0 Sağmaya hazır inek yok.<br>";
											
											if($boncukSevAmt > 0)
												echo "<font color='green'>".$assets["boncuk"]." / ".$boncukSevAmt." sevmeye hazır.</font><br>";
											else
												echo $assets["boncuk"]." / 0 Sevmeye hazır inek yok.";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<center><button type="submit" class="btn btn-success" name="boncukSev">Sev</button>
												<button type="submit" class="btn btn-success" name="boncukSag">Sağ</button></center><br>
											</div>
										</div>
										</form>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Sarıkız</h3>
										<img src="images/sarikiz.png">
										<h5 class="text-center">
										<?php
											if($sarikizSagAmt > 0)
												echo "<font color='green'>".$assets["sarikiz"]." / ".$sarikizSagAmt." sağılmaya hazır.</font><br>";
											else
												echo $assets["sarikiz"]." / 0 Sağmaya hazır inek yok.<br>";
											
											if($sarikizSevAmt > 0)
												echo "<font color='green'>".$assets["sarikiz"]." / ".$sarikizSevAmt." sevmeye hazır.</font><br>";
											else
												echo $assets["sarikiz"]." / 0 Sevmeye hazır inek yok.";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<center><button type="submit" class="btn btn-success" name="sarikizSev">Sev</button>
												<button type="submit" class="btn btn-success" name="sarikizSag">Sağ</button></center><br>
											</div>
										</div>
										</form>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Simental</h3>
										<img src="images/simental.png">
										<h5 class="text-center">
										<?php
											if($simentalSagAmt > 0)
												echo "<font color='green'>".$assets["simental"]." / ".$simentalSagAmt." sağılmaya hazır.</font><br>";
											else
												echo $assets["simental"]." / 0 Sağmaya hazır inek yok.<br>";
											
											if($simentalSevAmt > 0)
												echo "<font color='green'>".$assets["simental"]." / ".$simentalSevAmt." sevmete hazır.</font><br>";
											else
												echo $assets["simental"]." / 0 Sevmeye hazır inek yok.";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<center><button type="submit" class="btn btn-success" name="simentalSev">Sev</button>
												<button type="submit" class="btn btn-success" name="simentalSag">Sağ</button></center><br>
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
					</div>
                </div>
				<?php 
					if(isset($chickenMessage))
						echo $chickenMessage;
				?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Dudu</h3>
										<img src="images/dudu.jpg">
										<h5 class="text-center">
										<?php
											if($duduToplaAmt > 0)
												echo "<font color='green'>".$assets["dudu"]." / ".$duduToplaAmt." toplamaya hazır.</font><br>";
											else
												echo $assets["dudu"]." / 0 Toplamaya hazır tavuk yok.<br>";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<br><center><button type="submit" class="btn btn-success" name="duduTopla">Topla</button></center><br>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Pamuk</h3>
										<img src="images/pamuk.png">
										<h5 class="text-center">
										<?php
											if($pamukToplaAmt > 0)
												echo "<font color='green'>".$assets["pamuk"]." / ".$pamukToplaAmt." toplamaya hazır.</font><br>";
											else
												echo $assets["pamuk"]." / 0 Toplamaya hazır tavuk yok.<br>";
											
											if($pamukGezdirAmt > 0)
												echo "<font color='green'>".$assets["pamuk"]." / ".$pamukGezdirAmt." gezdirmeye hazır.</font><br>";
											else
												echo $assets["pamuk"]." / 0 Gezdirmeye hazır tavuk yok.";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<center><button type="submit" class="btn btn-success" name="pamukGezdir">Gezdir</button>
												<button type="submit" class="btn btn-success" name="pamukTopla">Topla</button></center><br>
											</div>
										</div>
										</form>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Pofuduk</h3>
										<img src="images/pofuduk.jpg">
										<h5 class="text-center">
										<?php
											if($pofudukToplaAmt > 0)
												echo "<font color='green'>".$assets["pofuduk"]." / ".$pofudukToplaAmt." toplamaya hazır.</font><br>";
											else
												echo $assets["pofuduk"]." / 0 Toplamaya hazır tavuk yok.<br>";
											
											if($pofudukGezdirAmt > 0)
												echo "<font color='green'>".$assets["pofuduk"]." / ".$pofudukGezdirAmt." gezdirmeye hazır.</font><br>";
											else
												echo $assets["pofuduk"]." / 0 Gezdirmeye hazır tavuk yok.";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<center><button type="submit" class="btn btn-success" name="pofudukGezdir">Gezdir</button>
												<button type="submit" class="btn btn-success" name="pofudukTopla">Topla</button></center><br>
											</div>
										</div>
										</form>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="thumbnail" style="height: auto !important;">
										<h3 class="text-center">Süslü</h3>
										<img src="images/suslu.jpg">
										<h5 class="text-center">
										<?php
											if($susluToplaAmt > 0)
												echo "<font color='green'>".$assets["suslu"]." / ".$susluToplaAmt." toplamaya hazır.</font><br>";
											else
												echo $assets["suslu"]." / 0 Toplamaya hazır tavuk yok.<br>";
											
											if($susluGezdirAmt > 0)
												echo "<font color='green'>".$assets["suslu"]." / ".$susluGezdirAmt." gezdirmeye hazır.</font><br>";
											else
												echo $assets["suslu"]." / 0 Gezdirmeye hazır tavuk yok.";
										?></h5>
										<form action="" method="POST">
										<div class="form-group">
											<div class="col-sm-12">
												<center><button type="submit" class="btn btn-success" name="susluGezdir">Gezdir</button>
												<button type="submit" class="btn btn-success" name="susluTopla">Topla</button></center><br>
											</div>
										</div>
										</form>
                                    </div>
                                </div>
								

                                
                    </div>
                </div>


                <div class="clearfix"></div>
            </div>
		
    <div class="row"> </div>
</div>
<!-- /page content -->