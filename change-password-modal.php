<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Update Password </h4>
	</div>
	<div class="at-modal-content">
		<form method="post" action="change-password-submit.php" id="change-password-form">
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="password" name="old-password" placeholder="Old Password" required />
						<hr />
					</div>
					<label> Old Password </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="password" name="new-password" placeholder="New Password" required />
						<hr />
					</div>
					<label> New Password </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="password" name="new-password-confirm" placeholder="Re-Type New Password" required />
						<hr />
					</div>
					<label> Re-Type New Password </label>
				</div>
			</div>
			<div class="alumni-input-row btns">
				<button class="submit-passowrd"> Submit </button>
			</div>
		</form>
	</div>
</div>