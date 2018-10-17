<?php
include_once 'lib/request/Request.php';
include_once 'lib/router/Router.php';
include_once 'lib/template_engine/Template.php';
include_once 'src/controller/middleware/TestMiddleware.php';
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

// $router->get('/profile', function($request) {
//     return <<<HTML
//     <h1>Profile</h1>
// HTML;
// });

// $router->get('/test', function($request) {
//     return '<h1>TEST BERHASIL HUYUUUU</h1>';
// },
// new TestMiddleware
// );

$router->post('/data', function($request) {
  return json_encode($request->getBody());
});
