import $$ from './lib/jQowi.js';

let formOnFocus = false;

$$('#queryField').onmouseenter = () => {
  $$('#browseTitle').classList.add('focus');
};

$$('#queryField').onmouseexit = () => {
  if (!formOnFocus) $$('#browseTitle').classList.remove('focus');
};

$$('#queryField').onfocus = () => {
  $$('#browseTitle').classList.add('focus');
  formOnFocus = true;
};

$$('#queryField').onblur = () => {
  $$('#browseTitle').classList.remove('focus');
  formOnFocus = false;
};

setTimeout(() => {
  $$('#queryField').focus();
}, 250);


