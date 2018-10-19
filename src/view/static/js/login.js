import $$ from './lib/jQowi.js';

const invalidUsernameMessage = 'Username cannot be empty';
const invalidPasswordMessage = 'Password cannot be empty';

function showInputValidationMessage() {
  $$('#inputValidationMessageContainer').classList.add('is-visible');
  $$('#titleContainer').classList.add('is-moved');
}

function hideInputValidationMessage() {
  $$('#inputValidationMessageContainer').classList.remove('is-visible');
  $$('#titleContainer').classList.remove('is-moved');
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
  } else if (passwordField.value.length == 0) {
    submitButton.disabled = true;
    updateInputValidationMessage(invalidPasswordMessage);
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
};

$$('#formSubmitButtonInner').onmouseleave = () => {
  hideInputValidationMessage();
};

setTimeout(() => {
  const invalidCredentialsMessageContainer = $$('#invalidCredentialsMessageContainer');
  const redirectedMessageContainer = $$('#redirectedMessageContainer');
  if (invalidCredentialsMessageContainer) invalidCredentialsMessageContainer.classList.add('is-visible')
  if (redirectedMessageContainer) redirectedMessageContainer.classList.add('is-visible')
}, 250);

setTimeout(() => {
  const invalidCredentialsMessageContainer = $$('#invalidCredentialsMessageContainer');
  const redirectedMessageContainer = $$('#redirectedMessageContainer');
  if (invalidCredentialsMessageContainer) invalidCredentialsMessageContainer.classList.remove('is-visible')
  if (redirectedMessageContainer) redirectedMessageContainer.classList.remove('is-visible')
}, 5000);
