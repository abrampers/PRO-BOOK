import $$ from './lib/jQowi.js';

$$('#logoutButtonContainer').onmouseenter = () => {
  $$('#logoutButton').classList.add('hover');
};

$$('#logoutButtonContainer').onmouseleave = () => {
  $$('#logoutButton').classList.remove('hover');
};
