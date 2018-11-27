<style>
.trends-wrapper{
	background: url('imgs/some-bg.png') fixed;
	background-repeat: no-repeat;
	background-size: 100%;
}

</style>
<?php

include 'header.php';
include 'nav.php';
require 'db.php';

function getTotalByES(){
	global $db;
	$emps = 0;
	$unEmps = 0;
	$data = array();
	$yrs = array();
	$gDateGrad = $db->query("SELECT date_graduated FROM alumni GROUP BY date_graduated");
	while($fDateGrad = $gDateGrad->fetch_object()){
		$dateGrad = date('Y',strtotime($fDateGrad->date_graduated));
		$yrs[] = $dateGrad;
	}
	foreach($yrs AS $yr){
		$gAlumni = $db->query("SELECT * FROM alumni WHERE date_graduated LIKE '$yr%'");
		$data[$yr]['total'] = $gAlumni->num_rows;
		$data[$yr]['emps'] = 0;
		$data[$yr]['unemps'] = 0;
		while($alumni = $gAlumni->fetch_object()){
			$alumni_id  = $alumni->alumni_id;
			$wes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$alumni_id' AND we_date_end IS NULL");
			if($wes->num_rows > 0){ $data[$yr]['emps']++; }else{ $data[$yr]['unemps']++; } 
		}
	}
	return !empty($data) ? $data : false;
}

function getTotalByCourse($course){
	global $db;
	$data = array();
	$yrs = array();
	$gYrs = $db->query("SELECT date_graduated FROM alumni WHERE course = '$course' GROUP BY date_graduated");
	while($fYrs = $gYrs->fetch_object()){
		$yrs[] = date('Y',strtotime($fYrs->date_graduated));
	}
	foreach($yrs AS $yr){
		$select = $db->query("SELECT * FROM alumni WHERE course = '$course' AND date_graduated LIKE '$yr%'");
		$data[$yr]['total'] = $select->num_rows;
		$data[$yr]['emps'] = 0;
		$data[$yr]['semps'] = 0;
		$data[$yr]['unemps'] = 0;
		while($fetch = $select->fetch_object()){
			$alumni_id = $fetch->alumni_id;
			$wes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$alumni_id' AND we_date_end IS NULL ");
			if($wes->num_rows > 0){
				$we = $wes->fetch_object();
				if(empty($we->company_name)){ $data[$yr]['semps']++; }else{ $data[$yr]['emps']++; }
			}else{
				$data[$yr]['unemps']++;
			}
		}
	}
	return !empty($data) ? $data : false;
}

function getIsItRelated(){
	global $db;
	$data = array();
	$yrs = array();
	$gDateGrad = $db->query("SELECT date_graduated FROM alumni GROUP BY date_graduated");
	while($fDateGrad = $gDateGrad->fetch_object()){
		$dateGrad = date('Y',strtotime($fDateGrad->date_graduated));
		$yrs[] = $dateGrad;
	}
	foreach($yrs AS $yr){
		$gAlumni = $db->query("SELECT * FROM alumni WHERE date_graduated LIKE '$yr%'");
		$data[$yr]['related'] = 0;
		$data[$yr]['unrelated'] = 0;
		$unrelateds = array();
		$relateds = array();
		while($alumni = $gAlumni->fetch_object()){
			$alumni_id  = $alumni->alumni_id;
			$wes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$alumni_id' AND we_date_end IS NULL");
			if($wes->num_rows > 0){
				while($we = $wes->fetch_object()){
					if($we->is_it_related == 1){
						$relateds[$alumni_id][] = $we->we_id;
					}else{
						$unrelateds[$alumni_id][] = $we->we_id;
					}
				}
				if(!empty($relateds[$alumni_id]) && count($relateds[$alumni_id]) > 0){
					$data[$yr]['related']++;
				}else if(!empty($unrelateds[$alumni_id]) && count($unrelateds[$alumni_id]) > 0){
					$data[$yr]['unrelated']++;
				}
			}
			$data[$yr]['total'] = $data[$yr]['related'] + $data[$yr]['unrelated'];
		}
	}
	return !empty($data) ? $data : false;
}

$isITRelateds = getIsItRelated();

