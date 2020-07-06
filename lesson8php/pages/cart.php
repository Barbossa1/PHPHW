<?php
function indexAction()
{
    echo render(
        'cart.php',
        [
		  'title' => 'Корзина'
        ]
    );
}

function addAction()
{
    $error = addGood(getId());

    if (!empty($error)) {
        setMSG($error);
    }

    redirect('');
}

function axiosAddAction()
{
    header('Content-Type: application/json');
    if (empty($_POST['goodId'])) {
        echo json_encode([
            'success' => false,
        ]);
        return;
    }

    $error = addGood((int)$_POST['goodId']);

    if (!empty($error)) {
        echo json_encode([
            'success' => false
        ]);
        return;
    }

    echo json_encode([
        'success' => true,
    ]);
    return;
}

function jqueryAction()
{
    header('Content-Type: application/json');
    $error = addGood(getIdPost());

    if (!empty($error)) {
        echo json_encode([
            'success' => false
        ]);
        return;
    }

    echo json_encode([
        'success' => true,
        'count' => getCountCart()
    ]);
    return;
}

function addGood($id)
{
    if (empty($id)) {
        return 'Не передан id!';
    }

    $sql = 'SELECT `id`, `goods_name`, `goods_price`, `goods_description`, `goods_img` FROM `goods` WHERE id = ' . $id;
    $result = mysqli_query(getLink(), $sql);
    $row = mysqli_fetch_assoc($result);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($row)) {
        return 'Товар не найден!';
    }


    if (!empty($_SESSION['goods'][$id]['count'])) {
        $_SESSION['goods'][$id]['count']++;
        return '';
    }

    $_SESSION['goods'][$id] = [
		'name' => $row['goods_name'],
		'price' => $row['goods_price'],
		'count' => 1,
    ];

    return '';
}

if ($_POST['buyGood']) {
	if (!empty($_SESSION['user'])) {
			if (!empty($_SESSION['goods'])) {
				foreach ($_SESSION['goods'] as $key) {
					$goods_name = $key['name'];
					$user_login = $_SESSION['user']["user_login"];

					$sqll = "INSERT INTO orders(`user_login`, `goods_name`) VALUES ('$user_login', '$goods_name')";
					mysqli_query(getLink(), $sqll) or die(mysqli_error(getLink()));
				}

				setMSG('Спасибо за покупку!');
				unset($_SESSION['goods']);
			} else {
				setMSG('Корзина пуста!');
			}
	} else {
		setMSG('Нужно авторизоваться!');
	}
    	
}

if($_POST['clear']) {
	unset($_SESSION['goods']);
}