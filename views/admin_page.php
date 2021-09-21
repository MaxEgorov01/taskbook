<?php

session_start();

require_once '../controllers/admin_page.php';

if (!$_SESSION['admin']) {
	header('Location: ../index.php');
}

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
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <meta name="description" content="Описание страницы" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body>
	<header>
		<div class="fixed-top">
			<nav id="navbar" class="navbar navbar-dark bg-primary d-flex justify-content-end">
				<div class="col-1">
					<a href="../config/logout.php" style="color:#fff">Выход</a>
				</div>
			</nav>
		</div>
  </header>
  	<div id="content" class="container content_top">
  		<form action="../controllers/admin_page.php" method="POST">
				<select name='select'>
				<option value='1'>name (a-z)</option>
				<option value='2'>name (z-a)</option>
				<option value='4'>e-mail (a-z)</option>
				<option value='5'>e-mail (z-a)</option>
				<option value='6'>status (c-in work)</option>
				<option value='7'>status (in work-c)</option>
				<option value='3'>reset</option>
				</select>
				<input type='submit' name='submit' value='sort'>
			</form>
		  <?php 
				for ($i = $page * $count; $i < ($page+1) * $count; $i++) :?>
					<?php if (isset($data[$i])) :?>
						<form action="../controllers/admin_page.php" method="POST" class="row g-3 needs-validation">
							<div class="mb-3" style="display: none;">
								<input type="hidden" class="form-control" name="task_id" value="<?php echo $data[$i][0]; ?>">
							</div>
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Name</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="example" name="name" value="<?php echo $data[$i][1]; ?>">
							</div>
							<div class="mb-3">
								<label for="exampleFormControlInput2" class="form-label">Email address</label>
								<input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" name="e-mail" value="<?php echo $data[$i][2]; ?>">
							</div>
							<div class="mb-3">
								<label for="exampleFormControlTextarea1" class="form-label">Text</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"><?php echo $data[$i][3]; ?></textarea>
							</div>
							<label for="exampleFormControlSelect" class="form-label">Status</label>
							<select class="form-select" aria-label="Default select example" id="exampleFormControlSelect" name="status">
								<option selected><?php echo $data[$i][4]; ?></option>
								<option value="completed">completed</option>
							  <option value="in work">in work</option>			  
							</select>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="checkbox">
							  <label class="form-check-label" for="flexCheckDefault">
							    <span>Выполнено</span>
							  </label>
							</div>
							<div class="col-12">
								<button class="btn btn-primary" type="submit">Отправить форму</button>
							</div>
						</form>
					<?php endif; ?>
			<?php endfor; ?>
			<?php
				for ($p = 0; $p <= $page_count; $p++) :?>
					<a href="?page=<?php echo $p + 1; ?>"><?php echo $p + 1; ?></a>
			<?php endfor; ?>
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
    </footer>
  </body>
</html>

