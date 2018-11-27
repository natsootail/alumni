<?php
require 'db.php';
require 'functions-validate.php';
session_start();
$we_id = validate($_POST['id']);
$alumni_id = validate($_SESSION['alumni_id']);
$select = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$alumni_id' AND we_id = '$we_id'");
if($select->num_rows == 0) header('location: index.php');
$we = $select->fetch_object();
$exps = $db->query("SELECT * FROM experienced_fields LEFT JOIN skills ON experienced_fields.skill_id = skills.skill_id WHERE we_id = '$we_id'");
$skills = $db->query("SELECT * FROM skills");
?>
<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close"> &times; </button>
		<h4> Add Work Experience </h4>
	</div>
	<div class="at-modal-content">
		<form class="experience-form" id="experience-form-update" method="post" action="experience-submit-update.php">
			<input type="hidden" name="we_id" value="<?php echo $we_id;?>" />
			<fieldset class="ef-fieldset">
				
			</fieldset>
			<fieldset class="ef-fieldset" id="fs-company-name">
				<input type="text" name="company-name" placeholder="Company Name" value="<?php echo $we->company_name; ?>"/>
				<label> Company Name </label>
			</fieldset>
			<fieldset class="ef-fieldset" id="fs-position-level">
				<select name="position-level">
					<option value="<?php echo $we->position_level;?>"><?php echo $we->position_level;?></option>
					<option value="Lower"> Lower </option>
					<option value="Middle"> Middle </option>
					<option value="Upper"> Upper </option>
				</select>
				<label> Position Level </label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<input type="text" name="position-name" placeholder="Position/Job Name" value="<?php echo $we->position_name; ?>" required />
				<label> Position Name </label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<input type="date" name="date-start" value="<?php echo $we->we_date_start; ?>" required />
				<label> Employment Date - Start </label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<input type="date" name="date-end" value="<?php echo $we->we_date_end; ?>" />
				<label> Employment Date - End <br/>(<i> Leave blank if still ongoing </i>) </label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<div class="is_it_related">
					<label class="radio-label">
						<input type="radio" name="is_it_related" value="1" <?php echo ($we->is_it_related == 1) ? "checked" : "";?> />
						<div> Yes </div>
					</label>
					<label class="radio-label">
						<input type="radio" name="is_it_related" value="0" <?php echo ($we->is_it_related != 1) ? "checked" : "";?> />
						<div> No </div>
					</label>
				</div>
				<label> Is this job IT related? </label>
			</fieldset>
<!--
			<fieldset class="ef-fieldset">
				<input type="number" name="num-of-years" placeholder="Number of Years" required />
				<label> Number of Years </label>
			</fieldset>
!-->
			<h4 class="ef-label"> Fields of Experience </h4>
			<?php
			while($exp = $exps->fetch_object()){
				?>
				<fieldset class="ef-fieldset added-experience">
				<select name="fields[<?php echo $exp->ef_id;?>]" id="fields">
					<option value="<?php echo $exp->skill_id;?>"> <?php echo $exp->skill_name;?> </option>
				</select>
				</fieldset>
				<?php
			}
			?>
			<button class="ef-btn" type="button" id="add-field"> Add Field </button>
			<button class="ef-btn"> Submit </button>
		</form>
	</div>
</div>