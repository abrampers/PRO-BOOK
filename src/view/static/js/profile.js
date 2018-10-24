import $$ from './lib/jQowi.js';

$$('#editProfileButton').onmouseenter = () => {
  $$('#editProfileButtonIcon').classList.add('hover');
};

$$('#editProfileButton').onmouseleave = () => {
  $$('#editProfileButtonIcon').classList.remove('hover');
};
