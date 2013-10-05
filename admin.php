<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
    <head>
        <title>phpMyKey admin page</title>
    </head>
    <body>
        <?php
            include_once("config.php");
            if ($_GET["key"] == $cronKey) {
                //show admin stuff
                echo $adminContent;
            } else {
                //DENIED
                echo $adminAuthFail;
            }
        ?>
    </body>
</html>