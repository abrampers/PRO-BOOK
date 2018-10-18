import $$ from './lib/jQowi.js';

const invalidUsernameMessage = 'Username cannot be empty';
const invalidPasswordMessage = 'Password cannot be empty';

let inputValidationMessage = invalidUsernameMessage;

function validateInput(_) {
  const usernameField = $$('#formUsernameField');
  const passwordField = $$('#formPasswordField');
  const submitButton = $$('#formSubmitButton');

  if (usernameField.value.length == 0) {
    submitButton.disabled = true;
    inputValidationMessage = invalidUsernameMessage;
  } else if (passwordField.value.length == 0) {
    submitButton.disabled = true;
    inputValidationMessage = invalidPasswordMessage;
  } else {
    submitButton.disabled = false;
  }
}

$$('#formUsernameField').oninput = validateInput;
$$('#formPasswordField').oninput = validateInput;

$$('#formSubmitButtonInner').onmouseenter = () => {
  if ($$('#formSubmitButton').disabled) {
    $$('#inputValidationMessage').innerHTML = inputValidationMessage;
    $$('#inputValidationMessageContainer').classList.add('is-visible');
    $$('#titleContainer').classList.add('is-moved');
  }
};

$$('#formSubmitButtonInner').onmouseleave = () => {
  $$('#inputValidationMessageContainer').classList.remove('is-visible');
  $$('#titleContainer').classList.remove('is-moved');
};

setTimeout(() => {
  $$('#invalidCredentialsMessageContainer').classList.add('is-hidden')
}, 5000);
