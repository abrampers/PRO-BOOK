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
  if (userHoveredOut) {
    $$('#invalidCredentialsMessageContainer').style.opacity = 0;
    if ($$('#formSubmitButton').disabled) {
      $$('#inputValidationMessage').innerHTML = inputValidationMessage;
      $$('#inputValidationMessageContainer').style.opacity = 1;
    } else {
      $$('#inputValidationMessage').innerHTML = '';
      $$('#inputValidationMessageContainer').style.opacity = 0;
    }
  }
};

$$('#formSubmitButtonInner').onmouseleave = () => {
  $$('#inputValidationMessage').innerHTML = '';
  $$('#inputValidationMessageContainer').style.opacity = 0;
  userHoveredOut = true;
};
