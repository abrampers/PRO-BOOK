<?php
function render_template(bool $error = FALSE) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
		<link rel='stylesheet' href='src/view/static/css/common.css'>
		<link rel='stylesheet' href='src/view/static/css/auth.css'>
		<link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Chathura" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
		<title>Login</title>
</head>
<body>
HTML
.
  ($error ?
    <<<HTML
    <h1>SALAH JING PASSWORDLU</h1>
HTML
  : '')
.
  <<<HTML
	<div class='auth-page-container'>
		<div class='auth-pane-container'>
				<div class='auth-pane-content'>
					<div class='auth-title-container'>
						<h1 class='auth-title'>LOGIN</h1>
					</div>
					<form action='/testinglogin' method='post' id='loginForm'>

						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Username</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<input type='text' name='username' required autofocus>
							</div>
						</div>
						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Password</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<input type='password' name='password' required>
							</div>
						</div>

					</form>
					<div class='auth-alt-container'>
						<a href='https://www.w3schools.com/html/'>
							<p>Don't have an account?</p>
						</a>
					</div>
					<div class='auth-submit-container'>
						<button type='submit' form='loginForm'>LOGIN</button>
					</div>
				</div>
		</div>
	</div>
</body>
</html>

HTML;
}
