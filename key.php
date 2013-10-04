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
            foreach ($keys as $currentKey) {
                if ($_POST["key"] == $currentKey and strlen($_POST["key"]) != 0 and strpos(file_get_contents($checkFile), $currentKey) === false) {
    		    	echo $content;
				    $current = file_get_contents($checkFile);
				    $current .= $currentKey . "\n";
				    file_put_contents($checkFile, $current);
                    exit;
			    } elseif ($_POST["key"] == $currentKey and strlen($_POST["key"]) != 0 and strpos(file_get_contents($checkFile), $currentKey) !== false) {
                    echo $redeemedErrMsg;
                    exit;
			    }
            }
			echo $keyErrMsg;
		?>
	</body>
</html>