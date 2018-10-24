import $$ from './lib/jQowi.js';

function updateStarState(activeStarNum) {
  $$('#ratingField').value = activeStarNum;
  $$('.review-star').forEach((element) => {
    if (parseInt(element.id) <= activeStarNum) {
      element.classList.add('filled');
    } else {
      element.classList.remove('filled');
    }
  });
}

$$('.review-star').forEach((element) => {
  element.onmouseenter = () => {
    updateStarState(parseInt(element.id));
  };
});
