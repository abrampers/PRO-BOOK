import $$ from './lib/jQowi.js';

$$('#orderButton').onclick = () => {
  $$.ajax({
    method: 'POST',
    url: '/order',
    data: {
      'book_id': parseInt($$('#bookIdInput').value, 10),
      'quantity': parseInt($$('#orderQuantitySelector').value, 10)
    },
    callback: (response) => {
      response = JSON.parse(response);
      console.log(response);
      if (response.orderNumber != undefined) {
        alert('Purchase succesful! Order number: ' + response.orderNumber);
      } else {
        alert('Purchase failed, try again!');
      }
    },
  })
};
