<?php
    /**@var array $rows */
?>

<h1>Ваши заказы</h1><br>
<?php //var_dump($_SESSION['user']['login']) ?>

<?php foreach($rows as $row) :?>
    <h2>Заказ номер <?= $row['id'] ?></h2>
    <p>Состав заказа: <?= $row['cart'] ?></p>
    <p>Статус заказа: <?= $row['state'] ?></p>
<?php endforeach;?>