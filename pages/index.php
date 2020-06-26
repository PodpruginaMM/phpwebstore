<?php
function indexAction()
{
    echo render('home.php', [
        'title' => 'Привет',
        'text' => '<p>Добро пожаловать в магазин</p>',

    ]);
}

function index2Action()
{
    echo 'Hello';
}

function test()
{

}
