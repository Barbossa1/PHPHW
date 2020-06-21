<?php
	$result = require __DIR__ . '/calc.php';
?>
<html>
<head>
    	<title>Результат</title>
</head>
<body>
    	<b>Результат вычислений:</b>
    	<br>
    	<?= $result ?>
</body>
</html>