import $$ from './lib/jQowi.js';

$$('#titleContainer').onmouseenter = () => {
  $$('#titleBackground').classList.add('hover');
  $$('#titleText').classList.add('hover');
};

$$('#titleContainer').onmouseleave = () => {
  $$('#titleBackground').classList.remove('hover');
  $$('#titleText').classList.remove('hover');
};

$$('#titleContainer').onclick = () => {
  window.location = '/';
};
