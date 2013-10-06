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
			mysql_query("INSERT INTO $keysTable VALUES ('" . mysql_real_escape_string($_GET["add"]) . "')");
            if (mysql_error() == null) {
			    echo $keyAddSuccess;
            } else {
                echo $dbError;
            }
		} else {
			echo $keyAddFail;
		}
	} else {
		echo $keyAddIncorrect;
	}
?>