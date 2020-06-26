<?php
    /**@var array $row */
?>
<div id="app">
    <img style="width: 200px" src="/img/goods/<?= $row['img'] ?>" alt="">
    <h2><?= $row['name'] ?></h2>
    <p><?= $row['price'] ?>р.</p>
    <p><?= $row['info'] ?>.</p>
    <p>
<!--        <a href="?p=cart&a=add&id=--><?//= $row['id'] ?><!--">В корзину</a>-->
        <button class="button" @click="addGood">В корзину</button><br>
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
