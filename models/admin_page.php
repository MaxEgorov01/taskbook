<?php

require_once dirname(__DIR__) . '/config/connect_db.php';

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

// $tasks = mysqli_query($link, "SELECT * FROM `tasks");
// $tasks = mysqli_fetch_all($tasks);

function sortTasks ($data, $link) {
	$sort_set = mysqli_query($link, "UPDATE `settings` SET `sort_status`='$data' WHERE `set_name`='sort'");
}

function updataTasks ($data, $data2, $data3, $data4, $data5, $link) {
	mysqli_query($link, "UPDATE `tasks` SET `name`='$data2',`e-mail`='$data3',`text`='$data4',`completed`='$data5' WHERE `task_id`='$data'");
}

function delTasks ($data, $link) {
	mysqli_query($link, "DELETE FROM `tasks` WHERE `task_id` = '$data'");
}
