<?php

$sql = 'SELECT id, goods_name, goods_price, goods_description, goods_img FROM goods';
$result = mysqli_query($link, $sql);

$goods = '';
while($row = mysqli_fetch_assoc($result)) {
    $goods .= <<<php
    <h2>{$row['goods_name']}</h2>
    <h2>{$row['goods_price']}</h2>
    <p><a href="?page=3&id={$row['id']}">Подробнее</a></p>

php;
}
echo '<h1>Товары</h1>' . $goods;