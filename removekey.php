<?php
    include_once "config.php";
    if ($_GET["key"] == $cronKey and strlen($_GET["remove"]) > 0 and strpos(file_get_contents($keysFile), $_GET["remove"]) != false) {
        $keysContent = file_get_contents($keysFile);
        $keysContent = substr($keysContent, 0, strpos($keysContent, $_GET["remove"]) - 1) . substr($keysContent, strpos($keysContent, $_GET["remove"]) + strlen($_GET["remove"]));
        file_put_contents($keysFile, $keysContent);
        echo $keyRemoveSuccess;
    } elseif ($_GET["key"] == $cronKey) {
        echo $keyRemoveFail;
    } else {
        echo $keyRemoveIncorrect;
    }
?>