<?php
	include_once "config.php";
	if ($_GET["key"] == $cronKey) {
		mysql_query("DELETE FROM myKeys WHERE myKeys = '" . mysql_real_escape_string($_GET["remove"]) . "'");
		if (mysql_error() == null) {
			echo $keyRemoveSuccess;
		} else {
			die($dbError);
		}
	} else {
		echo $keyRemoveIncorrect;
	}
?>