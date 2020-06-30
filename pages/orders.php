<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    //проверяем залогинен ли пользователь
    if (!isset($_SESSION['user']['login'])) {
        echo 'Пожалуйста, авторизуйтесь';
        return;
        exit;
    }
    buildOrders();
}

function buildOrders() {
    $role = $_SESSION['user']['login'];
    $sql = "SELECT * FROM `orders` WHERE `user_name` = '{$role}'";
    $result = mysqli_query(getLink(), $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo render(
        'orders.php',
        [
            'rows' => $rows,
            'title' => 'Ваши заказы'
        ]);
}

function confirmAction()
    {
        $link = mysqli_connect('localhost', 'root', '','gbphp');
        $user_name = $_SESSION['user']['login'];
        $status = "Успешно доставлен";
        $id = getId();
        $sql = "UPDATE orders SET state='".$status."' WHERE id=$id";    
        mysqli_query($link, $sql) or die(mysqli_error($link));
        header('Location: /?p=orders');
        exit;
    }
    