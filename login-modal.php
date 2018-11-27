<div class="login-modal-wrapper">
	<div class="lm-header">
		<button class="close">&times;</button>
		<h4> Login <?php echo $_POST['user']; ?> </h4>
	</div>
	<div class="lm-content">
		<?php
		if($_POST['user'] == 'alumni'){
			?>
			<form class="login-form" autocomplete="off" id="login-form">
				<input type="hidden" name="user" value="alumni" />
				<div class="fieldset">
					<label> ID Number: </label>
					<div class="input-wrapper">
						<input type="text" name="alumni_id_number" autofocus>
					</div>
				</div>
				<div class="fieldset">
					<label> Password: </label>
					<div class="input-wrapper">
						<input type="password" name="password" />
					</div>
				</div>
				<a id="forgot-pass"> Forgot Password? </a>
				<div class="fieldset fieldset-btns">
					<button class="login-submit"> Login </button>
				</div>
			</form>
			<?php
		}else if($_POST['user'] == 'admin'){
			?>
			<form class="login-form" autocomplete="off" id="login-form">
				<input type="hidden" name="user" value="admin" />
				<div class="fieldset">
					<label> Username: </label>
					<div class="input-wrapper">
						<input type="text" name="username" autofocus />
					</div>
				</div>
				<div class="fieldset">
					<label> Password: </label>
					<div class="input-wrapper">
						<input type="password" name="password" />
					</div>
				</div>
				<div class="fieldset fieldset-btns">
					<button class="login-submit"> Login </button>
				</div>
			</form>
			<?php
		}else{
			exit;
		}
		?>
	</div>
	<div class="lm-footer">
	
	</div>
</div>