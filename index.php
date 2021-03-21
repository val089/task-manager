<?php
	session_start();
	include 'db_connect.php';
	include 'functions.php';

	$user_data = check_login($conn);
	$user_name = $user_data['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>TASK MANAGER</title>
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link href="css/style.min.css" rel="stylesheet" />
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  			<div class="container">
    			<a class="navbar-brand" href="index.php"><h1>Task Manager</h1></a>
				<ul class="navbar-nav ml-lg-auto">
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				</ul>
  			</div>
		</nav>
	</header>

	<div class="text-center mt-5 mb-5">
		<h2>Hello, <?php echo $user_name; ?>.</2>
	</div>

	<div class="container">
		<div class="row d-flex justify-content-center align-items-center">
			<form class="w-75" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<?php if ($error_task) { ?>
					<p class="error">
						<?php echo $error_task; ?>
					</p>
				<?php } ?>
				<div class="input-group mb-3">
					<input type="text" class="form-control" name="task_title" placeholder="Task name" aria-label="Add Task">
					<input type="submit" class="btn btn-primary" name="add_task" value="Add Task" />
				</div>
			</form>
			</form>
		</div>
		<div class="row">
			<h2>Your tasks</h2>
			<div class="list-group">
			<?php
				$query = "SELECT * FROM tasks where user_name = '$user_name'";
				$result = mysqli_query($conn, $query);
				while ( $task = mysqli_fetch_array($result)) {
					echo '<div class="d-flex">';
					echo '<label class="list-group-item w-100 fs-5">';
					echo '<input class="form-check-input me-1" type="checkbox">' . $task['title'];
					echo '</label>';
					echo '<button class="border-0 bg-white">';
					echo '<i class="fas fa-trash fs-5"></i>';
					echo '</button>';
					echo '</div>';
				}

				if ( isset($_POST['add_task']) && !empty($_POST['task_title'])) {
					$title = $_POST['task_title'];
					$query2 = "INSERT tasks (user_name,title) VALUES ('$user_name','$title')";
					mysqli_query($conn, $query2);
					mysqli_close($conn);
					header("Location: index.php");
				}
			?>
			</div>
		</div>
	</div>
</body>
</html>