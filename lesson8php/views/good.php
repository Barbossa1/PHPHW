<div id="app">
    <img style="width: 200px" src="../publick/img/goods/<?= $row['goods_img'] ?>" alt="">
    <h2><?= $row['goods_name'] ?></h2>
    <p><?= $row['goods_price'] ?>р.</p>
    <p><?= $row['goods_description'] ?></p>
    <p>
        <p style="cursor: pointer; color: blue;" @click="addGood">В корзину</p>
        <a href="?p=good">Назад</a>
    </p>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            goodsId: '<?= getId()?>'
        },
        methods: {
            addGood() {
                let form = new FormData();
                form.append('goodId', this.goodsId);
                axios.post(
                    '?p=cart&a=axiosAdd',
                    form
                ).then(function (response) {
                   console.log(response);
                });
            }
        }
    })
</script>