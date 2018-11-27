<?php

require_once 'db.php';
require_once 'functions-validate.php';
@session_start();
if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){
	$keyword = validate($_POST['keyword']);
	$select = $db->query("SELECT position_qualifications.*, companies.*, skills.*, positions.*, position_status AS position_status FROM position_qualifications
		LEFT JOIN positions ON position_qualifications.position_id = positions.position_id
		RIGHT JOIN companies ON positions.company_id = companies.company_id
		LEFT JOIN skills ON position_qualifications.skill_id = skills.skill_id
		WHERE company_name LIKE '%$keyword%' OR position_name LIKE '%$keyword%'
		");

}else{
/*
	$select = $db->query("SELECT company_qualifications.*, companies.*, skills.*, company_qualifications.status AS position_status FROM company_qualifications
		RIGHT JOIN companies ON company_qualifications.company_id = companies.company_id
		LEFT JOIN skills ON company_qualifications.skill_id = skills.skill_id");
*/		
	$select = $db->query("SELECT * FROM position_qualifications
		LEFT JOIN positions ON position_qualifications.position_id = positions.position_id
		RIGHT JOIN companies ON positions.company_id = companies.company_id
		LEFT JOIN skills ON position_qualifications.skill_id = skills.skill_id
		");
}

if($select->num_rows > 0 ){
	$skills = array(); $position = array(); $qualifications = array(); $rowspan = array();
	$company_name = array();
	while($fetch = $select->fetch_object()){
		$company_name[$fetch->company_id] = $fetch->company_name;
		$qualifications[$fetch->company_id][$fetch->position_id][$fetch->pq_id]['skill'] = $fetch->skill_name;
		$qualifications[$fetch->company_id][$fetch->position_id][$fetch->pq_id]['rating'] = $fetch->rating;
		$qualifications[$fetch->company_id][$fetch->position_id][$fetch->pq_id]['status'] = $fetch->position_status;
		$position[$fetch->position_id] = $fetch->position_name;
		if(!isset($rowspan[$fetch->company_id])){
			$rowspan[$fetch->company_id] = 1;
		}else{
			$rowspan[$fetch->company_id]++;
		}
/*
		$skills[$fetch->company_id][$fetch->cq_id]['skill'] = $fetch->skill_name;
		$skills[$fetch->company_id][$fetch->cq_id]['rating'] = $fetch->rating;
		$skills[$fetch->company_id][$fetch->cq_id]['status'] = $fetch->position_status;
*/
	}
	?>
	<table class="company-table">
		<thead>
			<tr>
				<th> Company Name </th>
				<th> Position </th>
				<th> Required Skill </th>
				<th> Required Rating </th>
				<!--
				<th> Status </th>
				<th> Actions </th>
				!-->
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($qualifications AS $company_id => $position_ids){
				?>
				<tr class="myrow">
					<td class="compname" rowspan="<?php echo $rowspan[$company_id] + count($position_ids) - 1; ?>">
						<?php echo $company_name[$company_id]; ?>
						<button class="view-contacts" id="view-contacts" data-id="<?php echo $company_id;?>" > View Contacts </button>
					</td>
					<?php
					$x = 1;
					foreach($position_ids AS $position_id => $pq_ids){
						?>
						<td rowspan="<?php echo count($pq_ids); ?>" id="tdpos"> <?php echo $position[$position_id]; ?> </td>
						<?php
						foreach($pq_ids AS $pq_key => $pq_id){
							?>
							<td> <?php echo $pq_id['skill']; ?> </td>
							<td> <?php echo $pq_id['rating']; ?> </td>
							</tr>
							<?php
#							if($pq_id == 0) echo "<tr><td colspan='2'></td></tr>";
						}
						if($x < count($position_ids)){
						?>
						<tr><td colspan="3" class="blankcellpos"></td></tr>
						<?php
						}
						$x++;
					}
					?>
					<tr class='blanktr'>
						<td class='compactions'>
							<div class="compactions">
								<?php if(isset($_SESSION['admin_id'])){ ?>
								<button class="company-action" id="company-update" data-id="<?php echo $company_id;?>"> UPDATE </button>
								<button class="company-action" id="company-delete" data-id="<?php echo $company_id;?>"> DELETE </button>
								<?php } ?>
							</div>
						</td>
						<td colspan="3" class="blankcell"></td>
					</tr>
					<?php
			}
			
/*
			foreach($skills AS $company_id => $cq_ids){
				?>
				<tr>
					<td rowspan="<?php echo count($skills[$company_id]);?>"> <?php echo $company_name[$company_id];?> </td>
					<?php
					foreach($cq_ids AS $cq_id_key => $cq_id){
#						if($cq_id_key > 0){
						?>
						<td> <?php echo $cq_id['skill']; ?> </td>
						<td> <?php echo $cq_id['rating']; ?> </td>
						<!--
						<td> <?php echo $cq_id['status']; ?> </td>
						<td> Skills Actions </td>
						!-->
						</tr>
						<?php
#					}else{
#						echo "<tr><td colspan='2'></td></tr>";
#					}
					}
					?>
				<?php
			}
*/
			?>
		</tbody>
	</table>
	<?php
}else{
	echo "<h4> No Data Found.</h4>";
}