<?php
$sql = 'SELECT cart_id, goods_name, goods_price, goods_count FROM cart';
$result = mysqli_query($link, $sql);


$cart = '';
while($row = mysqli_fetch_assoc($result)) {
	$cart .= <<<php
	<hr>
    	<h2>{$row['goods_name']}</h2>
	<h2>{$row['goods_price']}</h2>
	<h2>Количество: {$row['goods_count']}</h3>
	<form action='' method='POST'>
		<input type='submit' name='clear' value='Удалить'>
	</form>
	<hr>
php;
}

echo '<h1>Корзина</h1>' . $cart;

?>