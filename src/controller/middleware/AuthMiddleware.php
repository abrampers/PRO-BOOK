<?php
class AuthMiddleware implements MiddlewareInterface {
  public function run(Request $request) {
    $token = $_COOKIE['token'];
    $db = new MarufDB();
    if (is_null($token)) {
      header("Location: /login?redirected=1");
      return False;
    } else {
      return True;
    }
  }
}
