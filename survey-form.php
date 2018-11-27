<?php

require 'db.php';
$skills_arr = array();
$skills = $db->query("SELECT * FROM skills LEFT JOIN categories ON skills.category_id = categories.category_id");
while($skill = $skills->fetch_object()){
	$skills_arr[$skill->category_name][$skill->skill_id] = $skill->skill_name;
}
?>

<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close"> &times; </button>
		<h4> <span class="glyphicon glyphicon-pencil"></span> Skills Rating </h4>
	</div>
	<div class="at-modal-content">
		<form class="alumni-form" method="post" action="submit-rating.php" id="rating-form">
<!--
			<div class="alumni-input-row">
				<label class="employment-label">
					<input type="radio" name="employment-status" id="employment-status-survey" value="Employed" />
					<div class="employment-option"> Employed </div>
				</label>
				<label class="employment-label">
					<input type="radio" name="employment-status" id="employment-status-survey" value="Self-Employed" />
					<div class="employment-option"> Self-Employed </div>
				</label>
				<label class="employment-label">
					<input type="radio" name="employment-status" id="employment-status-survey" value="Unemployed" checked />
					<div class="employment-option"> Unemployed </div>
				</label>
			</div>
			<div class="alumni-input-row" id="company-field">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="company" placeholder="Company Name" />
						<hr />
					</div>
					<label> Company Name </label>
				</div>
			</div>
!-->
			<?php
			foreach($skills_arr AS $category => $skills1){
				?>
				<div class="skills-category">
					<h4> <?php echo $category; ?> </h4>
				</div>
				<?php
				foreach($skills1 AS $skill_id => $skill_name){
					?>
					<div class="skills-rating-wrapper">
						<div class="skills-label">
							<h4> <?php echo $skill_name; ?> </h4>
						</div>
						<div class="skills-range" data-id="<?php echo "skill$skill_id"; ?>">
							<?php
							for($i = 1; $i <= 10; $i++){
								?>
								<label class="skill-rating">
									<input type="radio" name="skill[<?php echo $skill_id;?>]" id="skill-rating" value="<?php echo $i;?>" />
									<h4> <?php echo $i;?> </h4>
								</label>
								<?php
							}
							?>
						</div>
					</div>
					<?php
				}
			}
			?>
			<div class="alumni-input-row btns">
				<button name="submit-rating"> Submit </button>
			</div>
		</form>
	</div>
</div>