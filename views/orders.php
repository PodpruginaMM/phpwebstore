<?php
    /**@var array $rows */
?>

<h1>Ваши заказы</h1><br>
<?php //var_dump($_SESSION['user']['login']) ?>

<?php foreach($rows as $row) :?>
    <h2>Заказ номер <?= $row['id'] ?></h2>
    <ul>
    <?php $cart_items = json_decode($row['cart'], true); $totalsum = 0?>
    <?php foreach($cart_items as $item_row) :?>
        <?php $itemsum = (int) $item_row['price']*(int)$item_row['count']; $totalsum = $totalsum + $itemsum?>
        <li>Товар: <?= $item_row['name'] ?>, Количество: <?= $item_row['count'] ?>, Цена <?= $item_row['price'] ?>,Сумма: <?= $itemsum?></li>
    <?php endforeach;?>
    </ul>
    <p>Всего оплачено: <?= $totalsum ?></p>
    <p>Статус заказа: <?= $row['state'] ?></p>
    <a href="?p=orders&a=confirm&id=<?= $row['id'] ?>">Подтвердить получение</a>
<?php endforeach;?>