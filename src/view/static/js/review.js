import $$ from './lib/jQowi.js';

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
