<p>Имя: <?= $user['user_login']?></p>
<?php if(isAdmin()) :?>
    <a href="?p=user">Пользователи</a>
<?php endif;?>
<p>Адресс: <?= $user['user_address'] ?></p>
<a href="?p=auth&a=logout">Выход</a>