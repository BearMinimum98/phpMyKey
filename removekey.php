<?php
    include_once "config.php";
    if ($_GET["key"] == $cronKey) {
		$allKeys = explode(",", file_get_contents($keysFile));
		for ($i = 0; i < count($allKeys); $i++) {
			if ($allKeys[$i] == $_GET["remove"]) {
				unset($allKeys[$i]);
				file_put_contents($keysFile, implode(",", $allKeys));
				echo $keyRemoveSuccess;
				exit;
			}
		}
		echo $keyRemoveFail;
	} else {
		echo $keyRemoveIncorrect;
	}
?>