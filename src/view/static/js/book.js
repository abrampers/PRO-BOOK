import $$ from './lib/jQowi.js';

$$('#orderButton').onclick = () => {
  $$('#orderButton').disabled = true;
  const data = {
    'book_id': parseInt($$('#bookIdField').value, 10),
    'quantity': parseInt($$('#orderQuantitySelector').value, 10)
  }
  $$.ajax({
    method: 'POST',
    url: '/order',
    data: JSON.stringify(data),
    callback: (response) => {
      response = JSON.parse(response);
      $$('#orderButton').disabled = false;
      $$('#purchaseMessagePopupText').innerHTML = 'Transaction Number: ' + response.orderNumber;
      $$('#purchaseMessageBackground').style.zIndex = 2;
      $$('#purchaseMessagePopup').style.zIndex = 2;
      setTimeout(() => {
        $$('#purchaseMessageBackground').classList.add('visible');
        $$('#purchaseMessagePopup').classList.add('visible');
      }, 100);
    },
  })
};

$$('#purchaseMessagePopupCloseButton').onclick = () => {
  $$('#purchaseMessageBackground').classList.remove('visible');
  $$('#purchaseMessagePopup').classList.remove('visible');
  setTimeout(() => {
    $$('#purchaseMessageBackground').style.zIndex = -1;
    $$('#purchaseMessagePopup').style.zIndex = -1;
  }, 250);
};
