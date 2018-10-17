import $$ from './lib/jQowi.js'

function validateForm() {
  let usernameField = $$('#formUsernameField');
  let passwordField = $$('#formPasswordField');

  if (usernameField.value.length == 0) {
    alert('huyu username');
    return false;
  } else if (passwordField.value.length == 0) {
    alert('huyu password');
    return false;
  } else {
    return true;
  }
}

let loginForm = $$('#loginForm');
loginForm.onsubmit = validateForm;
