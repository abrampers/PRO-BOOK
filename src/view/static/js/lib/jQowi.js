function selectorHandler(query) {
  if (query.startsWith('#')) {
    return document.querySelector(query);
  } else {
    return document.querySelectorAll(query);
  }
};

function ajaxHandler(requestParams) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) {
        requestParams.callback(this.response);
      } else {
        console.log('AJAX call returned with status ' + this.status)
      }
    }
  };

  if (requestParams.method.toUpperCase() == 'GET') {
    xhttp.open('GET', requestParams.url, true);
    xhttp.send();
    return xhttp;
  } else if (requestParams.method.toUpperCase() == 'POST') {
    xhttp.open('POST', requestParams.url, true);
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhttp.send(requestParams.data);
    return xhttp;
  } else {
    console.log('ERROR: Invalid AJAX request method')
  }
};

let $$ = selectorHandler;
$$.ajax = ajaxHandler;

export default $$;
