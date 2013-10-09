<?php
	//Edit so cronkey is also in the db instead of a file on the server.
	include_once "config.php";
	if ($_POST["key"] == $cronKey and strlen($_POST["new"]) > 0) {
		file_put_contents($cronKeyFile, $_POST["new"]);
		echo $cronChangeSuccess;
	} else {
		echo $cronChangeFail;
	}
?>
