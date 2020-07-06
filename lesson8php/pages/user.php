<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    $sql = 'SELECT `id`, `user_login`, `user_password`, `user_admin`, `user_address` FROM `users`';
    $result = mysqli_query(getLink(), $sql);
    echo render('users.php', ['result' => $result]);
}

function oneAction()
{
    echo 'user';
}