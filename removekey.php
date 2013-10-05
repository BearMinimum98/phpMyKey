<?php
    include_once "config.php";
    if ($_GET["key"] == $cronKey) {
		for ($i = 0; i < count($keys); $i++) {
			if ($allKeys[$i] == $_GET["remove"]) {
				unset($allKeys[$i]);
				file_put_contents($keysFile, implode(",", $allKeys));
		for ($i = 0; $i < count($keys); ++$i) {
			if ($keys[$i] == $_GET["remove"]) {
				unset($keys[$i]);
				file_put_contents($keysFile, implode(",", $keys));
				echo $keyRemoveSuccess;
				exit;
			}
		}
		echo $keyRemoveFail;
	} else {
		echo $keyRemoveIncorrect;
	}
?>