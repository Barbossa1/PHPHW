<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: /?page=5');
        exit();
    }

    $login = $_POST['login'];
    $password = $_POST['password'];
    $passwordSuper = password_hash("$password", PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO
            users
                (user_login, user_password)
            VALUES
                ('$login', '$passwordSuper')";
    mysqli_query($link, $sql) or die(mysqli_error($link));

    header('Location: /?page=1');
    exit;
}
?>


<form method="post">
    <input type="text" placeholder="login" name="login">
    <input type="text" placeholder="password" name="password">
    <input type="submit">
</form>