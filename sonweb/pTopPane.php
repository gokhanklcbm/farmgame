 <?php
	$rankings = $conn->query("SELECT * FROM users WHERE points ORDER BY points DESC");
	$userPoint = $conn->query("SELECT * FROM users WHERE id='".$_SESSION["id"]."'")->fetch_assoc();
	$rank = 1;
	while($row = $rankings->fetch_assoc()){
		if($row["id"] == $_SESSION["id"])
			break;
		$rank++;
	}
?>
 <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/avatar.png" alt="">
					<?php
						echo $_SESSION["username"];
						global $rank;
						if($rank <= 3)
							echo " - " . FIRST_THREE_STATUE;
						else if($rank <= 10)
							echo " - " . FIRST_TEN_STATUE;
						else if($rank <= 100)
							echo " - " . FIRST_HUNDRED_STATUE;
						else
							echo " - " . OTHERS_STATUE;
					?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="index.php?tab=profile"> Profil</a></li>
                    <li><a href="pLogout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
<!-- /top navigation -->