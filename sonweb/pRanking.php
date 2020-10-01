<!-- page content -->
<div class="right_col" role="main">
	
	<?php
		include "pOwns.php";
	?>
	
	<div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Sıralama</h3>
                    </div>
                </div>
                <?php
                    echo "<b>Toplam Kullanıcı Sayısı:".$conn->query("SELECT count(id) AS total FROM users")->fetch_assoc()['total']."</b>\n"; 
                ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kullanıcı Adı</th>
                                <th>Puanı</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							$perPage = 17;
							$retVal = $conn->query("SELECT count(id) AS total FROM users")->fetch_assoc();
							$pageCount = ceil($retVal["total"] / $perPage);
							$page = 0; if(isset($_GET["p"])) $page = $_GET["p"];
							
							if($page <= 0) $page = 1;
							if($page >= $pageCount) $page = $pageCount;
							
							$i = 0;
							$search = $conn->query("SELECT * FROM users ORDER BY points DESC LIMIT ".($page - 1) * $perPage.", ".$perPage."");
							
							while($row = $search->fetch_assoc()){
								$i++;
								?>
									<tr>
										<td><?php echo ($page - 1) * $perPage + $i; ?></td>
										<td>
										<?php
											echo $row["username"];
											if(($page - 1) * $perPage + $i <= 3)
												echo " - " . FIRST_THREE_STATUE;
											else if(($page - 1) * $perPage + $i <= 10)
												echo " - " . FIRST_TEN_STATUE;
											else if(($page - 1) * $perPage + $i <= 100)
												echo " - " . FIRST_HUNDRED_STATUE;
											else
												echo " - " . OTHERS_STATUE;
										?>
										</td>
										<td><?php echo $row["points"]; ?> Puan</td>
									</tr>
								<?php
							}
	
						?>
						<tr>
							<td colspan="3"><center>
								<?php
								$start = $page - 4;
								$end = $page + 4;
								
								if($start < 1)
									$start = 1;
								if($end > $pageCount)
									$end = $pageCount;
								
								for($i = $start ; $i <= $end ; $i++){
									if($i == $page)
										echo " <b><a href='index.php?tab=ranking&p=".($i)."'><font color='green'>".($i)."</font></a></b>";
									else
										echo " <b><a href='index.php?tab=ranking&p=".($i)."'>".($i)."</a></b>";
									if($i != $end)
										echo " - ";
								}
								?>
							</center></td>
						</tr>
						</tbody>
                    </table>
                </div>

                <div class="clearfix"></div>
            </div>
		
    <div class="row"> </div>
</div>
<!-- /page content -->