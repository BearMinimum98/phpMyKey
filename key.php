<?php
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>view</title>
	</head>
	<body>
		<?php
			include_once "config.php";
			for ($i = 0; $i < count($keys);$i++) {
				if ($_POST["key"] == $keys[$i][$keysColumn] and strlen($_POST["key"]) != 0) {
					$used = array();
					$usedData = mysql_query("SELECT * FROM usedKeys");
					if (mysql_error() != null) {
						die($dbError);
					}
					while ($currentUsedKey = mysql_fetch_assoc($usedData)) {
						$used[] = $currentUsedKey[$checkColumn];
					}
					$canProceed = true;
					for ($j = 0; $j < count($used); $j++) {
						if ($used[$j] == $_POST["key"]) {
							$canProceed = false;
						}
					}
					
					if ($canProceed) {
						echo file_get_contents($content);
						mysql_query("INSERT INTO usedKeys VALUES ('" . $_POST["key"] . "')");
						if (mysql_error() != null) {
							die($dbError);
						}
						exit;
					} else {
						echo $redeemedErrMsg;
						exit;
					}
				}
			}
			echo $keyErrMsg;
		?>
	</body>
</html>