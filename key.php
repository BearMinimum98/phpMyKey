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
                if ($_POST["key"] == $keys[$i] and strlen($_POST["key"]) != 0) {
                    $used = explode("\n", file_get_contents($checkFile));
                    $canProceed = true;
                    for ($j = 0; $j < count($used); $j++) {
                        if ($used[$j] == $_POST["key"]) {
                            $canProceed = false;
                        }
                    }
                    
                    if ($canProceed) {
    		    	    echo $content;
				        $current = file_get_contents($checkFile);
				        $current .= $keys[$i] . "\n";
				        file_put_contents($checkFile, $current);
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