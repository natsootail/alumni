<?php
session_start();
require_once 'db.php';
require_once 'functions-validate.php';

$id = $_SESSION['alumni_id'];
function getSQ($question_id){
	global $db;
	global $id;
	$data = array();
	$select = $db->query("SELECT * FROM alumni_sq_answers WHERE alumni_id = '$id' AND sq_id = '$question_id'");
	$data = $select->fetch_assoc();
	return !empty($data) ? $data : false;
}

$questions = $db->query("SELECT * FROM security_questions");
?>
<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Security Questions </h4>
	</div>
	<div class="at-modal-content">
		<form method="post" action="update-security-questions.php" id="sq-update" class="sq-form" autocomplete="off">
		<?php
		while($question = $questions->fetch_object()){
			$question_id = $question->sq_id;
			$ans = getSQ($question_id);
			$answer = !empty($ans) ? $ans['alumni_answer'] : "";
			?>
			<div class="sq-row">
				<div class="sq-fieldset">
					<label> <?php echo $question->security_question; ?> </label>
					<div class="input-wrapper">
						<input type="text" name="sq[<?php echo $question_id;?>]" value="<?php echo $answer;?>" />
						<hr />
					</div>
				</div>
			</div>
			<?php
		}
		?>
		<div class="sq-row sq-btns">
			<button class="sq-btn" id="submit"> SUBMIT </button>
		</div>
		</form>
	</div>
</div>