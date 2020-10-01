<!-- page content -->
<div class="right_col" role="main">

	<?php
		include "pOwns.php";
		include_once "pAssetConfig.php";
	?>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> İnekler <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
						
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

						<table class="table">
							<tbody>
								<tr>
									<th><img src="images/kartopu.png"/></th>
									<th><br><h2>Kartopu</h2></th>
									<th><?php echo KARTOPU_COST; ?> Akçe<br>2-5L<br><?php if(KARTOPU_MAX_CNT != 999999) echo "Maksimum: ".KARTOPU_MAX_CNT; else echo "Maksimum: Sınırsız"; ?></th>
								</tr>
								<tr>
									<th><img src="images/boncuk.png"/></th>
									<th><br><h2>Boncuk</h2></th>
									<th><?php echo BONCUK_COST; ?> Akçe<br>8-20L<br><?php if(BONCUK_MAX_CNT != 999999) echo "Maksimum: ".BONCUK_MAX_CNT; else echo "Maksimum: Sınırsız"; ?></th>
								</tr>
								<tr>
									<th><img src="images/sarikiz.png"/></th>
									<th><br><h2>Sarıkız</h2></th>
									<th><?php echo SARIKIZ_COST; ?> Akçe<br>10-80L<br><?php if(SARIKIZ_MAX_CNT != 999999) echo "Maksimum: ".SARIKIZ_MAX_CNT; else echo "Maksimum: Sınırsız"; ?></th>
								</tr>
								<tr>
									<th><img src="images/simental.png"/></th>
									<th><br><h2>Simental</h2></th>
									<th><?php echo SIMENTAL_COST; ?> Puan<br>40-50L<br>Minimum Sıralama: <?php echo SIMENTAL_MIN_POS; ?><br><?php if(SIMENTAL_MAX_CNT != 999999) echo "Maksimum: ".SIMENTAL_MAX_CNT; else echo "Maksimum: Sınırsız"; ?></th>
								</tr>
							</tbody>
						</table>
                        <hr>				
                  </div>
                </div>
    </div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Tavuklar <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
						
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

						<table class="table">
							<tbody>
								<tr>
									<th><img src="images/dudu.jpg"/></th>
									<th><br><h2>Dudu</h2></th>
									<th><?php echo DUDU_COST; ?> Akçe<br>1-4 Yumurta<br><?php if(DUDU_MAX_CNT != 999999) echo "Maksimum: ".DUDU_MAX_CNT; else echo "Maksimum: Sınırsız"; ?></th>
								</tr>
								<tr>
									<th><img src="images/pamuk.png"/></th>
									<th><br><h2>Pamuk</h2></th>
									<th><?php echo PAMUK_COST; ?> Akçe<br>4-16 Yumurta<br><?php if(PAMUK_MAX_CNT != 999999) echo "Maksimum: ".PAMUK_MAX_CNT; else echo "Maksimum: Sınırsız"; ?><br></th>
								</tr>
								<tr>
									<th><img src="images/pofuduk.jpg"/></th>
									<th><br><h2>Pofuduk</h2></th>
									<th><?php echo POFUDUK_COST; ?> Akçe<br>8-64 Yumurta<br><?php if(POFUDUK_MAX_CNT != 999999) echo "Maksimum: ".POFUDUK_MAX_CNT; else echo "Maksimum: Sınırsız"; ?></th>
								</tr>
								<tr>
									<th><img src="images/suslu.jpg"/></th>
									<th><br><h2>Süslü Tavuk</h2></th>
									<th><?php echo SUSLU_COST; ?> Puan<br>32-40 Yumurta<br>Minimum Sıralama: <?php echo SUSLU_MIN_POS; ?><br><?php if(SUSLU_MAX_CNT != 999999) echo "Maksimum: ".SUSLU_MAX_CNT; else echo "Maksimum: Sınırsız"; ?></th>
								</tr>
							</tbody>
						</table>
                        <hr>				
                  </div>
                </div>
    </div>
		
    <div class="row"> </div>
</div>
<!-- /page content -->