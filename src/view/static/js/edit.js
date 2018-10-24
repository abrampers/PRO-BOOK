import $$ from './lib/jQowi.js';

$$('#fileNameTextArea').disabled = true;
$$('#fileNameTextArea').value ='File (.jpg)';

$$('#browseButton').onclick = () => {
  $$('#fileToUpload').click();
}

$$('#fileToUpload').onchange = () => {
  console.log($$('#fileToUpload').value.split('\\').pop());
  $$('#fileNameTextArea').value = $$('#fileToUpload').value.split('\\').pop();
}

setTimeout(() => {
  const errorMessageContainer = $$('#errorMessageContainer');
  if (errorMessageContainer) errorMessageContainer.classList.add('visible')
}, 250);

setTimeout(() => {
  const errorMessageContainer = $$('#errorMessageContainer');
  if (errorMessageContainer) errorMessageContainer.classList.remove('visible')
}, 5000);
