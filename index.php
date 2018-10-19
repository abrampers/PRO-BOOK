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
  header("Location: http://{$_ENV['HOST_NAME']}:{$_ENV['HOST_PORT']}/browse");
  exit();
});

$router->get('/login', function($request) {
  $template = new Template('src/view/login.php');
  return $template->render(False, $request->redirected);
}, [new TokenValidationMiddleware, new LoginRegisterMiddleware]);

$router->get('/register', function($request) {
  $template = new Template('src/view/register.php');
  return $template->render();
}, [new TokenValidationMiddleware, new LoginRegisterMiddleware]);

$router->get('/browse', function($request) {
  $template = new Template('src/view/browse.php');
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
  $db = new MarufDB($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
  $db->deleteToken($request->token);
  setcookie('token', '', time() - 3600, '/');
});

/** POST */
$router->post('/login', function($request) {
  return LoginController::control($request);
});

$router->post('/register', function($request) {
  return RegisterController::control($request);
});

/************/
/* REST API */
/************/

/** GET */
$router->get('/username', function($request) {
  return json_encode(Api::validateUsername($request->username));
});

$router->get('/email', function($request) {
  return json_encode(Api::validateEmail($request->email));
});

$router->get('/search', function($request) {
  return json_encode(Api::validateEmail($request->email));
});

/** POST */
