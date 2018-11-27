<div class="alumni-input-row">
	<div class="alumni-fieldset" style="flex-grow: 2;">
		<div class="input-wrapper">
			<input type="text" id="nature-of-employment" autofocus />
			<hr />
		</div>
		<label> Nature of Employment </label>
	</div>
	<div class="alumni-fieldset" style="flex-grow: 2;">
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
	<div class="alumni-fieldset" style="flex-shrink: 3;">
		<div class="input-wrapper">
			<select id="num-of-years">
				<option value=""></option>
				<option>0-5</option>
				<option>6-10</option>
				<option>10-15</option>
				<option>16 above</option>
			</select>
			<hr />
		</div>
		<label> Number of Years </label>
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