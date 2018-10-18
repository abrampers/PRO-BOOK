<?php
include_once 'lib/request/Request.class.php';
include_once 'lib/router/Router.class.php';
include_once 'lib/template_engine/Template.class.php';
include_once 'src/controller/middleware/TestMiddleware.middleware.php';
include_once 'src/controller/middleware/AuthMiddleware.middleware.php';
include_once 'src/controller/middleware/TokenValidationMiddleware.middleware.php';
include_once 'src/controller/middleware/LoginRegisterMiddleware.middleware.php';
include_once 'src/controller/LoginController.php';
include_once 'src/controller/api.php';
$router = new Router(new Request);


/***************/
/* ROUTE PATHS */
/************* */

/** GET */
$router->get('/', function($request) {
  return <<<HTML
  <h1>Main Page HUYU</h1>
HTML;
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/login', function($request) {
  $template = new Template('src/view/login.php');
  return $template->render();
}, [new TokenValidationMiddleware, new LoginRegisterMiddleware]);

$router->get('/register', function($request) {
  $template = new Template('src/view/register.php');
  return $template->render();
}, [new TokenValidationMiddleware, new LoginRegisterMiddleware]);

$router->get('/browse', function($request) {
  $template = new Template('src/view/huyu.php');
  return $template->render();
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/history', function($request) {
  $template = new Template('src/view/huyu.php');
  return $template->render();
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/history/review', function($request) {
  $template = new Template('src/view/huyu.php');
  return $template->render();
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/profile', function($request) {
  $template = new Template('src/view/huyu.php');
  return $template->render();
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/profile/edit', function($request) {
  $template = new Template('src/view/huyu.php');
  return $template->render();
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/deletecookie', function($request) {
  $db = new MarufDB('localhost', 'probook', 'root', '');
  $db->deleteToken($request->token);
  setcookie('token', '', time() - 3600, '/');
});

/** POST */
$router->post('/login', function($request) {
  return loginController($request);
});

/************/
/* REST API */
/************/

/** GET */
$router->get('/username', function($request) {
  print_r($request);
  return json_encode(validateUsername($request->username));
});

$router->get('/email', function($request) {
  return json_encode(validateEmail($request->email));
});

$router->get('/search', function($request) {
  return json_encode(validateEmail($request->email));
});

/** POST */
