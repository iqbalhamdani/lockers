<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
</head>
<body>
	<?php
	$dt = gmdate("d-m-Y / H:i", time()+60*60*7);
	echo $dt;
	?>
</body>
</html>