$totalByES = getTotalByES();
$courses[0] = "Bachelor of Science in Information System";
$courses[1] = "Bachelor of Science in Information Technology";
$courses[2] = "Bachelor of Science in Computer Science";
$courses[3] = "Masters in Information Technology";
$courses[4] = "Library Science";
$courses[5] = "Entertainment Multimedia Computing";
$empStats[0] = "Employed";
$empStats[1] = "Self-Employed";
$empStats[2] = "Unemployed";
?>
<div class="trends-wrapper">
	<img class="trends-header" src="imgs/trend-header.png" />
	<div class="trends-content">
		<?php if($totalByES){ ?>
		<div class="trend-results-wrapper">
			<div class="trend-results-header">
				<h4> Total </h4>
			</div>
			<div class="trc-outer">
				<div class="trend-results-content">
					<div class="trc-header">
						<h4> Employed </h4>
					</div>
					<div class="trc-inner">
						<div class="trc-bars-wrapper">
						<?php
						foreach($totalByES AS $yr => $stat){
							$percent = number_format(($stat['emps'] / $stat['total'] ) * 100,0) ;
							$percent .= "%";
							?>
							<div class="outer-bar">
								<?php echo (count($yr) > 0) ? "<div style='height: $percent;'>$percent</div>" : "<div style='backround: none; color: #333;'>0%</div>"; ?>
							</div>
							<?php
						}
						?>
						</div>
						<div class="trc-years-wrapper">
							<?php
							foreach($totalByES AS $yr => $stat){
								?>
								<div class="bottom-label">
									<div class="yrlabel"> <?php echo $yr; ?> </div>
									<div class="total-per-year"> <?php echo $stat['emps']."/".$stat['total']; ?> </div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="trend-results-content">
					<div class="trc-header">
						<h4> Unemployed </h4>
					</div>
					<div class="trc-inner">
						<div class="trc-bars-wrapper">
						<?php
						foreach($totalByES AS $yr => $stat){
							$percent = number_format(($stat['unemps'] / $stat['total'] ) * 100,0) ;
							$percent .= "%";
							?>
							<div class="outer-bar">
								<?php echo (count($yr) > 0) ? "<div style='height: $percent;'>$percent</div>" : "<div style='backround: none; color: #333;'>0%</div>"; ?>
							</div>
							<?php
						}
						?>
						</div>
						<div class="trc-years-wrapper">
							<?php
							foreach($totalByES AS $yr => $stat){
								?>
								<div class="bottom-label">
									<div class="yrlabel"> <?php echo $yr; ?> </div>
									<div class="total-per-year"> <?php echo $stat['unemps']."/".$stat['total']; ?> </div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($isITRelateds)){
			?>
			<div class="trend-results-wrapper">
				<div class="trend-results-header">
					<h4> Employed Alumni </h4>
				</div>
				<div class="trc-outer">
					<div class="trend-results-content">
						<div class="trc-header">
							<h4> IT Related </h4>
						</div>
						<div class="trc-inner">
							<div class="trc-bars-wrapper">
								<?php
								foreach($isITRelateds AS $yr => $data){
									if($data['total'] > 0){
										$percent = number_format(($data['related'] / $data['total']) * 100,0);
										$percent .= "%";
										?>
										<div class="outer-bar">
										<?php echo (count($yr) > 0) ? "<div style='height: $percent;'>$percent</div>" : "<div style='backround: none; color: #333;'>0%</div>"; ?>
										</div>
										<?php
									}
								}
								?>
							</div>
							<div class="trc-years-wrapper">
								<?php
								foreach($isITRelateds AS $yr => $data){
									if($data['total'] > 0){
										?>
										<div class="bottom-label">
											<div class="yrlabel"> <?php echo $yr; ?> </div>
											<div class="total-per-year"> <?php echo $data['related']."/".$data['total']; ?> </div>
										</div>
										<?php
									}
								}
								?>
							</div>
						</div>
					</div>
					<div class="trend-results-content">
						<div class="trc-header">
							<h4> Others </h4>
						</div>
						<div class="trc-inner">
							<div class="trc-bars-wrapper">
								<?php
								foreach($isITRelateds AS $yr => $data){
									if($data['total'] > 0){
										$percent = number_format(($data['unrelated'] / $data['total']) * 100 ,0);
										$percent .= "%";
										?>
										<div class="outer-bar">
										<?php echo (count($yr) > 0) ? "<div style='height: $percent;'>$percent</div>" : "<div style='backround: none; color: #333;'>0%</div>"; ?>
										</div>
										<?php
									}
								}
								?>
							</div>
							<div class="trc-years-wrapper">
								<?php
								foreach($isITRelateds AS $yr => $data){
									if($data['total'] > 0){
										?>
										<div class="bottom-label">
											<div class="yrlabel"> <?php echo $yr; ?> </div>
											<div class="total-per-year"> <?php echo $data['unrelated']."/".$data['total']; ?> </div>
										</div>
										<?php
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		<?php
		foreach($courses AS $course){
			if($byCourse = getTotalByCourse($course)){
			?>
			<div class="trend-results-wrapper">
				<div class="trend-results-header">
					<h4> <?php echo $course; ?> </h4>
				</div>
				<div class="trc-outer">
					<div class="trend-results-content">
						<div class="trc-header">
							<h4> Employed </h4>
						</div>
						<div class="trc-inner">
							<div class="trc-bars-wrapper">
								<?php
								foreach($byCourse AS $yr => $data){
									$percent = number_format(($data['emps'] / $data['total'] ) * 100,0) ;
									$percent .= "%";
									?>
									<div class="outer-bar">
										<?php echo (count($yr) > 0) ? "<div style='height: $percent;'>$percent</div>" : "<div style='backround: none; color: #333;'>0%</div>"; ?>
									</div>
									<?php
								}
							?>
							</div>
							<div class="trc-years-wrapper">
							<?php
								foreach($byCourse AS $yr => $data){
									?>
									<div class="bottom-label">
										<div class="yrlabel"> <?php echo $yr; ?> </div>
										<div class="total-per-year"> <?php echo $data['emps']."/".$data['total']; ?> </div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="trend-results-content">
						<div class="trc-header">
							<h4> Self-Employed </h4>
						</div>
						<div class="trc-inner">
							<div class="trc-bars-wrapper">
								<?php
								foreach($byCourse AS $yr => $data){
									$percent = number_format(($data['semps'] / $data['total'] ) * 100,0) ;
									$percent .= "%";
									?>
									<div class="outer-bar">
										<?php echo (count($yr) > 0) ? "<div style='height: $percent;'>$percent</div>" : "<div style='backround: none; color: #333;'>0%</div>"; ?>
									</div>
									<?php
								}
							?>
							</div>
							<div class="trc-years-wrapper">
							<?php
								foreach($byCourse AS $yr => $data){
									?>
									<div class="bottom-label">
										<div class="yrlabel"> <?php echo $yr; ?> </div>
										<div class="total-per-year"> <?php echo $data['semps']."/".$data['total']; ?> </div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="trend-results-content">
						<div class="trc-header">
							<h4> Unemployed </h4>
						</div>
						<div class="trc-inner">
							<div class="trc-bars-wrapper">
								<?php
								foreach($byCourse AS $yr => $data){
									$percent = number_format(($data['unemps'] / $data['total'] ) * 100,0) 	 	 ;
									$percent .= "%";
									?>
									<div class="outer-bar">
										<?php echo (count($yr) > 0) ? "<div style='height: $percent;'>$percent</div>" : "<div style='backround: none; color: #333;'>0%</div>"; ?>
									</div>
									<?php
								}
							?>
							</div>
							<div class="trc-years-wrapper">
							<?php
								foreach($byCourse AS $yr => $data){
									?>
									<div class="bottom-label">
										<div class="yrlabel"> <?php echo $yr; ?> </div>
										<div class="total-per-year"> <?php echo $data['unemps']."/".$data['total']; ?> </div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			}
		}
		?>
		<!--
		<?php
		foreach($courses AS $course){
		?>
		<div class="trend-results-wrapper">
			<div class="trend-results-header">
				<h4> <?php echo $course; ?> </h4>
			</div>
			<div class="trc-outer">
				<?php foreach($empStats AS $empStat){ ?>
				<div class="trend-results-content">
					<div class="trc-header">
						<h4> <?php echo $empStat; ?> </h4>
					</div>
					<div class="trc-inner">
						<div class="trc-bars-wrapper">
							<?php
							$counts = [];
							$years = [];
							$select1 = $db->query("SELECT date_graduated FROM alumni WHERE course = '$course' GROUP BY YEAR(date_graduated) ORDER BY date_graduated ASC");
							while($fetch1 = $select1->fetch_object()){
								$year = date('Y',strtotime($fetch1->date_graduated));
								$select2 = $db->query("SELECT * FROM alumni WHERE course = '$course' AND date_graduated LIKE '$year%' AND employment_status IS NOT NULL ");
								$select3 = $db->query("SELECT * FROM alumni WHERE course = '$course' AND date_graduated LIKE '$year%' AND employment_status = '$empStat'");
								if($select2->num_rows > 0){
									$count = ($select3->num_rows / $select2->num_rows ) * 100;
								}else{
									$count = 0;
								}
								$counts[] = $count;
								$years[] = $year;
								$updated_stat[$year] = $select3->num_rows;
								$updated_total[$year] = $select2->num_rows;
								?>
								<?php
							}
							foreach($counts AS $total){
								$percent = (int)$total.'%';
								echo "<div class='outer-bar'>".($total > 0 ? "<div style='height: $percent;'>$percent</div>" : "<div style='background:none; color: #333;'>0%</div>")."</div>";
							}
							?>
						</div>
						<div class="trc-years-wrapper">
							<?php
								foreach($years AS $yearLabel){
									?>
									<div class="bottom-label">
										<div class="yrlabel"> <?php echo $yearLabel;?> </div>
										<div class="total-per-year"> <?php echo $updated_stat[$yearLabel].'/'.$updated_total[$yearLabel];?> </div>
									</div>
									<?php
								}
							?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php }?>
		!-->
	</div>
	<div class="trends-footer">
	
	</div>
</div>
<?php

include 'footer.php';