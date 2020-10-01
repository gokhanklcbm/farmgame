<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>EGGRICOLL</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/avatar.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2><?php echo $_SESSION["username"];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Ana Sayfa </a></li>
                  <li><a href="index.php?tab=market"><i class="fa fa-anchor"></i> Pazar Alanı </a></li>
                  <li><a href="index.php?tab=store"><i class="fa fa-bank"></i> Dükkan </a></li>
                  <li><a href="index.php?tab=ranking"><i class="fa fa-table"></i> Sıralama </a></li>
                  <li><a href="index.php?tab=animals"><i class="fa fa-paw"></i> Hayvan Özellikleri </a></li>
                  <li><a href="index.php?tab=profile"><i class="fa fa-cog"></i> Profil </a></li>
                  <li><a href="index.php?tab=chat"><i class="fa fa-cog"></i> Chat </a></li>
                  <li><a href="pLogout.php"><i class="fa fa-lock"></i> Çıkış Yap </a></li>
              </div>
			</div>

          </div>
</div>