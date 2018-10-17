let selectorHandler = (query) => {
  if (query.startsWith('#')) {
    return document.querySelector(query);
  } else {
    return document.querySelectorAll(query);
  }
};

let ajaxHandler = (request) => {
  console.log(request);
};

let $$ = selectorHandler;
$$.ajax = ajaxHandler;

export default $$;
