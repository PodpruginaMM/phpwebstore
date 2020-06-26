<?php
    /**@var array $rows */
?>



<?php foreach($rows as $row) :?>
    <h2><?= $row['name'] ?></h2>
    <img style="width: 200px" src="/img/goods/<?= $row['img'] ?>" alt="img<?= $row['id'] ?>">
    <p><a href="?p=good&a=one&id=<?= $row['id'] ?>">Подробнее</a></p>
    <p style="cursor: pointer" onclick="send('<?= $row['id'] ?>')">В корзину</p>
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