<?php
	include_once "pAssetConfig.php";
	$food24 = ($assets["kartopu"] + $assets["boncuk"] + $assets["sarikiz"] + $assets["simental"]) * COW_DAY_FOOD + ($assets["dudu"] + $assets["pamuk"] + $assets["pofuduk"] + $assets["suslu"]) * CHICKEN_DAY_FOOD;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	var foodLost = <?php echo $food24; ?>;
	var startFood = <?php echo $assets["food"]; ?>;
	var startTime = <?php echo round(microtime(true)); ?>;
	$(function(){
		setInterval(oneSecondFunction, 1);
	});
	function oneSecondFunction() {		
		$("#foodCount").text(Math.round(startFood - (new Date() / 1000 - startTime) * (foodLost / (24 * 60 * 60))));
	}
			
</script>

<div class="row tile_count">
						<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Varlık </span>
                            <div class="count red"><?php echo $assets["gold"]; ?></div>
                            <span class="count_bottom">Akçe</span>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Yumurta </span>
                            <div class="count blue"><?php echo $assets["egg"]; ?></div>
                            <span class="count_bottom">Adet</span>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Süt </span>
                            <div class="count purple"><?php echo $assets["milk"]; ?></div>
                            <span class="count_bottom">L</span>
                        </div>
						<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Yem </span>
                            <div class="count purple"><p id="foodCount"></p></div>
                            <span class="count_bottom">-<?php echo ceil($food24 / 24); ?> (Saatlik)</span>
                        </div>
						
						<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Puan/Sıralama/Ünvan</span>
                            <div class="count green"><?php echo $userPoint["points"]; ?> P / <?php global $rank; echo $rank; ?>.
                                <?php
                                global $rank;
                                if($rank <= 3)
                                    echo " /" . FIRST_THREE_STATUE;
                                else if($rank <= 10)
                                    echo " / " . FIRST_TEN_STATUE;
                                else if($rank <= 100)
                                    echo " / " . FIRST_HUNDRED_STATUE;
                                else
                                    echo " / " . OTHERS_STATUE;
                                ?>

                            </div>
                        </div>
</div>