import $$ from './lib/jQowi.js'

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function isNum(value) {
  return /^\d+$/.test(value);
}

function validateForm() {
  let nameField = $$('#formNameField');
  let emailField = $$('#formEmailField');
  let usernameField = $$('#formUsernameField');
  let passwordField = $$('#formPasswordField');
  let confirmPasswordField = $$('#formConfirmPasswordField');
  let addressField = $$('#formAddressField');
  let phoneNumberField = $$('#formPhoneNumberField');

  if (nameField.value.length == 0 || nameField.value.length > 20) {
    alert('huyu name');
    return false;
  } else if (!validateEmail(emailField.value)) {
    alert('huyu email');
    return false;
  } else if (usernameField.value.length == 0) {
    alert('huyu username');
    return false;
  } else if (passwordField.value.length == 0) {
    alert('huyu pass');
    return false;
  } else if (confirmPasswordField.value.length == 0) {
    alert('huyu conf pass');
    return false;
  } else if (addressField.value.length == 0) {
    alert('huyu address');
    return false;
  } else if (!isNum(phoneNumberField.value) || phoneNumberField.value.length < 9 || phoneNumberField.value.length > 12) {
    alert('huyu phone');
    return false;
  } else {
    return true;
  }
}

let registerForm = $$('#registerForm');
registerForm.onsubmit = validateForm;
