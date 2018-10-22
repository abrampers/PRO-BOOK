<?php
class TokenValidationMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB();
    if ($db->checkToken($token) == 0) {
      setcookie('token', '', time() - 3600);
    }
    return True;
  }
}
