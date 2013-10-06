<?php
	include_once "config.php";
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	if (mysql_query("DESCRIBE " . $dbPrefix . $keysTable) === false) {
		header('Location: install.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Enter key</title>
	</head>
	<body>
		<form action="key.php" method="post">
            <h3>View content</h3>
			Key: <input type="text" name="key" /><br />
			<input type="submit" />
		</form>
        <form action="admin.php" method="get">
            <h3>Admin panel key</h3>
            Key: <input type="text" name="key" /><br />
			<input type="submit" />
        </form>
	</body>
</html>