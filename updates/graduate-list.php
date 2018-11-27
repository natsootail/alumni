<?php

@session_start();
require 'db.php';
require 'functions-validate.php';
if(isset($_SESSION['alumni_id'])){
	$id = $_SESSION['alumni_id'];
	$stmt = $db->query("SELECT * FROM alumni WHERE alumni_id = '$id'");
	$result = $stmt->fetch_object();
	$yrGrad = date('Y',strtotime($result->date_graduated));
	$course = $result->course;
}else{
	$conc = "";
	$yrGrad = "";
	$course = "";
}
if(!empty($_POST['date-from']) || !empty($_POST['date-to']) || !empty($_POST['courses']) || !empty($_POST['keyword']) || !empty($_POST['sort'])){	
	if(!empty($_POST['date-from'])){
		$date_from = validate($_POST['date-from']);
	}else{
		$date_from = "0000-00-00";
	}
	if(!empty($_POST['date-to'])){
		$date_to = validate($_POST['date-to']);
	}else{
		$yr = date('Y') + 1;
		$date_to = date("$yr-m-d");
	}
	if(!empty($_POST['sort'])){
		$sort = validate($_POST['sort']);
	}else{
		$sort = "date_graduated ASC";
	}
	if(isset($_POST['courses'])){
		$courses = [];
		foreach($_POST['courses'] AS $course){
			$course = validate($course);
			array_push($courses,"course = '$course'");
		}
		$filter_course = implode(" OR ",$courses);
	}else{
		$filter_course = "course LIKE '%'";
	}
	if(isset($_POST['keyword'])){
		$keyword = validate($_POST['keyword']);
		$keyword_filter = "(fname LIKE '%$keyword%' OR mname LIKE '%$keyword%' OR lname LIKE '%$keyword' OR alumni_id_number LIKE '%$keyword%'
			OR CONCAT(fname,' ',mname) LIKE '%$keyword%' OR CONCAT(fname,' ',lname) LIKE '%$keyword%' OR CONCAT(mname,' ',lname) LIKE '%$keyword%'
			OR CONCAT(fname,' ',mname,' ',lname) LIKE '%$keyword%') AND date_graduated LIKE '$yrGrad%'";
			
		$filter_course = "( $keyword_filter ) AND ($filter_course) AND ( date_graduated BETWEEN '$date_from' AND '$date_to')";
	}

	$select = $db->query("SELECT * FROM alumni WHERE ($filter_course) ORDER BY $sort");
}else{
	if(!isset($id)){
		$select = $db->query("SELECT * FROM alumni");
	}else{
		$select = $db->query("SELECT * FROM alumni WHERE date_graduated LIKE '$yrGrad%'");
	}
}
while($fetch = $select->fetch_object()){
	$cdg = $fetch->course.'<br/>'.date('F j, Y',strtotime($fetch->date_graduated));
	$alumni[$cdg][$fetch->alumni_id] = $fetch->fname.' '.$fetch->mname.' '.$fetch->lname;
	$id_number[$fetch->alumni_id] = $fetch->alumni_id_number;
}
?>
<?php
if(isset($alumni) && count($alumni) > 0){
	foreach($alumni AS $course_dategraduated => $alumni2){
	?>
		<div class="alumni-list-row alumni-list-content">
			<div class="alumni-list-cell alc-dcg">
				<?php echo $course_dategraduated; ?>
				<hr />
			</div>
			<div class="alumni-list">
				<?php
				$as_id = array();
				$href = array();
				foreach($alumni2 AS $id => $name){
					$dir = scandir("alumni_biodata");
					foreach($dir AS $file){
						if(stristr($file, "alumni_biodata($id)")){
							$href[$id] = "alumni_biodata/".$file;
						}
					}
				$askills = $db->query("SELECT * FROM alumni_skills WHERE alumni_id = '$id'");
					if($askills->num_rows > 0){
						$askill = $askills->fetch_object();
						$as_id[$id] = $askill->as_id;
						$as_id2 = $askill->as_id;
					}
					?>
					<div class="al-inner-row">
						<div class="alumni-list-cell" id="alumni-name">
							<?php echo $name; ?>
						</div>
						<?php if(isset($_SESSION['admin_id'])){ ?>
						<div class="alumni-list-cell alc-actions">
							<label class="alumni-actions-dd">
								<input type="checkbox" id="dd-check" />
								<div>
									<button id="view-profile" data-id="<?php echo $id;?>"> View Profile </button>
									<?php
									if(isset($as_id[$id])){
										?>
										<button onclick="window.open('view-rating.php?id=<?php echo $as_id2;?>','_blank')"> View Portfolio </button>
										<?php
									}
									?>
									<?php
									if(isset($href[$id])){
										?>
										<a href="<?php echo $href[$id];?>" download="<?php echo $name.'-biodata';?>"> <button>Download Bio-Data</button> </a> 
										<?php
									}
									if(file_exists("alumni_logs/alumni_log($id).json")){
										?>
										<button onclick="window.open('view-logs.php?id=<?php echo $id;?>','_blank')"> View Logs </button>
										<?php
									}
									?>
									<button id="delete-alumni" data-id="<?php echo $id;?>"> Delete </button>
								</div>
								<div class="dd-preview"> <span class="glyphicon glyphicon-chevron-down"></span> <span class="sa-text">SELECT ACTION</span></div>
							</label>
						</div>
						<?php } ?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	<?php
	}
}else{
	echo "<div class='no-alumni'> NO ALUMNI FOUND </div>";
}

?>
