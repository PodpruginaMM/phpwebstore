<?php
function indexAction()
{
    if (empty($_SESSION['Login'])) {
        echo render('loginForm.php');
        return;
    }

    echo render(
        'formUser.php',
        [
            'user' => $_SESSION['user']
        ]
    );

}

/**
 * ПРоизводит авторизацию
 */
function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('location: /?p=auth');
        return;
    }

    if (empty($_POST['login']) || empty($_POST['password'])) {
        setMSG('Не все данные переданы');
        header('location: /?p=auth');
        return;
    }

    $loginFront = clearString($_POST['login']);
    $passwordFront = $_POST['password'];

    $sql = "SELECT id, fio, login, password, is_admin FROM users WHERE login = '{$loginFront}'";
    $result = mysqli_query(getLink(), $sql);
    $row = mysqli_fetch_assoc($result);
    if (empty($row)) {
        setMSG('Не верный логин или пароль');
        header('location: /?p=auth');
        return;
    }

    $msg = 'Не верный логин или пароль';
    if (password_verify($passwordFront, $row['password'])) {
        $msg = 'Вы успешно залогинились';
        $_SESSION['Login'] = true;
        unset($row['password']);
        $_SESSION['user'] = $row;
    }

    setMSG($msg);
    header('location: /?p=auth');
    return;
}

function logoutAction()
{
    session_destroy();
    header('location: /?p=auth');
}

