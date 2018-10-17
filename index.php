<?php
include_once 'lib/request/Request.php';
include_once 'lib/router/Router.php';
include_once 'src/controller/middleware/TestMiddleware.php';
include_once 'src/view/login.php';
$router = new Router(new Request);

$router->get('/', function($request) {
  return <<<HTML
  <h1>Hello World</h1>
HTML;
});

$router->get('/login', function($request) {
  return renderLoginView("huyuuu");
});

$router->get('/loginh', function($request) {
  header('Location: http://localhost:5000/login');
  exit();
});

$router->post('/data', function($request) {
  print_r($_POST);
  return json_encode($request->getBody());
});
