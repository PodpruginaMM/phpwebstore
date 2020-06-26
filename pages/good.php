<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    $sql = 'SELECT `id`, `name`, `price`, `info`, `img` FROM `goods`';
    $result = mysqli_query(getLink(), $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo render(
        'goods.php',
        [
            'rows' => $rows,
            'title' => 'Каталог'
        ]);
}

function oneAction()
{
    $sql = 'SELECT `id`, `name`, `price`, `info`, `img` FROM `goods` WHERE id = ' . getId();
    $result = mysqli_query(getLink(), $sql);
    $row = mysqli_fetch_assoc($result);

    if (empty($row)) {
        header('Location: /');
        return;
    }

    echo render(
        'good.php',
        [
            'row' => $row,
            'title' => 'Товар: ' . $row['name'],
            ''
        ]);
}