<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lesson5</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
	
	$link = mysqli_connect('localhost', 'root', 'root', 'gallery');

	$sql = 'SELECT image_id, image_name FROM images';
	$result = mysqli_query($link, $sql);

	$img = '';

	while ($row = mysqli_fetch_assoc($result)) {
		$img .= <<<php
		{$row['image_name']}
		<hr>
php;
	}

	echo $img;
	
?>

</body>
</html>