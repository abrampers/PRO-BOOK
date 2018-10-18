import $$ from './lib/jQowi.js';

const invalidUsernameMessage = 'Username cannot be empty';
const invalidPasswordMessage = 'Password cannot be empty';

let inputValidationMessage = invalidUsernameMessage;
let userHoveredOut = false;

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
  let invalidCredentialsMessageContainer = $$('#invalidCredentialsMessageContainer');
  if (!invalidCredentialsMessageContainer) userHoveredOut = true;
  if (userHoveredOut) {
    if (invalidCredentialsMessageContainer) invalidCredentialsMessageContainer.classList.add('is-hidden');
    if ($$('#formSubmitButton').disabled) {
      $$('#inputValidationMessage').innerHTML = inputValidationMessage;
      $$('#inputValidationMessageContainer').classList.add('is-visible');
    }
  }
};

$$('#formSubmitButtonInner').onmouseleave = () => {
  $$('#inputValidationMessageContainer').classList.remove('is-visible');
  userHoveredOut = true;
};
