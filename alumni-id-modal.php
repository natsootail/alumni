<?php
session_start();
if(!isset($_SESSION['show-update-form']) || $_SESSION['show-update-form'] == 0){
?>
<div class="at-modal-wrapper" id="alumni-id-modal">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Enter your ID Number </h4>
	</div>
	<div class="at-modal-content">
		<form method="post" action="validate-id-number.php" id="id-number-form">
			<input type="text" name="id-number" placeholder="ID Number" required autofocus />
			<button class="submit-id-number"> Next </button>
		</form>
	</div>
	<div class="at-modal-footer"></div>
</div>
<?php }else{ ?>
<div class="at-modal-wrapper" id="change-pass-modal">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Change Password </h4>
	</div>
	<div class="at-modal-content">
		<form method="post" action="update-forgotten-pass.php" id="update-forgotten-pass">
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="verification-code" maxlength="5" placeholder="Verification Code" />
						<hr />
					</div>
					<label> Verification Code </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="password" name="password" placeholder="Password" />
						<hr />
					</div>
					<label> New Password </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="password" name="confirm-password" placeholder="Confirm Password" />
						<hr />
					</div>
					<label> Confirm Password </label>
				</div>
			</div>
			<div class="alumni-input-row btns">
				<button id="submit-new-pass"> Submit </button>
			</div>
		</form>
	</div>
	<div class="at-modal-footer"></div>
</div>
<?php } ?>