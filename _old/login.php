<?php
$link = mysqli_connect('localhost', 'root', '','gbphp');
session_start();
const SOL = 'ugt kugiuytbiuyt876t597865876';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['login']) || empty($_POST['password'])) {
        header('location: /');
        exit();
    }

    $loginFront = $_POST['login'];
    $passwordFront = $_POST['password'];

    $sql = "SELECT id, fio, login, password, is_admin FROM users WHERE login = '{$loginFront}'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    if (empty($row)) {
        header('location: /');
        exit();
    }

    if (password_verify($passwordFront, $row['password'])) {
        $_SESSION['Login'] = true;
    }

    header('location: /');
    exit();
}
if (array_key_exists('logout', $_GET)) {
    session_destroy();
    header('location: /');
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (empty($_SESSION['Login'])) :?>
    <form action="" method="post">
        <input type="text" name="login" placeholder="login">
        <input type="text" name="password" placeholder="password">
        <input type="submit">
    </form>
<?php else: ?>
    Вы авторизовались
    <a href="?logout">exit</a>
<?php endif; ?>
</body>
</html>