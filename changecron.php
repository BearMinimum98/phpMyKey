<?php
	include_once "config.php";
	if ($_POST["key"] == $cronKey and strlen($_POST["new"]) > 0) {
		file_put_contents($cronKeyFile, $_POST["new"]);
		echo $cronChangeSuccess;
	} else {
		echo $cronChangeFail;
	}
?>