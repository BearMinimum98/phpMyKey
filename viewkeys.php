<?php
	include_once "config.php";
	if ($_GET["key"] == $cronKey) {
		echo "<select multiple='multiple' size='10' style='width:200px;' id='keyslist'>";
		foreach($keys as $currentKey) {
			if ($currentKey != "")
				echo "<option value='$currentKey'>$currentKey</option>";
		}
		echo "</select><br />Total keys: " . count($keys);
		//add addkey and removekey functionality here
	} else {
		echo $keyRemoveIncorrect;
	}
?>