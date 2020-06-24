<?php
require 'cartSet.php';
$sql = 'SELECT id, goods_name, goods_price, goods_description, goods_img FROM goods';
$result = mysqli_query($link, $sql);
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$goods = '';
while($row = mysqli_fetch_assoc($result)) {
    	$goods .= <<<php
	<hr>    
	<h2>{$row['goods_name']}</h2>
    	<h2>{$row['goods_price']}</h2>
    	<p><a href="?page=3&id={$row['id']}">Подробнее</a></p>
	<form method='POST'>
		<input type="number" name="count">
		<input type='submit' name='add' value='Добавить'>
		<input type='submit' name='clear' value='Удалить'>
	</form>
	<hr>
php;
}

if ($cart = $_POST['add']) {
	$cart = new Cart;
	$cart->set(1);
 
	$cart->save();
} elseif ($cart = $_POST['clear']) {
	$cart = new Cart;
	$cart->delete(1);
	
	$cart->save();
}

echo htmlspecialchars($_COOKIE["cart"]);

echo '<h1>Товары</h1>' . $goods;