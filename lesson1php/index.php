<?php
    $heading = 'Заголовок';
    $title   = 'Название';
    $year    = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
    <h1><?php echo $heading ?></h1>
    <p>Текущий год: <?php echo $year ?></p>
</body>
</html>