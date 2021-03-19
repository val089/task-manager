<?php
	session_start();
	include 'db_connect.php';
	include 'functions.php';

	$user_data = check_login($conn);
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
		<link href="css/style.min.css" rel="stylesheet" />
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>HOME PAGE</h1>

    <br>
    Hello, <?php echo $user_data['user_name']; ?>.
</body>
</html>