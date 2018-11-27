<?php

require 'db.php';
if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){
	$select = $db->query("SELECT * FROM skills LEFT JOIN categorues ON skills.category_id = categories.category_id WHERE categoy_name LIKE '%$keyword%' OR skill_name LIKE '%$keyword%'");
}else{
	$select = $db->query("SELECT * FROM skills LEFT JOIN categories ON skills.category_id = categories.category_id");
}
if($select->num_rows > 0){
	$arr = array();
	$category_name = array();
	while($fetch = $select->fetch_object()){
		$arr[$fetch->category_id][$fetch->skill_id] = $fetch->skill_name;
		$category_name[$fetch->category_id] = $fetch->category_name;
	}
	foreach($arr AS $category_id => $skills){
		?>
		<h4 class="ss-category"> <?php echo $category_name[$category_id]; ?> </h4>
		<?php
		foreach($skills AS $skill_id => $skill_name){
			?>
			<div class="ss-skill">
				<h4 class="ss-name"> <?php echo $skill_name; ?> </h4>
				<button id="add-qualification" data-name="<?php echo $skill_name;?>" data-id="<?php echo $skill_id;?>"> SELECT </button>
			</div>
			<?php
		}
	}
}
?>
