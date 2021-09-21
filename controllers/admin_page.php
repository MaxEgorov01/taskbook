<?php

require_once dirname(__DIR__) . '/models/admin_page.php';
require_once dirname(__DIR__) . '/config/connect_db.php';

foreach ($tasks as $task) {
	$data[] = $task;
}

if (!empty($_POST['dellete'])) {
	$task_id = $_POST['task_id'];
	$page = $_POST['page'] + 1;
	delTasks ($task_id, $link);
	header('Location: ../views/admin_page.php?page=' . $page);
}

if (!empty($_POST['name'])) {
	$page = $_POST['page'] + 1;
	$task_id = $_POST['task_id'];
	$name = $_POST['name'];
	$e_mail = $_POST['e-mail'];
	$text = $_POST['text'];
	$status = '';
	if (isset($_POST['checkbox'])) {
		$status = 'отредактировано администратором';
	}
	updataTasks ($task_id, $name, $e_mail, $text, $status, $link);
	header('Location: ../views/admin_page.php?page=' . $page);
}

if(!empty($_POST['select'])) {
	$sort = $_POST['select'];
	sortTasks ($sort, $link);
	header('Location: ../views/admin_page.php');
}

?>
