<?php
function indexAction()
{
    echo render('userAdd.php', [
        'title' => 'Регистрация',
    ]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['address'])) {
        header('Location: /');
        exit();
    }

    $login = $_POST['login'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $passwordSuper = password_hash("$password", PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO
            users
                (`user_login`, `user_password`, `user_address`)
            VALUES
                ('$login', '$passwordSuper', '$address')";
    mysqli_query(getLink(), $sql) or die(mysqli_error(getLink()));

    header('Location: /');
    exit;
}

?>