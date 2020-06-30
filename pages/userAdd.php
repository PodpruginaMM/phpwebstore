<?php
function indexAction()
{
$form = <<<EOT
<form method="post">
    <input type="text" placeholder="fio" name="fio" >
    <input type="text" placeholder="login" name="login">
    <input type="text" placeholder="password" name="password">
    <input type="submit">
</form>
EOT;
    echo render(
        'reg.php',
        [
            'title' => 'Регистрация',
            'text' => $form
        ]);

$link = mysqli_connect('localhost', 'root', '','gbphp');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['fio']) || empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: /?p=userAdd');
        exit();
    }

    $fio = $_POST['fio'];
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $is_admin = '0';

    $sql = "INSERT INTO
            users
                (fio, login, password, is_admin)
            VALUES
                ('$fio', '$login', '$password', $is_admin)";
    mysqli_query($link, $sql) or die(mysqli_error($link));
    setMSG('Вы успешно зарегистрировались');
    header('Location: /?p=auth');
    exit;
}

}
?>