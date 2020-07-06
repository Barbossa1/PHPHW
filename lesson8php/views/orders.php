<h1><?= $title?></h1>
<?php if(!empty($rows)) :?>
<?php foreach($rows as $row) :?>
    	<h2><?= $row['goods_name'] ?></h2>
<?php endforeach;?>
<?php endif;?>
