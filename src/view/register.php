<?php
function render_template(bool $invalidUsername = TRUE, bool $invalidEmail = TRUE) {
  return <<<HTML

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel='stylesheet' href='src/view/static/css/common.css'>
  <link rel='stylesheet' href='src/view/static/css/auth.css'>
  <link rel='stylesheet' href='src/view/static/css/register.css'>
  <script type='module' src='src/view/static/js/register.js'></script>
  <link rel="stylesheet" href="src/view/static/css/fonts.css" type='text/css'>
  <title>Register</title>
</head>
<body>
HTML
.
($invalidUsername && $invalidEmail ?
    <<<HTML
    <div id='usernameTakenMessageContainer' class='auth-error-message-container'>
      <p>Username and email already taken</p>
    </div>
HTML
  : '')
.
($invalidUsername && !$invalidEmail ?
    <<<HTML
    <div id='emailTakenMessageContainer' class='auth-error-message-container'>
      <p>Username already taken</p>
    </div>
HTML
  : '')
.
($invalidEmail && !$invalidUsername ?
    <<<HTML
    <div id='emailTakenMessageContainer' class='auth-error-message-container'>
      <p>Email already taken</p>
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
            <h1 class='auth-title'>REGISTER</h1>
          </div>
          <div id='inputValidationMessageContainer' class='auth-input-validation-message-container'>
            <p id='inputValidationMessage'></p>
          </div>
        </div>
        <form action='/register' method='post' id='registerForm'>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Name</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <input id='formNameField' type='text' name='name' autofocus>
            </div>
          </div>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Username</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <div class='auth-form-item-field-text-container'>
                <input id='formUsernameField' type='text' name='username'>
              </div>
              <div id='formUsernameValidation' class='auth-form-item-field-validation-container'>
                <img id='formUsernameValidationIcon' class='auth-form-item-validation-icon' src='src/view/static/img/icon_failed.svg' alt='Validation icon'>
              </div>
            </div>
          </div>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Email</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <div class='auth-form-item-field-text-container'>
                <input id='formEmailField' type='text' name='email'>
              </div>
              <div id='formEmailValidation' class='auth-form-item-field-validation-container'>
                <img id='formEmailValidationIcon' class='auth-form-item-validation-icon' src='src/view/static/img/icon_failed.svg' alt='Validation icon'>
              </div>
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

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Confirm Password</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <input id='formConfirmPasswordField' type='password' name='confirmPassword'>
            </div>
          </div>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Address</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <textarea id='formAddressField' name='address' form='registerForm'></textarea>
            </div>
          </div>

          <div class='auth-form-item'>
            <div class='auth-form-item-label-container'>
              <h4>Phone Number</h4>
            </div>
            <div class='auth-form-item-field-container'>
              <input id='formPhoneNumberField' type='text' name='phone_number'>
            </div>
          </div>

        </form>
        <div class='auth-alt-container'>
          <a href='/login'>
            <p>Already have an account?</p>
          </a>
        </div>
        <div class='auth-submit-container'>
          <button id='formSubmitButton' type='submit' form='registerForm' disabled>
            <div id='formSubmitButtonInner' class='auth-submit-inner'>
              REGISTER
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
