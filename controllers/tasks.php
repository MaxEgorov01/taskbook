<?php

require_once dirname(__DIR__) . '/models/tasks.php';
require_once dirname(__DIR__) . '/config/connect_db.php';

foreach ($tasks as $task) {
	$data[] = $task;
}

// if (!empty($_GET['sort'])) {
// 	print_r($_SESSION['sort'] = 1);
// 	$i = $_GET['sort'];
// 	if ($i == 1) {
// 		function my_sort ($a, $b) {
// 			if ($a['1'] == $b['1']) return 0;
// 			return $a['1'] > $b['1'] ? 1 : -1;
// 		}
// 	}
// 	if ($i == 2) {
// 		function my_sort ($a, $b) {
// 			if ($a['2'] == $b['2']) return 0;
// 			return $a['2'] > $b['2'] ? 1 : -1;
// 		}
// 	}
// 	if ($i == 4) {
// 		function my_sort ($a, $b) {
// 			if ($a['4'] == $b['4']) return 0;
// 			return $a['4'] > $b['4'] ? 1 : -1;
// 		}
// 	}
// 	usort($data, 'my_sort');
// }

if (!empty($_POST['name'])) {
	$name_add = $_POST['name'];
	$e_mail_add = $_POST['e-mail'];
	$text_add = $_POST['text'];
	$status = '';
	setTasks ($name_add, $e_mail_add, $text_add, $status, $link);
	header('Location: ../index.php');
}

if(!empty($_POST['select'])) {
	$sort = $_POST['select'];
	sortTasks ($sort, $link);
	header('Location: ../index.php');
}

?>
