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

$page_count = ceil(count($data) / $count);

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
	<div class="page">
		<header class="fixed-top">
			<nav id="navbar" class="navbar navbar-dark bg-primary d-flex justify-content-end">
				<div class="col-2">
					<a href="../config/logout.php" class="btn btn-warning btn-sm">Выход</a>
				</div>
			</nav>
		</header>
		<div id="content" class="container content_top">
			<form action="../controllers/admin_page.php" method="POST">
					<select name="select" class="form-select form-select-sm" aria-label=".form-select-sm example" style="width: 140px !important; display: inline-block; margin: 15px 5px 15px 20px;">
					  <option value="1">name (a-z)</option>
					  <option value="2">name (z-a)</option>
					  <option value='4'>e-mail (a-z)</option>
						<option value='5'>e-mail (z-a)</option>
						<option value='6'>status (in work)</option>
						<option value='7'>status (completed)</option>
						<option value='3'>reset</option>
					</select>
					<input type="submit" name="submit" class="btn btn-primary btn-sm" value="select">
			</form>
			<?php 
					for ($i = $page * $count; $i < ($page+1) * $count; $i++) :?>
						<?php if (isset($data[$i])) :?>
							<form action="../controllers/admin_page.php" method="POST" class="row g-3 needs-validation cart-form">
								<div class="mb-3" style="display: none;">
									<input type="hidden" class="form-control" name="task_id" value="<?php echo $data[$i][0]; ?>">
								</div>
								<div class="mb-3" style="display: none;">
									<input type="hidden" class="form-control" name="page" value="<?php echo $page; ?>">
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
								<div class="form-check">
								<input <?php if (!empty($data[$i][4])) :?> checked <?php endif; ?> class="form-check-input" type="checkbox" value="" id="flexCheckDefault<?php echo $i; ?>" name="checkbox" style="cursor: pointer;">
								<label class="form-check-label" for="flexCheckDefault<?php echo $i; ?>" style="cursor: pointer;">
									<span>Выполнено</span>
								</label>
								</div>
								<button class="btn btn-primary" type="submit" style="width: 100px; margin-right: 10px;">Save</button>
								<input class="btn btn-outline-danger" type="submit" style="width: 100px; margin-left: 10px;" name="dellete" value="Dellete">
							</form>
						<?php endif; ?>
				<?php endfor; ?>
				<nav aria-label="...">
					<ul class="pagination">
						<li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == 1) :?>disabled<?php elseif (!isset($_GET['page'])) :?>disabled<?php endif; ?>">
							<a class="page-link" href="?page=<?php echo $_GET['page'] - 1; ?>">Previous</a>
						</li>
							<?php for ($p = 0; $p < $page_count; $p++) :?>
								<li class="page-item <?php if (isset($_GET['page']) && ($_GET['page'] - 1) == $p) :?>active<?php elseif (!isset($_GET['page']) && $p == 0) :?>active<?php endif; ?>">
									<a class="page-link" href="?page=<?php echo $p + 1; ?>"><?php echo $p + 1; ?></a>
								</li>
							<?php endfor; ?>
						<li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == ($page_count +1)) :?>disabled<?php endif; ?>">
							<a class="page-link" href="?page=<?php echo (isset($_GET['page'])) ? $_GET['page'] + 1 : 2; ?>">Next</a>
						</li>
					</ul>
				</nav>
			</div>
		<footer>
			<div class="navbar navbar-dark bg-primary d-flex justify-content-end">
				<div class="col-1">
					<span class="text_dec">2021</span>
				</div>
			</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		</footer>
	</div>
  </body>
</html>

