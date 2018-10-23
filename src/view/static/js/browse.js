import $$ from './lib/jQowi.js';

$$('#logoutButtonContainer').onmouseenter = () => {
  $$('#logoutButton').classList.add('hover');
};

$$('#logoutButtonContainer').onmouseleave = () => {
  $$('#logoutButton').classList.remove('hover');
};

$$('.main-menu-tab').forEach((element) => {
  element.onmouseenter = () => {
    element.classList.add('hover');
  };
  element.onmouseleave = () => {
    element.classList.remove('hover');
  };
});
