<?php
include_once 'lib/request/Request.class.php';
include_once 'lib/router/Router.class.php';
include_once 'lib/template_engine/Template.class.php';
include_once 'src/controller/middleware/TestMiddleware.middleware.php';
include_once 'src/controller/LoginController.php';
$router = new Router(new Request);

$router->get('/', function($request) {
  return <<<HTML
  <h1>Hello World</h1>
HTML;
});

$router->get('/login', function($request) {
  $template = new Template('src/view/login.php');
  return $template->render();
});

$router->get('/register', function($request) {
  $template = new Template('src/view/register.php');
  return $template->render();
});

$router->get('/loginh', function($request) {
  header('Location: http://localhost:5000/login');
  exit();
});

$router->post('/login', function($request) {
  return loginController($request);
});

// REST API
$router->get('/username', function($request) {
  return array('valid' => validateUsername($request));
});
