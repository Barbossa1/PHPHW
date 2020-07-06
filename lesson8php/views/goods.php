<h1><?= $title?></h1>
<?php foreach($rows as $row) :?>
    <h2><?= $row['goods_name'] ?></h2>
    <p><?= $row['goods_price'] ?>р.</p>
    <p><a href="?p=good&a=one&id=<?= $row['id'] ?>">Подробнее</a></p>
    <p style="cursor: pointer; color: blue;" onclick="send('<?= $row['id'] ?>')">В корзину</p><hr>
<?php endforeach;?>


<script>
    function send(id) {
        jQuery.ajax({
            url: "?p=cart&a=jquery",
            type: 'post',
            data: {id: id},
            success: function (response) {
                jQuery('#countCart').html(response.count);
                console.log(response)
            }
        });
    }
</script>