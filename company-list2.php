<?php

require 'db.php';
require 'functions-validate.php';

if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){
	$keyword = validate($_POST['keyword']);
	$select = $db->query("SELECT company_qualifications.*, companies.*, skills.*, company_qualifications.status AS position_status FROM company_qualifications
		RIGHT JOIN companies ON company_qualifications.company_id = companies.company_id
		LEFT JOIN skills ON company_qualifications.skill_id = skills.skill_id
		WHERE company_name LIKE '%$keyword%'");
}else{
	$select = $db->query("SELECT company_qualifications.*, companies.*, skills.*, company_qualifications.status AS position_status FROM company_qualifications
		RIGHT JOIN companies ON company_qualifications.company_id = companies.company_id
		LEFT JOIN skills ON company_qualifications.skill_id = skills.skill_id");
}

if($select->num_rows > 0 ){
	$skills = array();
	$company_name = array();
	while($fetch = $select->fetch_object()){
		$company_name[$fetch->company_id] = $fetch->company_name;
		$skills[$fetch->company_id][$fetch->cq_id]['skill'] = $fetch->skill_name;
		$skills[$fetch->company_id][$fetch->cq_id]['rating'] = $fetch->rating;
		$skills[$fetch->company_id][$fetch->cq_id]['status'] = $fetch->position_status;
	}
	?>
	<table class="company-table">
		<thead>
			<tr>
				<th> Company Name </th>
				<th> Required Skills </th>
				<th> Required Rating </th>
				<!--
				<th> Status </th>
				<th> Actions </th>
				!-->
			</tr>
		</thead>
		<tbody>
			<?php
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
			?>
		</tbody>
	</table>
	<?php
}else{
	echo "<h4> No Data Found.</h4>";
}