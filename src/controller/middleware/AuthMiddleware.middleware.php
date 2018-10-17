<?php
include_once "lib/router/MiddlewareInterface.interface.php";
include_once "lib/request/Request.class.php";
include_once "model/MarufDB.class.php";
class AuthMiddleware implements MiddlewareInterface {
  public function run(Closure $callback, Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB('localhost', 'probook', 'root', 'Nicho01');
    if (!is_null($token) && $db->checkToken($token) == 1) {
      return $callback($request);
    } else {
      header('Location: http://localhost:5000/login');
      exit();
    }
  }
}
