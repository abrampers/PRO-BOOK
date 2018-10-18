<?php
include_once 'src/autoloader.php';

$router = new Router(new Request);
$dotEthes = new DotEthes(__DIR__);
$dotEthes->load();


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
  return LoginController::control($request);
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
  return json_encode(Api::validateEmail($request->email));
});

$router->get('/search', function($request) {
  return json_encode(Api::validateEmail($request->email));
});

/** POST */
