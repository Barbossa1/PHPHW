<h1><?= $title?></h1>

<?php if(!empty($_SESSION['goods'])) :?>
<?php foreach($_SESSION['goods'] as $row) :?>
    <h2><?= $row['name'] ?></h2>
    <p><?= $row['price'] ?>р.</p>
<?php endforeach;?>
<?php endif;?>

<div class='cart'>
	<p>Количество: <?= getCountCart()?></p>
	<?php echo "<form action='' method='POST'><input type='submit' name='buyGood' value='Купить'></form><br>"?>
</div><hr>



<form action='' method='POST'>
<input type='submit' name='clear' value='Очистить'>
</div>
<p><a href="?p=good">Назад</a></p>