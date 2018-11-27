<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Answer Security Questions </h4>
	</div>
	<div class="at-modal-content">
		<form class="sq-form" action="validate-answers.php" method="post" id="sq-form-fp">
		<?php
		session_start();
		require 'db.php';
		require 'functions-validate.php';
		$alumni_id = validate($_SESSION['forgetful_alumni']);
		$questions = $db->query("SELECT * FROM alumni_sq_answers LEFT JOIN security_questions ON alumni_sq_answers.sq_id = security_questions.sq_id WHERE alumni_id = '$alumni_id'");
		if($questions->num_rows > 0){
			while($question = $questions->fetch_object()){
				?>
				<div class="sq-row">
					<div class="sq-fieldset">
						<label> <?php echo $question->security_question; ?> </label>
						<div class="input-wrapper">
							<input type="text" name="answer[<?php echo $question->answer_id;?>]" />
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>
		<div class="sq-row sq-btns">
			<button class="sq-btn" id="submit"> Submit </button>
		</div>
		</form>
	</div>
	<div class="at-modal-footer"></div>
</div>