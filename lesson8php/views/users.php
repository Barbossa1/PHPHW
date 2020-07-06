<?php while($row = mysqli_fetch_assoc($result)) :?>
    <h2><?= $row['user_login'] ?></h2>
    <h3><?= $row['user_address'] ?></h3><hr>
<?php endwhile;?>