import $$ from './lib/jQowi.js';

const invalidNameMessage = 'Name must be a valid person name with less than 20 characters';
const invalidUsernameMessage = 'Username must contains alphanumeric or underscore';
const checkingUsernameMessage = 'Please wait, we are checking your username availability...';
const takenUsernameMessage = 'Username already taken';
const invalidEmailMessage = 'Email must be a valid address';
const checkingEmailMessage = 'Please wait, we are checking your email availability...';
const takenEmailMessage = 'Email already taken';
const invalidPasswordMessage = 'Password must contains at least 6 characters';
const notMatchingPasswordMessage = 'Password confirmation does not match';
const invalidAddressMessage = 'Address cannot be empty';
const invalidPhoneNumberMessage = 'Phone number must be a number with 9 to 12 digits';

let inputValidationMessage = invalidNameMessage;
let usernameValidationMessage = invalidUsernameMessage;
let emailValidationMessage = invalidEmailMessage;

let usernameValid = false;
let emailValid = false;

let usernameValidationRequest;
let emailValidationRequest;

function isName(value) {
  const re = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
  return re.test(value);
}

function isUsername(value) {
  const re = /^[a-zA-Z0-9_]+$/;
  return re.test(value);
}

function isEmail(value) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(value).toLowerCase());
}

function isNum(value) {
  const re = /^\d+$/;
  return re.test(value);
}

function validateInput(_) {
  const nameField = $$('#formNameField');
  const passwordField = $$('#formPasswordField');
  const confirmPasswordField = $$('#formConfirmPasswordField');
  const addressField = $$('#formAddressField');
  const phoneNumberField = $$('#formPhoneNumberField');
  const submitButton = $$('#formSubmitButton');

  if (!isName(nameField.value) || nameField.value.length == 0 || nameField.value.length > 20) {
    submitButton.disabled = true;
    inputValidationMessage = invalidNameMessage;
  } else if (!usernameValid) {
    submitButton.disabled = true;
    inputValidationMessage = usernameValidationMessage;
  } else if (!emailValid) {
    submitButton.disabled = true;
    inputValidationMessage = emailValidationMessage;
  } else if (passwordField.value.length < 6) {
    submitButton.disabled = true;
    inputValidationMessage = invalidPasswordMessage;
  } else if (confirmPasswordField.value != passwordField.value) {
    submitButton.disabled = true;
    inputValidationMessage = notMatchingPasswordMessage;
  } else if (addressField.value.length == 0) {
    submitButton.disabled = true;
    inputValidationMessage = invalidAddressMessage;
  } else if (!isNum(phoneNumberField.value) || phoneNumberField.value.length < 9 || phoneNumberField.value.length > 12) {
    submitButton.disabled = true;
    inputValidationMessage = invalidPhoneNumberMessage;
  } else {
    submitButton.disabled = false;
  }
}

function validateUsername(_) {
  const username = event.target.value;
  const usernameValidationIcon = $$('#formUsernameValidationIcon');
  const submitButton = $$('#formSubmitButton');
  usernameValidationIcon.style.opacity = 1;
  if (usernameValidationRequest) usernameValidationRequest.abort();
  if (isUsername(username)) {
    submitButton.disabled = true;
    usernameValid = false;
    usernameValidationMessage = checkingUsernameMessage;
    usernameValidationRequest = $$.ajax({
      method: 'GET',
      url: '/username?username=' + username,
      callback: (response) => {
        response = JSON.parse(response);
        const usernameValidationIcon = $$('#formUsernameValidationIcon');
        const submitButton = $$('#formSubmitButton');
        if (response.valid) {
          usernameValidationIcon.src = 'src/view/static/img/icon_success.svg';
          submitButton.disabled = false;
          usernameValid = true;
        } else {
          usernameValidationIcon.src = 'src/view/static/img/icon_failed.svg';
          submitButton.disabled = true;
          usernameValid = false;
          usernameValidationMessage = takenUsernameMessage;
        }
        validateInput(null);
      },
    });
  } else {
    usernameValidationIcon.src = 'src/view/static/img/icon_failed.svg';
    submitButton.disabled = true;
    usernameValid = false;
    usernameValidationMessage = invalidUsernameMessage;
  }
  validateInput(null);
}

function validateEmail(_) {
  const email = event.target.value;
  const emailValidationIcon = $$('#formEmailValidationIcon');
  const submitButton = $$('#formSubmitButton');
  emailValidationIcon.style.opacity = 1;
  if (emailValidationRequest) emailValidationRequest.abort();
  if (isEmail(email)) {
    submitButton.disabled = true;
    emailValid = false;
    emailValidationMessage = checkingEmailMessage;
    emailValidationRequest = $$.ajax({
      method: 'GET',
      url: '/email?email=' + email,
      callback: (response) => {
        response = JSON.parse(response);
        const emailValidationIcon = $$('#formEmailValidationIcon');
        const submitButton = $$('#formSubmitButton');
        if (response.valid) {
          emailValidationIcon.src = 'src/view/static/img/icon_success.svg';
          submitButton.disabled = false;
          emailValid = true;
        } else {
          emailValidationIcon.src = 'src/view/static/img/icon_failed.svg';
          submitButton.disabled = true;
          emailValid = false;
          emailValidationMessage = takenEmailMessage;
        }
        validateInput(null);
      },
    });
  } else {
    emailValidationIcon.src = 'src/view/static/img/icon_failed.svg';
    submitButton.disabled = true;
    emailValid = false;
    emailValidationMessage = invalidEmailMessage;
  }
  validateInput(null);
}

$$('#formUsernameField').oninput = validateUsername;
$$('#formEmailField').oninput = validateEmail;

$$('#formNameField').oninput = validateInput;
$$('#formPasswordField').oninput = validateInput;
$$('#formConfirmPasswordField').oninput = validateInput;
$$('#formAddressField').oninput = validateInput;
$$('#formPhoneNumberField').oninput = validateInput;

$$('#formSubmitButtonInner').onmouseenter = () => {
  if ($$('#formSubmitButton').disabled) {
    $$('#inputValidationMessage').innerHTML = inputValidationMessage;
    $$('#inputValidationMessageContainer').classList.add('is-visible');
  }
};

$$('#formSubmitButtonInner').onmouseleave = () => {
  $$('#inputValidationMessageContainer').classList.remove('is-visible');
};
