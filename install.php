<!DOCTYPE html>
<html>
	<head>
		<title>Install phpMyKey</title>
	</head>
	<body>
		<?php
			include_once "config.php";
			mysql_connect($dbaddress, $username, $password);
			mysql_select_db($dbname);
			if ($_POST["key"] != $cronKey) {
				if (mysql_error() == null) {
					if (mysql_query("DESCRIBE " . $dbPrefix . $keysTable) === false) {
						echo "Welcome to the phpMyKey installer. Installer has detected correct database settings and can proceed. Please click the button to continue.";
						echo "<form action='install.php' method='post'><input type='hidden' value='$cronKey' name='key' /><input type='submit' value='Install' /></form>";
					} else {
						echo "phpMyKey is already installed.";
					}
				} else {
					echo "Database has not been configured in config.php. Please configure your database settings and then reload this page.";
				}
			} else {
				if (mysql_error() == null) {
					if (mysql_query("DESCRIBE " . $dbPrefix . $keysTable) === false) {
						mysql_query("CREATE TABLE " . $dbPrefix . $keysTable . "($keysColumn CHAR(30));");
						mysql_query("CREATE TABLE " . $dbPrefix . $keysTable . "($usedColumn CHAR(30));");
						echo "phpMyKey has now been installed. The default cron (admin) key is $cronKey. You can change this by using the admin menu";
					} else {
						echo "phpMyKey is already installed.";
					}
				} else {
					echo "Database error - check your database settings and permissions";
				}
			}
		?>
	</body>
</html>