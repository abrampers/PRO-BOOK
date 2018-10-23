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
  return LoginGetController::control($request);
}, [new TokenValidationMiddleware, new LoginRegisterMiddleware]);

$router->get('/register', function($request) {
  return RegisterGetController::control($request);
}, [new TokenValidationMiddleware, new LoginRegisterMiddleware]);

$router->get('/logout', function($request) {
  return LogoutGetController::control($request);
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/browse', function($request) {
  return BrowseGetController::control($request);
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/books', function($request) {
  return BooksGetController::control($request);
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/history', function($request) {
  return HistoryGetController::control($request);
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/history/review', function($request) {
  $template = new Template('src/view/huyu.php');
  return $template->render();
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/profile', function($request) {
  return ProfileGetController::control($request);
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/profile/edit', function($request) {
  $template = new Template('src/view/huyu.php');
  return $template->render();
}, [new TokenValidationMiddleware, new AuthMiddleware]);

$router->get('/deletecookie', function($request) {
  $db = new MarufDB();
  $db->deleteToken($request->token);
  setcookie('token', '', time() - 3600, '/');
});


$router->get('/hu', function($request) {
  $db = new MarufDB;
  $user = $db->getUser($_COOKIE['token']);
  print_r($user);
});

/** POST */
$router->post('/login', function($request) {
  return LoginPostController::control($request);
});

$router->post('/register', function($request) {
  return RegisterPostController::control($request);
}, [new VerifyRegisterMiddleware]);

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

/** POST */








$router->get('/huyu', function($request) {
  echo $request->httpUserAgent;
});
