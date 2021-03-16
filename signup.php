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
	<body class="signup-page bg-info d-flex justify-content-center align-items-center">
		<form class="signup w-100" method="post">
			<div class="text-center pb-3">
				<h1>Register</h1>
			</div>
			<div class="mb-3">
				<label for="login" class="form-label">Login:</label>
				<input
					type="login"
					class="form-control"
					name="user_name"
					aria-describedby="login"
				/>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password:</label>
				<input type="password" class="form-control" name="password" />
			</div>
			<div class="mb-3">
				<label for="re-password" class="form-label">Re Password:</label>
				<input
					type="password"
					class="form-control"
					name="re-password"
				/>
			</div>
			<div class="d-flex flex-column justify-content-between align-items-center">
				<a href="index.php" class="signup__link link-primary">Already have an account?</a>
				<button type="submit" class="btn btn-primary w-100 mt-4">Sign Up</button>
			</div>
		</form>
	</body>
</html>
