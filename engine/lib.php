<?php

function run()
{
    $page = 'index';
    if (!empty($_GET['p'])) {
        $page = $_GET['p'];
    }
    $fileName = getFileName($page);

    if (!is_file($fileName)) {
        $fileName = getFileName('index');
    }

    include $fileName;

    $action = 'index';
    if (!empty($_GET['a'])) {
        $action = $_GET['a'];
    }

    $action .= 'Action';

    if (!function_exists($action)) {
        $action = 'indexAction';
    }

    return $action();
}

function getFileName($file)
{
    return dirname(__DIR__) . '/pages/' . $file . '.php';
}

function getLink()
{
    static $link;

    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', '','gbphp');
    }

    return $link;
}

function render($template, $params = [], $layout = 'main.php')
{
    $content = renderTmpl($template, $params);
    $layout = 'layouts/' . $layout;
    $title = 'Test';
    if (!empty($params['title'])) {
        $title = $params['title'];
    }
    return renderTmpl($layout, [
        'content' => $content,
        'title' => $title,
        'msg' => getMSG(),
    ]);
}

function renderTmpl($template, $params = [])
{
    ob_start();
    extract($params);
    include dirname(__DIR__) . '/views/' . $template;
    return ob_get_clean();
}

function getId()
{
    if (!empty($_GET['id'])) {
        return (int) $_GET['id'];
    }

    return 0;
}

function setMSG($msg)
{
    $_SESSION['msg'] = $msg;
}

function getMSG()
{
    $msg = '';
    if (!empty($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    return $msg;
}

function isAdmin()
{
    return !empty($_SESSION['user']['is_admin']);
}

function clearString($str)
{
    return mysqli_real_escape_string(getLink(), strip_tags(trim($str)));
}

function redirect($path = '')
{
    if (!empty($path)) {
        header("location: {$path}");
        return;
    }

    if (isset($_SERVER['HTTP_REFERER'])) {
        header("location: {$_SERVER['HTTP_REFERER']}");
        return;
    }

    header("location: /");
}

function getMenu()
{
    $countCart = getCountCart();
    return
        '<li><a href="/">Главная</a></li>
    <li><a href="/?p=good">Товары</a></li>
    <li><a href="/?p=user">Пользователи</a></li>
    <li><a href="/?p=cart">Корзина <span id="countCart">' . $countCart . '</span></a></li>
    <li><a href="/?p=auth">Авторизация</a></li>';

}

function getCountCart()
{
    if (empty($_SESSION['goods'])) {
        return 0;
    }

    return count($_SESSION['goods']);
}

function getIdPost()
{
    if (empty($_POST['id'])) {
        return 0;
    }

    return (int)$_POST['id'];
}


