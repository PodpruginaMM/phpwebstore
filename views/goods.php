<?php
    /**@var array $rows */
?>


<div id="app">
<?php foreach($rows as $row) :?>
    <h2><?= $row['name'] ?></h2>
    <img style="width: 200px" src="/img/goods/<?= $row['img'] ?>" alt="img<?= $row['id'] ?>">
    <p><a href="?p=good&a=one&id=<?= $row['id'] ?>">Подробнее</a></p>
    <button class="button" @click="addGood(<?= $row['id'] ?>)">В корзину</button><br>
<?php endforeach;?>
</div>

<!--
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
<button class="button" @click="send('<?= $row['id'] ?>')">В корзину</button><br>
--> 

<script>
    new Vue({
        el: '#app',
        data: {
            goodsId: '<?= getId()?>'
        },
        methods: {
            addGood(id) {
                let form = new FormData();
                form.append('goodId', id);
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

