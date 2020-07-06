<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    $sql = 'SELECT `id`, `user_login`, `goods_name` FROM `orders`';
    $result = mysqli_query(getLink(), $sql);
    //$row = mysqli_fetch_assoc($result);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($row as $key) {
	    if ($key{'user_login'} == $_SESSION['user']["user_login"]) {

			$sqlGoods = 'SELECT `id`, `user_login`, `goods_name` FROM `orders`';
			$result1 = mysqli_query(getLink(), $sqlGoods);
			$rows = mysqli_fetch_all($result1, MYSQLI_ASSOC);
		}
    }

    echo render(
        'orders.php',
        ['rows' => $rows, 'title' => 'Заказы']); 
}