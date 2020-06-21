<?php
	if (empty($_GET)) {
		return 'Ничего не передано!';
	}

	if (empty($_GET['operation'])) {
		return 'Не передана операция!';
	}

	if (empty($_GET['a']) || empty($_GET['b'])) {
    		return 'Не переданы аргументы!';
	}

	$a = $_GET['a'];
	$b = $_GET['b'];
	$operation = $_GET['operation'];

	$expression = $a . ' ' . $operation . ' ' . $b . ' = ';
	
	switch ($operation) {
	case '+':
		$result = $a + $b;
		break;
	case '-':
		$result = $a - $b;
		break;
	case '*':
		$result = $a * $b;
		break;
	case '/':
		$result = $a / $b;
		break;		
	default:
		return 'Операция не поддерживается';
	}

	return $expression . $result;
?>