<?php
require 'db.php';

$skills = $db->query("SELECT * FROM skills");
?>
<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close"> &times; </button>
		<h4> Add Work Experience </h4>
	</div>
	<div class="at-modal-content">
		<form class="experience-form" id="experience-form" method="post" action="experience-submit.php">
			<fieldset class="ef-fieldset">
				
			</fieldset>
			<fieldset class="ef-fieldset" id="fs-company-name">
				<input type="text" name="company-name" placeholder="Company Name" />
				<label> Company Name <br/> (<i> Leave blank if Self-Employed </i>) </label>
			</fieldset>
			<fieldset class="ef-fieldset" id="fs-position-level">
				<select name="position-level">
					<option value="0">----</option>
					<option value="Lower"> Lower </option>
					<option value="Middle"> Middle </option>
					<option value="Upper"> Upper </option>
				</select>
				<label> Position Level <br/> (<i> Leave blank if Self-Employed </i>)</label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<input type="text" name="position-name" placeholder="Position/Job Name" required />
				<label> Position Name </label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<input type="date" name="date-start" required />
				<label> Employment Date - Start </label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<input type="date" name="date-end" />
				<label> Employment Date - End <br/>(<i> Leave blank if still ongoing </i>) </label>
			</fieldset>
			<fieldset class="ef-fieldset">
				<div class="is_it_related">
					<label class="radio-label">
						<input type="radio" name="is_it_related" value="1" checked />
						<div> Yes </div>
					</label>
					<label class="radio-label">
						<input type="radio" name="is_it_related" value="0" />
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
			<fieldset class="ef-fieldset added-experience">
			<select name="fields[]" id="fields">
				<option value="0"></option>
				<?php
				while($skill = $skills->fetch_object()){
					?>
					<option value="<?php echo $skill->skill_id;?>"> <?php echo $skill->skill_name; ?> </option>
					<?php
				}
				?>
			</select>
			</fieldset>
			<button class="ef-btn" type="button" id="add-field"> Add Field </button>
			<button class="ef-btn"> Submit </button>
		</form>
	</div>
</div>