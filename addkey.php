<?php
    include_once "config.php";
    if ($_GET["key"] == $cronKey and strlen($_GET["add"]) > 0 and strpos(file_get_contents($keysFile), $_GET["add"]) === false) {
        $keysContent = file_get_contents($keysFile);
        $keysContent .= "," . $_GET["add"];
        file_put_contents($keysFile, $keysContent);
        echo $keyAddSuccess;
    } elseif ($_GET["key"] == $cronKey) {
        echo $keyAddFail;
    } else {
        echo $keyAddIncorrect;
    }
?>