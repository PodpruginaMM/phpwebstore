<?php
    /**@var array $row */
?>
<div id="app">
    <img style="width: 200px" src="/img/goods/<?= $row['img'] ?>" alt="">
    <h2><?= $row['name'] ?></h2>
    <p><?= $row['price'] ?>р.</p>
    <p><?= $row['info'] ?>р.</p>
    <p>
<!--        <a href="?p=cart&a=add&id=--><?//= $row['id'] ?><!--">В корзину</a>-->
        <p style="cursor: pointer" @click="addGood">В корзину</p>
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
