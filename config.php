<?php
    //db config
    $dbaddress = "";
    $dbname = "";
    $username = "";
    $password = "";
    $dbError = "Error: " . mysql_error();
    
    //basic config
    $directory = "/projects/phpmykey/test/";
    $content = "content.txt";
    $checkTable = "usedKeys";
    $checkColumn = "usedKeys";
    $keysTable = "myKeys";
    $keysColumn = "myKeys";
    $cronKeyFile = "cronkey.txt";
    
    
    mysql_connect($dbaddress, $username, $password);
    mysql_select_db($dbname);
    $receivedData = mysql_query("SELECT * FROM $keysTable");
    //the keys to the city
    $cronKey = file_get_contents($cronKeyFile);
    $keys = array();
    while ($aKey = mysql_fetch_assoc($receivedData)) {
        $keys[] = $aKey;
    }
    
    //key strings
    $redeemedErrMsg = "<script type='text/javascript'>alert('Key has been redeemed already.');window.location = 'http://$_SERVER[HTTP_HOST]" . $directory . "';</script>";
    $keyErrMsg = "<script type='text/javascript'>alert('Invalid key entered.');window.location = 'http://$_SERVER[HTTP_HOST]" . $directory . "';</script>";
    
    //cron strings
    $cronSuccessMsg = "cron success. <a href='javascript:history.back()'>back</a>";
    $cronErrMsg = "cron failed. <a href='javascript:history.back()'>back</a>";
    $cronIncorrectKey = "Key incorrect. Given: " . $receivedCronKey . " <a href='javascript:history.back()'>back</a>";
    
    //admin panel html
    $adminAuthFail = "Incorrect master key given (master key is same as cron key). Given: " . $_GET["key"];
    $addKey = "<p><h3>Add key</h3><form action='addkey.php' method='get'><input type='hidden' name='key' value='" . $cronKey . "' />Add key: <input type='text' name='add' /><input type='submit' value='add' /></form></p>";
    $viewKeys = "<p><h3>View keys</h3><form action='viewkeys.php' method='get'><input type='hidden' name='key' value='" . $cronKey . "' /><input type='submit' value='View Keys' /></form></p>";
    $removeKey = "<p><h3>Remove key</h3><form action='removekey.php' method='get'><input type='hidden' name='key' value='" . $cronKey . "' />Remove key: <input type='text' name='remove' /><input type='submit' value='Remove' /></form></p>";
    $runCron = "<p><h3>Run cron</h3><form action='cron.php' method='get'><input type='hidden' name='key' value='" . $cronKey . "' /><input type='submit' value='Run cron' /></form></p>";
	$changeCron = "<p><h3>Change cron key</h3><form action='changecron.php' method='post'><input type='hidden' name='key' value='" . $cronKey . "' /><input type='text' name='new' /><input type='submit' value='Change cron key' /></form>";
	$adminContent = "<div style='left:0px;'><h2 style='text-align:center'>Key management</h2>$addKey <br /> $removeKey <br /> $viewKeys</div><div style='right:0px;'><h2 style='text-align:center'>Cron key management</h2>$changeCron <br /> $runCron</div><div style='left:0px;top:50%;'></div><div style='right:0px;top:50%;'></div>";
    
    //addkey.php strings
    $keyAddSuccess = "key added. <a href='javascript:history.back()'>back</a>";
    $keyAddFail = "invalid key length (or key already exists). <a href='javascript:history.back()'>back</a>";
    $keyAddIncorrect = "incorrect cron key. Given: " . $_GET["key"] . " <a href='javascript:history.back()'>back</a>";
    
    //removekey.php strings
    $keyRemoveSuccess = "key removed. <a href='javascript:history.back()'>back</a>";
    $keyRemoveFail = "invalid key length (or key doesn't exist). <a href='javascript:history.back()'>back</a>";
    $keyRemoveIncorrect = "incorrect cron key. Given: " . $_GET["key"] . " <a href='javascript:history.back()'>back</a>";
	
	//changecron.php strings
	$cronChangeSuccess = "cron key changed. <a href='javascript:history.back()'>back</a>";
	$cronChangeFail = "incorrect cron key. Given: " . $_POST["key"] . " <a href='javascript:history.back()'>back</a>";
?>