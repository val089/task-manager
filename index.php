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
		<div class="container login-container">
			<div class="row login">
				<div
					class="col-5 login__bg d-none d-sm-block"
					style="
						background: url('images/login-bg02.png') no-repeat
							center;
						background-size:     cover;
					"
				></div>
				<div class="col d-flex flex-column justify-content-center align-items-center">
					<div class="text-center pb-5">
						<h4>Welcome in</h4>
						<h1 class="login__title">Task Manager</h1>
					</div>
					<form class="form w-100" method="post">
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
							<label for="password" class="form-label"
								>Password:</label
							>
							<input
								type="password"
								class="form-control"
								name="password"
							/>
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<a href="signup.php" class="link-primary"
								>Create an account</a
							>
							<button type="submit" class="btn btn-primary">
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
