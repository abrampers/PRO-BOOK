<?php
function render_template(bool $error = FALSE, bool $redirected = FALSE) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/auth.css'>
  <link rel='stylesheet' href='src/view/static/css/login.css'>
  <script type='module' src='src/view/static/js/login.js'></script>
  <link rel="stylesheet" href="src/view/static/css/fonts.css" type='text/css'>
  <title>Login</title>
</head>
<body>
HTML
.
  ($redirected ?
  <<<HTML
  <div id='redirectedMessageContainer' class='auth-info-message-container'>
    <p>Please login first</p>
  </div>
HTML
  : '')
.
  ($error ?
    <<<HTML
    <div id='invalidCredentialsMessageContainer' class='auth-error-message-container'>
      <p>Incorrect username or password</p>
    </div>
HTML
  : '')
.
  <<<HTML
	<div class='auth-page-container'>
		<div class='auth-pane-container'>
      <div class='auth-pane-content'>
        <div class='auth-header-container'>
          <div id='titleContainer' class='auth-title-container'>
            <h1 class='auth-title'>LOGIN</h1>
          </div>
          <div id='inputValidationMessageContainer' class='auth-input-validation-message-container'>
            <p id='inputValidationMessage'></p>
          </div>
        </div>
        <form id='loginForm' action='/login' method='post'>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Username</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <input id='formUsernameField' type='text' name='username'>
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
          <a href='/register'>
            <p>Don't have an account?</p>
          </a>
        </div>
        <div class='auth-submit-container'>
          <button id='formSubmitButton' type='submit' form='loginForm' disabled>
            <div id='formSubmitButtonInner' class='auth-submit-inner'>
              LOGIN
            </div>
          </button>
        </div>
      </div>
		</div>
	</div>
</body>
</html>

HTML;
}
