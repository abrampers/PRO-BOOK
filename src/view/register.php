<?php
function render_template() {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/auth.css'>
  <link rel='stylesheet' href='src/view/static/css/register.css'>
  <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Chathura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
  <title>Register</title>
</head>
<body>
	<div class='auth-page-container'>
		<div class='auth-pane-container'>
				<div class='auth-pane-content'>
					<div class='auth-title-container'>
						<h1 class='auth-title'>REGISTER</h1>
					</div>
					<form action='' method='post' id='registerForm'>

						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Name</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<input type='text' name='name' required autofocus>
							</div>
						</div>

						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Email</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<input type='email' name='email' required>
							</div>
						</div>

						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Username</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<input type='text' name='username' required>
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

						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Confirm Password</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<input type='password' name='confirmPassword' required>
							</div>
						</div>

						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Address</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<textarea form='registerForm'></textarea>
							</div>
						</div>

						<div class='auth-form-item'>
							<div class='auth-form-item-label-container'>
								<h4>Phone Number</h4>
							</div>
							<div class='auth-form-item-field-container'>
								<input type='text' name='phoneNumber' required>
							</div>
						</div>

					</form>
					<div class='auth-alt-container'>
						<a href='https://www.w3schools.com/html/'>
							<p>Already have an account?</p>
						</a>
					</div>
					<div class='auth-submit-container'>
						<button type='submit' form='registerForm'>REGISTER</button>
					</div>
				</div>
		</div>
	</div>
</body>
</html>

HTML;
}
