<?php

require 'db.php';
require 'functions-validate.php';

$select = $db->query("SELECT * FROM skills");
?>
<fieldset class="ef-fieldset">
<select id="fields" name="fields[]">
<option value="0"></option>
<?php
while($fetch = $select->fetch_object()){
	if(!in_array($fetch->skill_id, $_POST['fields'])){
		?>
		<option value="<?php echo $fetch->skill_id;?>"> <?php echo $fetch->skill_name;?> </option>
		<?php
	}
}
?>
</select>
</fieldset>