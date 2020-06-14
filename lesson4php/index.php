<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lesson4</title>
</head>
<body>
	<?php

  	$dir = "img/";
	$files = scandir($dir);

	$log = "Пользователь зашел на сайт.";
	logger($log);

	for ($i = 0; $i < count($files); $i++) {
  		if ($files[$i] != '.' && $files[$i] != '..') {
			    echo '<a href="' . $dir . $files[$i] . '" target="_blank"><img src=' . $dir . $files[$i] . ' style="width: 200px;"></a>';
		}
	}
	?>

	</br>
	</br>

	<?php

	if (isset($_FILES['image'])) {
		$errors = [];
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

		$expensions = [
			"jpeg", "jpg", "png",
		];

		if ($file_size > 2097152) {
			$errors[] = 'Файл должен быть 2 мб.';
		}

		if (empty($errors) == true) {
			move_uploaded_file($file_tmp, "img/".$file_name);
			echo "Успех!";
		} else {
			print $errors;
		}
	}

	?>

	</br>
	</br>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit">

		<ul>
			<li>Sent file: <?php echo $_FILES['image']['name'] ?></li>
			<li>File size: <?php echo $_FILES['image']['size'] ?></li>
			<li>File type: <?php echo $_FILES['image']['type'] ?></li>
		</ul>
	</form>

	</br>
	</br>

	<?php
	
	function logger($log) {

		if (!file_exists('log.txt')) {
			file_put_contents('log.txt', '');
		}

		$ip = $_SERVER['REMOTE_ADDR'];
		date_default_timezone_set('Russia/Moscow');
		$time = date('d/m/y h:iA', time());

		$contents = file_get_contents('log.txt');
		$contents .= "$ip\t$time\t$log\r";

		if (filesize('log.txt') <= 700) {
			file_put_contents('log.txt', $contents);
		} else {
			file_put_contents('log2.txt', $contents);
			unlink('log.txt');
		}
	}

	?>

</body>
</html>

