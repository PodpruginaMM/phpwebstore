<?php
function indexAction()
{
    if(!isset($_SESSION['goods'])){
    echo "Ваша корзина пуста.";
    return;
    //товары в корзине есть, запускаем цикл
    } else {
        buildCart(); 
    }
    echo "<a class=\"button\" href=\"?p=cart&a=pay\">Оплатить</a><br>";
    echo "<a href=\"/\">На главную</a>";
    return;
}

//цикл для отрисовки элементов корзины из массива Сессии
function buildCart()
{
    $goods = $_SESSION['goods'];
    $totalSum = 0;
    $totalItems = 0;
    echo "<ol>";
    foreach ($goods as $good) {
       echo "<li><b>" . $good['name'] . "</b>";
       echo "<p>Цена товара: " . $good['price'] . " &#8381</p>";
       echo "<p>Количество: " . $good['count'] . " шт.</p>";
       echo "<a href=\"?p=cart&a=addGood&id=" . $good['id'] . "\">Добавить еще</a></br>";
       echo "<a href=\"?p=cart&a=delGood&id=" . $good['id'] . "\">Убрать</a></br>";
       echo "<p><i>подитог: " . $good['price'] * $good['count'] . " &#8381</i></p></li>";
       $totalSum = $totalSum + ($good['price'] * $good['count']);
       $totalItems += $good['count'];
    }
    echo "</ol><p>Всего позиций: " . $totalItems . " </p><p><b>Итого: " . $totalSum . " &#8381</b></p>";
    return;
}

function addAction()
{
    $error = addGood(getId());

    if (!empty($error)) {
        setMSG($error);
    }

    redirect('');
}

function axiosAddAction()
{
    header('Content-Type: application/json');
    if (empty($_POST['goodId'])) {
        echo json_encode([
            'success' => false,
            'params' => ['asd', 'asd', 'asd']
        ]);
        return;
    }

    $error = addGood((int)$_POST['goodId']);

    if (!empty($error)) {
        echo json_encode([
            'success' => false
        ]);
        return;
    }

    echo json_encode([
        'success' => true,
        'params' => ['asd', 'asd', 'asd']
    ]);
    return;
}

function jqueryAction()
{
    header('Content-Type: application/json');
    $error = addGood(getIdPost());

    if (!empty($error)) {
        echo json_encode([
            'success' => false
        ]);
        return;
    }

    echo json_encode([
        'success' => true,
        'count' => getCountCart()
    ]);
    return;
}

function addGood($id)
{
    if (empty($id)) {
        return 'Не передан id';
    }

    $sql = 'SELECT `id`, `name`, `price`, `info` FROM `goods` WHERE id = ' . $id;
    $result = mysqli_query(getLink(), $sql);
    $row = mysqli_fetch_assoc($result);

    if (empty($row)) {
        return 'Товар не найден';
    }

    if (!empty($_SESSION['goods'][$id]['count'])) {
        $_SESSION['goods'][$id]['count']++;
        return '';
    }

    $_SESSION['goods'][$id] = [
        'name' => $row['name'],
        'price' => $row['price'],
        'count' => 1,
        'id' => $row['id'],
    ];

    return '';
}
/*
добавить еще товара в корзину
*/
function addGoodAction()
{
    if (empty($_GET['id'])) {
        return "Передан пустой ID";
    }
    $id = $_GET['id'];

    if (!empty($_SESSION['goods'][$id]['count'])) {
        $_SESSION['goods'][$id]['count']++;
        header("location:/?p=cart");
        return;
    }

    return '';
}
/*
убрать товар из корзины
*/
function delGoodAction()
{
    if (empty($_GET['id'])) {
        return "Передан пустой ID";
    }
    $id = $_GET['id'];
    //если больше единицы - убираем
    if (($_SESSION['goods'][$id]['count'])>1) {
        $_SESSION['goods'][$id]['count']--;
        header("location:/?p=cart");
        return;
    }
    //если равен нулю убираем подмассив в массиве
    if (($_SESSION['goods'][$id]['count'])==1) {
        unset($_SESSION['goods'][$id]);
        header("location:/?p=cart");
        return;
    }

    return '';
    }

//оплатить заказ (отправить данные в массив orders)
function payAction()
{
    $link = mysqli_connect('localhost', 'root', '','gbphp');
    $user_name = $_SESSION['user']['login'];
    $cart = json_encode($_SESSION['goods'], JSON_UNESCAPED_UNICODE);
    $status = "Оплачен";
    $sql = "INSERT INTO
    `orders`
        (user_name, cart, state)
    VALUES
        ('".$user_name."','".$cart."','".$status."')";

    mysqli_query($link, $sql) or die(mysqli_error($link));
    $_SESSION['goods'] = array();
    header('Location: /?page=orders');
    exit;
}
