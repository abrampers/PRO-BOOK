import $$ from './lib/jQowi.js'

function isEmail(value) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(value).toLowerCase());
}

function isNum(value) {
  return /^\d+$/.test(value);
}

function validateForm(_) {
  const nameField = $$('#formNameField');
  const emailField = $$('#formEmailField');
  const usernameField = $$('#formUsernameField');
  const passwordField = $$('#formPasswordField');
  const confirmPasswordField = $$('#formConfirmPasswordField');
  const addressField = $$('#formAddressField');
  const phoneNumberField = $$('#formPhoneNumberField');

  if (nameField.value.length == 0 || nameField.value.length > 20) {
    alert('huyu name');
    return false;
  } else if (!isEmail(emailField.value)) {
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

const ajaxRequests = []

function validateUsername(event) {
  const username = event.target.value;
  const xhttp = $$.ajax({
    method: 'GET',
    url: '/username?username=' + username,
    callback: (response) => {
      response = JSON.parse(response);
      const usernameValidationIcon = $$('#formUsernameValidationIcon');
      usernameValidationIcon.style.opacity = 1;
      if (response.valid && username.length > 0) {
        usernameValidationIcon.src = 'src/view/static/img/icon_success.svg'
      } else {
        usernameValidationIcon.src = 'src/view/static/img/icon_failed.svg'
      }
    },
  });
}

function validateEmail(event) {
  const email = event.target.value;
  const xhttp = $$.ajax({
    method: 'GET',
    url: '/email?email=' + email,
    callback: (response) => {
      response = JSON.parse(response);
      const emailValidationIcon = $$('#formEmailValidationIcon');
      emailValidationIcon.style.opacity = 1;
      if (response.valid && isEmail(email)) {
        emailValidationIcon.src = 'src/view/static/img/icon_success.svg'
      } else {
        emailValidationIcon.src = 'src/view/static/img/icon_failed.svg'
      }
    },
  });
}

$$('#formUsernameField').oninput = validateUsername;
$$('#formEmailField').oninput = validateEmail;

$$('#registerForm').onsubmit = validateForm;
