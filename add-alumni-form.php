<input type="hidden" id="init-alumni-id" value="0" />
<div class="at-modal-wrapper" id="add-alumni-form">
	<div class="at-modal-header">
		<button class="close"> &times; </button>
		<h4> Add Alumni </h4>
	</div>
	<div class="at-modal-content">
		<div class="alumni-form">
			<div class="alumni-input-row" id="fields-label">
				<h4> <span class="glyphicon glyphicon-info-sign"></span> Personal Information </h4>
			</div>
			<div class="alumni-input-row">	
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="id-number" autofocus />
						<hr />
					</div>
					<label> ID Number </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="password" id="password" />
						<hr />
					</div>
					<label> Password </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="lname" />
						<hr />
					</div>
					<label> Last Name </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="fname" />
						<hr />
					</div>
					<label> First Name </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="mname" />
						<hr />
					</div>
					<label> Middle Name </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="address-present" />
						<hr />
					</div>
					<label> Present Address </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="address-permanent" />
						<hr />
					</div>
					<label> Permanent Address </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<select id="gender">
							<option></option>
							<option>Male</option>
							<option>Female</option>
						</select>
						<hr />
					</div>
					<label> Gender </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="date" id="date-of-birth" />
						<hr />
					</div>
					<label> Date of Birth </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<select id="civil-status">
							<option></option>
							<option>Single</option>
							<option>Married</option>
							<option>Separated</option>
							<option>Widowed</option>
						</select>
						<hr />
					</div>
					<label> Civil Status </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="place-of-birth" />
						<hr />
					</div>
					<label> Place of Birth </labeL>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset email-add-fieldset">
					<div class="input-wrapper">
						<input type="text" name="email-address[]" id="email-address" placeholder="Email Address" required />
						<hr />
					</div>
					<label> E-mail Address <button class="add-email-add" id="form-add-email-add">ADD FIELD</button></label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="mobile-number" />
						<hr />
					</div>
					<label> Mobile Number </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="youtube-link" placeholder="Youtube Channel" />
						<hr />
					</div>
					<label> Youtube </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="blog-link" />
						<hr />
					</div>
					<label> Blog </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="facebook-url" placeholder="Your Facebook Profile URL" />
						<hr />
					</div>
					<label> Facebook </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="twitter-acc" />
						<hr />
					</div>
					<label> Twitter </label>
				</div>
			</div>
			<div class="alumni-input-row" id="fields-label">
				<h4> <span class="glyphicon glyphicon-user"></span> Parents/Guardians Information </h4>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_fname1" placeholder="First Name" />
						<hr />
					</div>
					<label> First Name </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_mname1" placeholder="Middle Name" />
						<hr />
					</div>
					<label> Middle Name </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_lname1" placeholder="Last Name" />
						<hr />
					</div>
					<label> Last Name </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="date" id="parents_bday1" placeholder="Birthdate" />
						<hr />
					</div>
					<label> Birthdate </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<select id="parents_gender1">
							<option value="">-----</option>
							<option value="Male"> MALE </option>
							<option value="Female"> FEMALE </option>
						</select>
					</div>
					<label> Gender </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_relationship1" placeholder="Relationship to Alumni" />
						<hr />
					</div>
					<label> Relationship to Alumni </label>
				</div>
			</div>
			<hr />
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_fname2" placeholder="First Name" />
						<hr />
					</div>
					<label> First Name </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_mname2" placeholder="Middle Name" />
						<hr />
					</div>
					<label> Middle Name </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_lname2" placeholder="Last Name" />
						<hr />
					</div>
					<label> Last Name </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="date" id="parents_bday2" placeholder="Birthdate" />
						<hr />
					</div>
					<label> Birthdate </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<select id="parents_gender2">
							<option value="">-----</option>
							<option value="Male"> MALE </option>
							<option value="Female"> FEMALE </option>
						</select>
					</div>
					<label> Gender </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" id="parents_relationship2" placeholder="Relationship to Alumni" />
						<hr />
					</div>
					<label> Relationship to Alumni </label>
				</div>
			</div>
			<div class="alumni-input-row" id="fields-label">
				<h4> <span class="glyphicon glyphicon-education"></span> Educational Background </h4>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<select id="course">
							<option></option>
							<option> Bachelor of Science in Computer Science </option>
							<option> Bachelor of Science in Information System </option>
							<option> Bachelor of Science in Information Technology </option>
							<option> Masters in Information Technology </option>
							<option> Library Science </option>
							<option> Entertainment Multimedia Computing </option>
						</select>
						<hr />
					</div>
					<label> Course </label>
				</div>
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="date" max="<?php echo date('Y/m/d');?>" id="date-graduated" />
						<hr />
					</div>
					<label> Date Graduated </label>
				</div>
			</div>
			<div class="alumni-input-row btns">
				<button id="submit-alumni-form"> Submit </button>
			</div>
		</div>
	</div>
	<div class="at-modal-footer">
	
	</div>
</div>