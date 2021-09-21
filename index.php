<?php

session_start();

require_once 'controllers/tasks.php';

if (isset($_GET['page'])) {
	$page = $_GET['page'] - 1;
}else{
	$page = 0;
}

$count = 3;
$page_count = floor(count($data) / $count);

?>

<!DOCTYPE HTML>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>TaskerBook</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <meta name="description" content="Описание страницы" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body>
	<header>
		<div class="fixed-top">
			<nav id="navbar" class="navbar navbar-dark bg-primary d-flex justify-content-end">
				<div class="col-1">
					<button id="btn-login" type="button" class="btn btn-warning">
						<span>Вход</span>
					</button>
				</div>
			</nav>
		</div>
  </header>
  	<div id="content" class="container content_top">
			<?php 
				if (isset($_SESSION['message'])) { 
					?>
				<p class="msg"><?php echo $_SESSION['message']; ?></p>
					<?php unset($_SESSION['message']); ?>
					<?php
				}
			?>
			<form action="controllers/tasks.php" method="POST">
				<select name='select'>
				<option value='1'>name (a-z)</option>
				<option value='2'>name (z-a)</option>
				<option value='4'>e-mail (a-z)</option>
				<option value='5'>e-mail (z-a)</option>
				<option value='6'>status (in work)</option>
				<option value='7'>status (completed)</option>
				<option value='3'>reset</option>
				</select>
				<input type='submit' name='submit' value='sort'>
			</form>
<!-- Список задач -->
  			<table class="table table-dark table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">E-mail</th>
						<th scope="col">Text</th>
						<th scope="col">Status</th>				
					</tr>
			    </thead>
				<tbody>
					<?php for ($i = $page * $count; $i < ($page+1) * $count; $i++) :?>
						<?php if (isset($data[$i])) :?>
							<tr>
								<th scope="row"><?php echo $i+1; ?></th>
								<td><?php echo $data[$i][1]; ?></td>
								<td><?php echo $data[$i][2]; ?></td>
								<td><?php echo $data[$i][3]; ?></td>
								<td><?php echo $data[$i][4]; ?></td>
							<tr>
						<?php endif; ?>
					<?php endfor; ?>
				</tbody>
  			</table>
			<nav aria-label="...">
				<ul class="pagination">
					<li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == 1) :?>disabled<?php elseif (!isset($_GET['page'])) :?>disabled<?php endif; ?>">
						<a class="page-link" href="?page=<?php echo $_GET['page'] - 1; ?>">Previous</a>
					</li>
						<?php for ($p = 0; $p <= $page_count; $p++) :?>
							<li class="page-item <?php if (isset($_GET['page']) && ($_GET['page'] - 1) == $p) :?>active<?php elseif (!isset($_GET['page']) && $p == 0) :?>active<?php endif; ?>">
								<a class="page-link" href="?page=<?php echo $p + 1; ?>"><?php echo $p + 1; ?></a>
							</li>
						<?php endfor; ?>
					<li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == ($page_count +1)) :?>disabled<?php endif; ?>">
						<a class="page-link" href="?page=<?php echo (isset($_GET['page'])) ? $_GET['page'] + 1 : 2; ?>">Next</a>
					</li>
				</ul>
			</nav>
			<button id="btn-create-task" type="button" class="btn btn-primary">Create task</button>
	</div>
	<!-- Форма авторизации в popup окне -->
		<div id="authorization_form" class="popup-form">
			<div id="popup" class="container popup">
				<form action="config/signin.php" method="POST" class="row g-3 needs-validation">
					<div class="col-md-6">
						<label for="login" class="form-label">Логин</label>
						<input id="login" type="text" class="form-control" name="login" placeholder="Введите логин">
					</div>
					<div class="col-md-6">
						<label for="password" class="form-label">Пароль</label>
						<input id="password" type="password" class="form-control" name="password" placeholder="Введите пароль">
					</div>
					<div class="col-12">
						<button id="btn-login" class="btn btn-primary" type="submit">Отправить форму</button>
					</div>
					<div id="close-popup" class="close-popup close-campaign"></div>
				</form>
			</div>
		</div>
	<!-- Добавление задичи -->
	<div id="create_form" class="popup-form">
		<div id="popup" class="container popup">
			<form action="controllers/tasks.php" method="POST" class="row g-3 needs-validation">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Name</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="example" name="name" required>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput2" class="form-label">Email address</label>
					<input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" name="e-mail">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">Text</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" required></textarea>
				</div>
				<div class="col-12">
					<button id="btn-send" class="btn btn-primary" type="submit">Отправить форму</button>
				</div>
				<div id="close-popup-create-form" class="close-popup close-campaign"></div>
			</form>
		</div>
	</div>
    <footer>
    	<div class="fixed-bottom">
	    	<nav class="navbar navbar-dark bg-primary d-flex justify-content-end">
					<div class="col-1">
						<span class="text_dec">2021</span>
					</div>
				</nav>
  		</div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="js/common.js" type="text/javascript"></script>
    </footer>
  </body>
</html>

