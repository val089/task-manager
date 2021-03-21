<?php
	session_start();
	include 'db_connect.php';
	include 'functions.php';

	$user_name = '';
	$password = '';
	$password_confirm = '';
	$error_user_name = '';
	$error_password = '';
	$error_password_confirm = '';
	$success = '';
	$register_failed = '';

	if (isset( $_POST['send'])) {
		$user_name = validate($_POST['user_name']);
		$password = validate($_POST['password']);
		$password_confirm = validate($_POST['password_confirm']);

		if (!$user_name) {
			$error_user_name = 'Please choose a username';
		}

		if (!$password) {
			$error_password = 'Password is required';
		}
		else if ($password && strlen($password) < 6) {
			$error_password = 'Password must contain minimum 6 signs';
		}

		if (!$password_confirm) {
			$error_password_confirm = 'Please confirm your password';
		}
		else if ($password_confirm !== $password) {
			$error_password_confirm = 'Must be the same as password';
		}

		if ($user_name && $password && $password_confirm && $password === $password_confirm && strlen($password) > 5) {

			$query = "SELECT * FROM users WHERE user_name='$user_name'";
			$result = mysqli_query($conn, $query);

			if (mysqli_num_rows($result) > 0) {
				$register_failed = 'The username is taken try another';
			} else {
				$user_id = genarateId(20);
				$query2 = "INSERT INTO users (user_id,user_name,password) VALUES ('$user_id','$user_name','$password')";
				$result2 = mysqli_query($conn, $query2);

				if($result2) {
					$success = 'Your account has been created successfully';
					$user_name = '';
					$password = '';
					$password_confirm = '';
				} else {
					$register_failed = 'An error has been occurred';
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>TASK MANAGER</title>
		<link
			href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@400;700&display=swap"
			rel="stylesheet"
		/>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous"
		/>
		<link href="css/style.min.css" rel="stylesheet" />
	</head>
	<body
		class="signup-page bg-info d-flex justify-content-center align-items-center"
	>
		<form class="signup w-100" method="post">
			<div class="text-center pb-3">
				<h1>Register</h1>
				<?php if ($success) { ?>
				<p class="success">
					<?php echo $success; ?>
				</p>
				<?php } ?>

				<?php if ($register_failed) { ?>
				<p class="error">
					<?php echo $register_failed; ?>
				</p>
				<?php } ?>
			</div>
			<div class="mb-3">
				<label for="user_name" class="form-label">Login:</label>
				<input
					type="text"
					class="form-control"
					name="user_name"
					value="<?php echo $user_name; ?>"
				/>
				<?php if ($error_user_name) { ?>
				<p class="error">
					<?php echo $error_user_name; ?>
				</p>
				<?php } ?>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password:</label>
				<input
					type="password"
					class="form-control"
					name="password"
					value="<?php echo $password; ?>"
				/>
				<?php if ($error_password) { ?>
				<p class="error">
					<?php echo $error_password; ?>
				</p>
				<?php } ?>
			</div>
			<div class="mb-3">
				<label for="re-password" class="form-label">Confirm password:</label>
				<input
					type="password"
					class="form-control"
					name="password_confirm"
					value="<?php echo $password_confirm; ?>"
				/>
				<?php if ($error_password_confirm) { ?>
				<p class="error">
					<?php echo $error_password_confirm; ?>
				</p>
				<?php } ?>
			</div>
			<div
				class="d-flex flex-column justify-content-between align-items-center"
			>
				<a href="login.php" class="signup__link link-primary mt-2"
					>Already have an account?</a
				>
				<input
					type="submit"
					class="btn btn-primary w-100 mt-3"
					name="send"
					value="Sign Up"
				/>
			</div>
		</form>
	</body>
</html>
