<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PhoneBook</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="bootstrap/js/jquery-slim.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand" href="#">
				<img src="2.png" width="30" height="30" class="d-inline-block align-top" alt="">Phonebook
			</a>
			<form class="form-inline my-2 my-lg-0">
				<img src="prof.png" width="40" height="40" class="mr-sm-2" alt="">
				<a class="btn btn-outline-primary btn-lg btn-sm" href="Login.php" role="button">Log In</a>
			</form>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 signimage">
				</div>
				<div class="col-sm-6 momo">
					<h1>Get Started</h1>
					<p ="lead">Please fill up the form provided.</p>
					<div class="form-group">
						<form action="signin.php" method="post">
						<label>Username</label>
						<input type="username" class="form-control" id="username" name="username" required>
						<label>Email</label>
						<input type="email" class="form-control" id="email" name="email" required>
						<label>Password</label>
						<input type="password" class="form-control" id="password" name="password" required>
						<input class="btn btn-primary btn-block button2" type="submit" value="Register now" name="register_btn">
						</form>
						<p ="lead">This page is protected by CKScompany and subject to Google’s Privacy Policy & Terms of Service. By signing up you agree to Phonebook's Terms of Service.</p>
						<h4>Or, use another account:</h4>
						<div class="row">
							<div class="col-sm-3 border1 border 2">
								<img class="img1" src="google1.png" width="30" height="30"/>
							</div>
							<div class="col-sm-3 border1 border 2">
								<img class="img1" src="facebook.png" width="30" height="30"/>
							</div>
							<div class="col-sm-3 border1 border 2">
								<img class="img1" src="github.png" width="30" height="30"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="row">
				<p class="col-sm-4 h5">&copy; 2018 Phonebook</p>
				<ul class="col-sm-8">
					<li class="col-sm-1"><img src="4.png" /></li>
					<li class="col-sm-1"><img src="5.png" /></li>
					<li class="col-sm-1"><img src="6.png" /></li>
				</ul>
			</div>
		</footer>
	</body>
</html>