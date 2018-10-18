<?php
include_once "lib/router/MiddlewareInterface.interface.php";
include_once "src/model/MarufDB.class.php";
class TokenValidationMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    if ($db->checkToken($token) == 0) {
      setcookie('token', '', time() - 3600);
    }
    return True;
  }
}
