<?php
	include_once "config.php";	
	if ($_GET["key"] == $cronKey) {
		$canProceed = true;
		for ($i = 0; $i < count($keys); $i++) {
			if ($keys[$i] == $_GET["add"]) {
				$canProceed = false;
			}
		}
		if ($canProceed) {
			$keys[] = $_GET["add"];
			file_put_contents($keysFile, implode(",", $keys));
			echo $keyAddSuccess;
		} else {
			echo $keyAddFail;
		}
	} else {
		echo $keyAddIncorrect;
	}
?>