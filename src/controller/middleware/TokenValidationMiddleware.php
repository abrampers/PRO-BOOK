<?php
include_once "lib/router/MiddlewareInterface.interface.php";
include_once "src/model/MarufDB.class.php";
class TokenValidationMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB('localhost', 'probook', 'root', '');
    if ($db->checkToken($token) == 0) {
      setcookie('token', '', time() - 3600);
    }
    return True;
  }
}
