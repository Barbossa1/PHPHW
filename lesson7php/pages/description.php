<?php
$sql = 'SELECT id, goods_name, goods_price, goods_description, goods_img FROM goods WHERE id = ' . getId();
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($result);

$good = <<<php
    	<h2>{$row['goods_name']}</h2>
    	<h2>{$row['goods_price']}</h2>
    	<h2>{$row['goods_description']}</h2>
php;

echo '<h1>Товар</h1>' . $good;