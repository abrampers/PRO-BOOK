import $$ from './lib/jQowi.js'

let count = 0;
setInterval(() => {
  $$('h1')[0].innerHTML = 'kontol' + count;
  count += 1;
}, 200);

$$.ajax('huyuuu');
