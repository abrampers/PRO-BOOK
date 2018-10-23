import $$ from './lib/jQowi.js';

const invalidUsernameMessage = 'Username cannot be empty';
const invalidPasswordMessage = 'Password cannot be empty';

let submitButtonHovered = false;

function showInputValidationMessage() {
  $$('#inputValidationMessageContainer').classList.add('visible');
  $$('#titleContainer').classList.add('moved');
}

function hideInputValidationMessage() {
  $$('#inputValidationMessageContainer').classList.remove('visible');
  $$('#titleContainer').classList.remove('moved');
}

function updateInputValidationMessage(message) {
  $$('#inputValidationMessage').innerHTML = message;
}

function validateInput(_) {
  const usernameField = $$('#formUsernameField');
  const passwordField = $$('#formPasswordField');
  const submitButton = $$('#formSubmitButton');

  if (usernameField.value.length == 0) {
    submitButton.disabled = true;
    updateInputValidationMessage(invalidUsernameMessage);
    if (submitButtonHovered) showInputValidationMessage();
  } else if (passwordField.value.length == 0) {
    submitButton.disabled = true;
    updateInputValidationMessage(invalidPasswordMessage);
    if (submitButtonHovered) showInputValidationMessage();
  } else {
    submitButton.disabled = false;
    hideInputValidationMessage();
  }
}

$$('#formUsernameField').oninput = validateInput;
$$('#formPasswordField').oninput = validateInput;

updateInputValidationMessage(invalidUsernameMessage);

$$('#formSubmitButtonInner').onmouseenter = () => {
  if ($$('#formSubmitButton').disabled) {
    showInputValidationMessage();
  }
  submitButtonHovered = true;
};

$$('#formSubmitButtonInner').onmouseleave = () => {
  hideInputValidationMessage();
  submitButtonHovered = false;
};

setTimeout(() => {
  const invalidCredentialsMessageContainer = $$('#invalidCredentialsMessageContainer');
  const redirectedMessageContainer = $$('#redirectedMessageContainer');
  if (invalidCredentialsMessageContainer) invalidCredentialsMessageContainer.classList.add('visible');
  if (redirectedMessageContainer) redirectedMessageContainer.classList.add('visible');
}, 250);

setTimeout(() => {
  const invalidCredentialsMessageContainer = $$('#invalidCredentialsMessageContainer');
  const redirectedMessageContainer = $$('#redirectedMessageContainer');
  if (invalidCredentialsMessageContainer) invalidCredentialsMessageContainer.classList.remove('visible');
  if (redirectedMessageContainer) redirectedMessageContainer.classList.remove('visible');
}, 5000);
