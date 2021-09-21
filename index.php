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
  		<div class="mb-3">
  			<table>
			  	<tr>
					<th class="st sth">name</th>
					<th class="st sth">e-mail</th>
					<th class="st sth">text</th>
					<th class="st sth">status</th>				
			    </tr>
			  <?php 
					for ($i = $page * $count; $i < ($page+1) * $count; $i++) :?>
						<?php if (isset($data[$i])) :?>
							<tr>
								<td class="st std"><?php echo $data[$i][1]; ?></td>
								<td class="st std"><?php echo $data[$i][2]; ?></td>
								<td class="st std"><?php echo $data[$i][3]; ?></td>
								<td class="st std"><?php echo $data[$i][4]; ?></td>
							<tr>
						<?php endif; ?>
				<?php endfor; ?>
  			</table>
  		</div>
  		<?php
			for ($p = 0; $p <= $page_count; $p++) :?>
				<a href="?page=<?php echo $p + 1; ?>"><?php echo $p + 1; ?></a>
			<?php endfor; ?>
<!-- Добавление задичи -->
			<form action="controllers/tasks.php" method="POST" class="row g-3 needs-validation">
	  		<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Name</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="example" name="name">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput2" class="form-label">Email address</label>
					<input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" name="e-mail">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">Text</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
				</div>
				<div class="mb-3">
					<input type="hidden" class="form-control" id="exampleFormControlInput3" name="in_work" value="in work">
				</div>
				<?php 
					if (isset($_SESSION['message'])) { 
						?>
					<p class="msg"><?php echo $_SESSION['message']; ?></p>
						<?php unset($_SESSION['message']); ?>
						<?php
					}
				?>
				<div class="col-12">
					<button id="btn-login" class="btn btn-primary" type="submit">Отправить форму</button>
				</div>
			</form>
		</div>
<!-- Форма авторизации в popup окне -->
		<div id="overlay" class="overlay">
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

