import $$ from './lib/jQowi.js';

$$('#logoutButtonContainer').onmouseenter = () => {
  $$('#logoutButton').classList.add('hover');
  $$('#logoutButtonIcon').classList.add('hover');
};

$$('#logoutButtonContainer').onmouseleave = () => {
  $$('#logoutButton').classList.remove('hover');
  $$('#logoutButtonIcon').classList.remove('hover');
};

$$('.main-menu-tab').forEach((element) => {
  element.onmouseenter = () => {
    element.classList.add('hover');
  };
  element.onmouseleave = () => {
    element.classList.remove('hover');
  };
});

$$('#browseTab').onclick = () => {
  window.location = 'browse';
};

$$('#historyTab').onclick = () => {
  window.location = 'history';
};

$$('#profileTab').onclick = () => {
  window.location = 'profile';
};
