<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>cron</title>
    </head>
    <body>
        <?php
            include_once "config.php";
            $receivedCronKey = $_GET["key"];
            if ($cronKey == $receivedCronKey) {
                if (file_put_contents($checkFile, "") == 0) {
                    echo $cronSuccessMsg;
                } else {
                    echo $cronErrMsg;
                }
            } else {
                echo $cronIncorrectKey;
            }
        ?>
    </body>
</html>