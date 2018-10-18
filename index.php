<?php
include_once 'lib/request/Request.class.php';
include_once 'lib/router/Router.class.php';
include_once 'lib/template_engine/Template.class.php';
include_once 'lib/dotethes/DotEthes.class.php';
include_once 'src/controller/middleware/TestMiddleware.middleware.php';
include_once 'src/controller/middleware/AuthMiddleware.middleware.php';
include_once 'src/controller/middleware/TokenValidationMiddleware.middleware.php';
include_once 'src/controller/LoginController.php';
include_once 'src/controller/api.php';
$router = new Router(new Request);
$dotEthes = new DotEthes(__DIR__);
$dotEthes->load();

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
  header("Location: http://{$request->serverName}:{$request->serverPort}/login");
  exit();
});

$router->get('/loginewe', function($request) {
  // header('Location: http://localhost:5000/login');
  print_r($_COOKIE);
},
[new TokenValidationMiddleware, new AuthMiddleware]
);

$router->post('/login', function($request) {
  return loginController($request);
});

// REST API
$router->get('/username', function($request) {
  print_r($request);
  return json_encode(validateUsername($request->username));
});

$router->get('/email', function($request) {
  return json_encode(validateEmail($request->email));
});
