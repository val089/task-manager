<?php
session_start();
include 'db_connect.php';
include 'functions.php';

$user_name = '';
$password = '';
$errorLogin = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!$password || !$user_name) {
        $errorLogin = 'Incorrect username or password';
    }

    if ($user_name && $password) {
        $query = "SELECT * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
            else {
                $errorLogin = 'Incorrect username or password';
            }
        }
        else {
            $errorLogin = 'Incorrect username or password';
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
					<div class="text-center pb-3">
						<h4>Welcome in</h4>
						<h1 class="login__title">Task Manager</h1>
					</div>
					<form class="w-100 p-4" method="post">
						<?php if ($errorLogin) { ?>
							<p class="error">
								<?php echo $errorLogin; ?>
							</p>
						<?php } ?>
						<div class="mb-3">
							<label for="user_name" class="form-label">Login:</label>
							<input
								type="text"
								class="form-control"
								name="user_name"
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
							<input type="submit" class="btn btn-primary" name="send" value="Submit" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
