<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<input type="text" id="employer-name" autofocus />
			<hr />
		</div>
		<label> Employer/Organization Name </label>
	</div>
</div>
<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<input list="workfields" id="workfield" placeholder=" example: BPO, Bank, etc." />
			<datalist id="workfields">
			<?php
			require 'db.php';
			$workfields = $db->query("SELECT employment_workfield FROM alumni GROUP BY employment_workfield");
			while($workfield = $workfields->fetch_object()){
				?>
				<option value="<?php echo $workfield->employment_workfield;?>" />
				<?php
			}
			?>
			</datalist>
			<hr />
		</div>
		<label> Workfield </label>
	</div>
</div>
<div class="alumni-input-row">
	<label class="org-type">
		<input type="radio" name="org-type" id="org-type" value="Private" />
		<div class="org-type-option"> Private </div>
	</label>
	<label class="org-type">
		<input type="radio" name="org-type" id="org-type" value="Public" />
		<div class="org-type-option"> Public </div>
	</label>
	<label class="org-type">
		<input type="radio" name="org-type" id="org-type" value="NGO" />
		<div class="org-type-option"> NGO </div>
	</label>
	<label class="org-type">
		<input type="radio" name="org-type" id="org-type" value="Non-Profit" />
		<div class="org-type-option"> Non-Profit </div>
	</label>
</div>
<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<input list="employment-type" id="employment-type-val" />
			<hr />
			<datalist id="employment-type">
				<option value="Working Fulltime" />
				<option value="Working Part-time" />
				<option value="Working Part-time but seeking Fulltime Work" />
				<option value="Working Part-time but NOT seeking Fulltime Work" />
			</datalist>
		</div>
		<label> Employment Type </label>
	</div>
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<input list="occupation-type" id="occupation-type-val" />
			<hr />
			<datalist id="occupation-type">
				<option value="Official of Government and Special-Interest Organizations" />
				<option value="Corporate Executive or Manager" />
				<option value="Managing Proprietor or Supervisor" />
				<option value="Technician of Associate Professional" />
				<option value="Clerk" />
				<option value="Service Worker or Shop and Market Sales Worker" />
				<option value="Farmer or Forestry Worker of Fisherman" />
				<option value="Trader or Related Worker" />
				<option value="Plant and Machine Operator Assembler" />
				<option value="Laborer or Unskilled Worker" />
				<option value="Special Occupation" />
			</datalist>
		</div>
		<label>	Occupational Classification </label>
	</div>
</div>
<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<select id="num-of-months">
				<option></option>
				<option>1-5</option>
				<option>6-10</option>
				<option>11-15</option>
				<option>16-20</option>
				<option>21-25</option>
				<option>25 above</option>
			</select>
			<hr />
		</div>
		<label> Number of Months in the Company </label>
	</div>
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<select id="place-of-work">
				<option value=""></option>
				<option>Local</option>
				<option>Abroad</option>
			</select>
			<hr />
		</div>
		<label> Place of Work </label>
	</div>
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<select id="is-first-job">
				<option value=""></option>
				<option>Yes</option>
				<option>No</option>
			</select>
			<hr />
		</div>
		<label> Is this your First Job after Graduating? </label>
	</div>
</div>
<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<textarea id="reason" rows="3"></textarea>
			<hr />
		</div>
		<label> Please state your Reason for staying on the job </label>
	</div>
</div>
<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<input type="text" id="designation" />
			<hr />
		</div>
		<label> Designation </label>
	</div>
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<input type="text" id="department" />
			<hr />
		</div>
		<label> Department/Division </label>
	</div>
</div>
<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<select id="status">
				<option value=""></option>
				<option>Permanent</option>
				<option>Contractual</option>
				<option>Casual</option>
			</select>
			<hr />
		</div>
		<label> Status </label>
	</div>
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<select id="monthly-income-range">
				<option value=""></option>
				<option>Below 10,000</option>
				<option>10,000 - 20,000</option>
				<option>21,000 - 30,000</option>
				<option>31,000 - 40,000</option>
				<option>41,000 - 50,000</option>
				<option>51,000 - 60,000</option>
				<option>61,000 - 70,000</option>
				<option>71,000 above</option>
			</select>
			<hr />
		</div>
		<label> Monthly Income Range </label>
	</div>
</div>

