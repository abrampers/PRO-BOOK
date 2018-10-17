let selector_handler = (query) => {
  if (query.startsWith('#')) {
    return document.getElementById(query);
  } else if (query.startsWith('.')) {
    return document.getElementsByClassName(query);
  } else {
    return document.getElementsByTagName(query);
  }
};

let ajax_handler = (request) => {
  console.log(request);
};

let $$ = selector_handler;
$$.ajax = ajax_handler;

export default $$;
