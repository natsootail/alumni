<?php

include 'header.php';
include 'nav.php';
require 'db.php';

?>

<div class="trends-wrapper">
	<div class="trends-header">
		<h4> Trends </h4>
	</div>
	<div class="trends-content">
		<?php
		$courses[0] = "Bachelor of Science in Information System";
		$courses[1] = "Bachelor of Science in Information Technology";
		$courses[2] = "Bachelor of Science in Computer Science";
		$courses[3] = "Masters in Information Technology";
		$courses[4] = "Library Science";
		$courses[5] = "Entertainment Multimedia Computing";
		$empStats[0] = "Employed";
		$empStats[1] = "Self-Employed";
		$empStats[2] = "Unemployed";
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
		<?php } ?>
	</div>
	<div class="trends-footer">
	
	</div>
</div>
<?php

include 'footer.php';