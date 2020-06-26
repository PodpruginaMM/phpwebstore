<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    if (!isAdmin()) {
        header('Location: /');
        return;
    }

    $sql = 'SELECT id, fio, login, password, is_admin FROM users';
    $result = mysqli_query(getLink(), $sql);
    echo render('users.php', ['result' => $result]);
}

function oneAction()
{
    echo 'user';
}