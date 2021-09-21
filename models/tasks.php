<?php

require_once dirname(__DIR__) . '/config/connect_db.php';
require_once dirname(__DIR__) . '/controllers/tasks.php';

$sort = mysqli_query($link, "SELECT `sort_status` FROM `settings` WHERE `set_name`='sort'");
$sort = mysqli_fetch_assoc($sort);

if ($sort['sort_status'] == 1) {
	$tasks = mysqli_query($link, "SELECT * FROM `tasks` ORDER BY name");
	$tasks = mysqli_fetch_all($tasks);
}

if ($sort['sort_status'] == 2) {
	$tasks = mysqli_query($link, "SELECT * FROM `tasks` ORDER BY name DESC");
	$tasks = mysqli_fetch_all($tasks);
}

if ($sort['sort_status'] == 3) {
	$tasks = mysqli_query($link, "SELECT * FROM `tasks`");
	$tasks = mysqli_fetch_all($tasks);
}

if ($sort['sort_status'] == 4) {
	$tasks = mysqli_query($link, "SELECT * FROM `tasks` ORDER BY `e-mail`");
	$tasks = mysqli_fetch_all($tasks);
}

if ($sort['sort_status'] == 5) {
	$tasks = mysqli_query($link, "SELECT * FROM `tasks` ORDER BY `e-mail` DESC");
	$tasks = mysqli_fetch_all($tasks);
}

if ($sort['sort_status'] == 6) {
	$tasks = mysqli_query($link, "SELECT * FROM `tasks` ORDER BY `completed`");
	$tasks = mysqli_fetch_all($tasks);
}

if ($sort['sort_status'] == 7) {
	$tasks = mysqli_query($link, "SELECT * FROM `tasks` ORDER BY `completed` DESC");
	$tasks = mysqli_fetch_all($tasks);
}

// $tasks = mysqli_query($link, "SELECT * FROM `tasks`");
// $tasks = mysqli_fetch_all($tasks);

function sortTasks ($data, $link) {
	$sort_set = mysqli_query($link, "UPDATE `settings` SET `sort_status`='$data' WHERE `set_name`='sort'");
}

function setTasks ($data, $data2, $data3, $data4, $link) {
	mysqli_query($link, "INSERT INTO `tasks`(`task_id`, `name`, `e-mail`, `text`, `completed`) VALUES (NULL,'$data','$data2','$data3','$data4')");
}
