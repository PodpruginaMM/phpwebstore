<?php
function indexAction()
{
    echo render('home.php', [
        'title' => 'ПРивет',
        'text' => '<p>Lorem ipsum dolor.</p>',

    ]);
}

function index2Action()
{
    echo 'Hello';
}

function test()
{

}
