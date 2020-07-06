<?php
function indexAction()
{
    echo render('home.php', [
        'title' => 'Главная',
    ]);
}