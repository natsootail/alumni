<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Additional Educational Attainment </h4>
	</div>
	<div class="at-modal-content">
		<form class="educ-bgs-form" id="educ-bgs-form" method="post" action="educ-bgs-submit.php">
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="course" placeholder="Course" required autofocus />
						<hr/>
					</div>
					<label> Course </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="school" placeholder="School" required />
						<hr/>
					</div>
					<label> School </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="date" name="date-graduated" placeholder="Date Graduated" max="<?php echo date('Y-m-d');?>" required />
						<hr/>
					</div>
					<label> Date Graduated </label>
				</div>
			</div>
			<div class="alumni-input-row btns">
				<button> Submit </button>
			</div>
		</form>
	</div>
	<div class="at-modal-footer"></div>
</div>