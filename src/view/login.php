<?php
function render_template() {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/auth.css'>
  <script type='module' src='src/view/static/js/login.js'></script>
  <link href='https://fonts.googleapis.com/css?family=Bungee+Shade' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Chathura' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet'>
  <title>Login</title>
</head>
<body>
	<div class='auth-page-container'>
		<div class='auth-pane-container'>
      <div class='auth-pane-content'>
        <div class='auth-title-container'>
          <h1 class='auth-title'>LOGIN</h1>
        </div>
        <form id='loginForm' action='' method='post'>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Username</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <input id='formUsernameField' type='text' name='username' autofocus>
            </div>
          </div>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Password</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <input id='formPasswordField' type='password' name='password'>
            </div>
          </div>

        </form>
        <div class='auth-alt-container'>
          <a href='https://www.w3schools.com/html/'>
            <p>Don't have an account?</p>
          </a>
        </div>
        <div class='auth-submit-container'>
          <button id='formSubmitButton' type='submit' form='loginForm'>LOGIN</button>
        </div>
      </div>
		</div>
	</div>
</body>
</html>

HTML;
}
