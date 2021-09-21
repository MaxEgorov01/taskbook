<?php

require_once dirname(__DIR__) . '/models/admin_page.php';
require_once dirname(__DIR__) . '/config/connect_db.php';

foreach ($tasks as $task) {
	$data[] = $task;
}

if (!empty($_POST['name'])) {
	print_r($_POST);
	$task_id = $_POST['task_id'];
	$name = $_POST['name'];
	$e_mail = $_POST['e-mail'];
	$text = $_POST['text'];
	$status = $_POST['status'];
	updataTasks ($task_id, $name, $e_mail, $text, $status, $link);
	header('Location: ../index.php');
}

if(!empty($_POST['select'])) {
	$sort = $_POST['select'];
	sortTasks ($sort, $link);
	header('Location: ../views/admin_page.php');
}

?>
