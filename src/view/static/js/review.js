import $$ from './lib/jQowi.js';

const invalidRatingMessage = 'Please pick a rating between 1 and 5';
const invalidCommentMessage = 'Please give a comment';

let submitButtonHovered = false;

function hoverStars(index) {
  $$('.review-star').forEach((element) => {
    element.classList.remove('pre-selected');
    element.classList.remove('pre-removed');
    if (parseInt(element.id) <= index) {
      if (!element.classList.contains('selected')) element.classList.add('pre-selected');
    } else {
      if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        element.classList.add('pre-removed');
      }
    }
  });
}

function unhoverStars() {
  $$('.review-star').forEach((element) => {
    element.classList.remove('pre-selected');
    if (element.classList.contains('pre-removed')) {
      element.classList.remove('pre-removed');
      element.classList.add('selected');
    }
  });
}

function selectStars(index) {
  $$('#ratingField').value = index;
  validateInput();
  $$('.review-star').forEach((element) => {
    element.classList.remove('pre-selected');
    element.classList.remove('pre-removed');
    if (parseInt(element.id) <= index) {
      element.classList.add('selected');
    } else {
      element.classList.remove('selected');
    }
  });
}

function showInputValidationMessage() {
  $$('#inputValidationMessageContainer').classList.add('visible');
  $$('#inputValidationMessage').classList.add('visible');
}

function hideInputValidationMessage() {
  $$('#inputValidationMessageContainer').classList.remove('visible');
  $$('#inputValidationMessage').classList.remove('visible');
}

function updateInputValidationMessage(message) {
  $$('#inputValidationMessage').innerHTML = message;
}

function validateInput(_) {
  const ratingField = $$('#ratingField');
  const commentField = $$('#commentField');
  const submitButton = $$('#submitButton');

  if (ratingField.value < 1 || ratingField.value > 5) {
    submitButton.disabled = true;
    updateInputValidationMessage(invalidRatingMessage);
    if (submitButtonHovered) showInputValidationMessage();
  } else if (commentField.value.length == 0) {
    submitButton.disabled = true;
    updateInputValidationMessage(invalidCommentMessage);
    if (submitButtonHovered) showInputValidationMessage();
  } else {
    submitButton.disabled = false;
    hideInputValidationMessage();
  }
}

$$('.review-star').forEach((element) => {
  element.onmouseenter = () => {
    hoverStars(parseInt(element.id));
  };
  element.onmouseleave = () => {
    unhoverStars();
  };
  element.onclick = () => {
    selectStars(parseInt(element.id));
  };
});

$$('#commentField').oninput = validateInput;

updateInputValidationMessage(invalidCommentMessage);

$$('#submitButtonContainer').onmouseenter = () => {
  if ($$('#submitButton').disabled) {
    showInputValidationMessage();
  }
  submitButtonHovered = true;
  validateInput();
};

$$('#submitButtonContainer').onmouseleave = () => {
  hideInputValidationMessage();
  submitButtonHovered = false;
};
