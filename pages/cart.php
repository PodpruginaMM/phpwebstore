<?php
function indexAction()
{
    var_dump($_SESSION);
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
    ];

    return '';
}

